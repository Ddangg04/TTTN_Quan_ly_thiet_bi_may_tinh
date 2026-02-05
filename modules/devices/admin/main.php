<?php

/**
 * @Project NUKEVIET 5.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2025 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$page_title = $lang_module['devices_list'] ?? 'Danh Sách Thiết Bị';

$bulk_message = '';
if (isset($_SESSION['bulk_result'])) {
    $bulk_message = '<script type="text/javascript">
    $(document).ready(function() {
        nvToast(\'' . addslashes($_SESSION['bulk_result']) . '\', \'success\');
        setTimeout(function() {
            $(".cr-toast").last().find("[data-dismiss=toast]").trigger("click");
        }, 700);
    });
    </script>';
    unset($_SESSION['bulk_result']);
}

$keyword = $nv_Request->get_title('q', 'get', '');
$cat_id = $nv_Request->get_int('cat_id', 'get', 0);
$brand_id = $nv_Request->get_int('brand_id', 'get', 0);
$status_filter = $nv_Request->get_int('status', 'get', -1);
$page = $nv_Request->get_int('page', 'get', 1);
$limit = $nv_Request->get_int('limit', 'get', 10);
$limit < 10 && $limit = 10;

$offset = ($page - 1) * $limit;
$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op;
$base_url .= '&q=' . urlencode($keyword) . '&cat_id=' . $cat_id . '&brand_id=' . $brand_id . '&status=' . $status_filter . '&limit=' . $limit;

$total = countAllDevices($keyword, $cat_id, $brand_id, $status_filter);
$devices = getAllDevices($keyword, $cat_id, $brand_id, $status_filter, $limit, $offset);

$link_add = NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=add_device';
$checksess = md5($global_config['sitekey'] . session_id());

$cats = getCategories();
$cats_options = '<option value="0">Tất cả danh mục</option>';
foreach ($cats as $cid => $ctitle) {
    $selected = ($cat_id == $cid) ? 'selected' : '';
    $cats_options .= '<option value="' . $cid . '" ' . $selected . '>' . $ctitle . '</option>';
}

$brands = getBrands();
$brands_options = '<option value="0">Tất cả thương hiệu</option>';
foreach ($brands as $bid => $btitle) {
    $selected = ($brand_id == $bid) ? 'selected' : '';
    $brands_options .= '<option value="' . $bid . '" ' . $selected . '>' . $btitle . '</option>';
}

$status_options = '<option value="-1">Trạng thái</option>';
$status_options .= '<option value="1" ' . ($status_filter == 1 ? 'selected' : '') . '>Hoạt động</option>';
$status_options .= '<option value="0" ' . ($status_filter == 0 ? 'selected' : '') . '>Ngưng bán</option>';

$rows_html = '';
if (empty($devices)) {
    $rows_html = '<tr><td colspan="11" class="text-center">Không có dữ liệu nào!</td></tr>';
} else {
    $i = $offset;
    foreach ($devices as $device) {
        $i++;
        $price_format = number_format($device['price'], 0, ',', '.');

        $status_html = ($device['status'] == 1)
            ? '<span class="text-success"><i class="fa fa-check-circle"></i> Hoạt động</span>'
            : '<span class="text-danger"><i class="fa fa-minus-circle"></i> Ngưng bán</span>';

        $link_edit = NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=edit_device&id=' . $device['id'];
        $link_view = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=detail&id=' . $device['id'];

        $image_url = '';
        $image_html = '<div class="text-muted small">Chưa có ảnh</div>';
        if (!empty($device['image'])) {
            $image_url = (strpos($device['image'], '/') === 0) ? $device['image'] : NV_BASE_SITEURL . $device['image'];
            $image_html = '<img src="' . $image_url . '" class="img-thumbnail" style="width:130px; height:80px; object-fit:cover;" />';
        }

        $images = getDeviceImages($device['id']);
        $image_urls = [];
        foreach ($images as $img) {
            if (!empty($img['url'])) {
                $image_urls[] = NV_BASE_SITEURL . $img['url'];
            }
        }
        $images_json = htmlspecialchars(json_encode($image_urls), ENT_QUOTES, 'UTF-8');
        $specs = $device['content'] ?? $device['description'] ?? '';
        $specs = nv_htmlspecialchars($specs);

        $rows_html .= '
        <tr style="vertical-align: middle;">
            <td class="text-center">
                <input type="checkbox" name="idcheck[]" value="' . $device['id'] . '" onclick="nv_UncheckAll(this.form, \'idcheck[]\', \'check_all[]\', this.checked);" />
            </td>
            <td class="text-center">' . $i . '</td>
            <td class="text-center">' . $image_html . '</td>
            <td>
                <a href="' . $link_view . '" class="text-primary"><strong>' . $device['title'] . '</strong></a>
            </td>
            <td class="text-center">' . $device['model_code'] . '</td>
            <td class="text-center">' . $device['cat_title'] . '</td>
            <td class="text-center">' . $device['brand_title'] . '</td>
            <td class="text-center"><strong style="color: #d9534f;">' . $price_format . '</strong></td>
            <td class="text-center">' . intval($device['quantity'] ?? 0) . '</td>
            <td class="text-center">' . $status_html . '</td>
            <td class="text-center">
                <a href="' . $link_edit . '" style="text-decoration: none; padding: 5px;" title="Sửa"><i class="fa fa-edit action-icon" style="font-size: 15px; color: #6c757d;"></i></a>
                <a href="javascript:void(0);" onclick="nv_del_device(' . $device['id'] . ', \'' . md5($device['id'] . NV_CHECK_SESSION) . '\');" style="text-decoration: none; padding: 5px;" title="Xóa"><i class="fa fa-trash-o action-icon" style="font-size: 15px; color: #6c757d;"></i></a>
            </td>
        </tr>';
    }
}

$pagination_html = '';
if ($total > $limit) {
    $pagination_html = nv_generate_page($base_url, $total, $limit, $page);
}

$contents = '';

$contents .= '
<div class="panel panel-default">
    <div class="panel-body" style="padding: 15px 15px 15px 15px; background-color: var(--nv-breadcrumb-bg) !important;">
        <form action="' . NV_BASE_ADMINURL . 'index.php" method="get" style="display: flex; flex-wrap: wrap; align-items: flex-end; margin-bottom: 15px;">
            <input type="hidden" name="' . NV_LANG_VARIABLE . '" value="' . NV_LANG_DATA . '" />
            <input type="hidden" name="' . NV_NAME_VARIABLE . '" value="' . $module_name . '" />
            
            <div style="display: inline-block; margin-right: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Từ khóa tìm kiếm</label>
                <input class="form-control" type="text" value="' . nv_htmlspecialchars($keyword) . '" maxlength="64" name="q" placeholder="Nhập tên sản phẩm hoặc mã model sản phẩm" style="width: 300px;" />
            </div>
            
            <div style="display: inline-block; margin-right: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Danh mục</label>
                <select class="form-select" name="cat_id" style="width: 180px;">
                    ' . $cats_options . '
                </select>
            </div>
            
            <div style="display: inline-block; margin-right: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Thương hiệu</label>
                <select class="form-select" name="brand_id" style="width: 180px;">
                    ' . $brands_options . '
                </select>
            </div>
            
            <div style="display: inline-block; margin-right: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Trạng thái</label>
                <select class="form-select" name="status" style="width: 140px;">
                    ' . $status_options . '
                </select>
            </div>
            
            <div style="display: inline-block;">
                <button type="submit" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-search"></i> Tìm kiếm</button>
                <a href="' . $link_add . '" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
            </div>
        </form>
    </div>
</div>

' . $bulk_message . '

<form name="device_list" action="' . NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=del_device" method="post">';

$contents .= '
<div class="panel panel-default" >
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 40px;">
                        <input name="check_all[]" type="checkbox" value="yes" onclick="nv_checkAll(this.form, \'idcheck[]\', \'check_all[]\', this.checked);" />
                    </th>
                    <th class="text-center" style="width: 40px;">STT</th>
                    <th class="text-center" style="width: 130px;">Ảnh đại diện</th>
                    <th>Thông tin sản phẩm</th>
                    <th class="text-center" style="width: 120px;">Mã model</th>
                    <th class="text-center" style="width: 100px;">Danh mục</th>
                    <th class="text-center" style="width: 100px;">Thương hiệu</th>
                    <th class="text-center" style="width: 130px;">Giá (VNĐ)</th>
                    <th class="text-center" style="width: 70px;">Số lượng</th>
                    <th class="text-center" style="width: 100px;">Trạng thái</th>
                    <th class="text-center" style="width: 140px;">Chức năng</th>
                </tr>
            </thead>
            <tbody>
                ' . $rows_html . '
            </tbody>
        </table>
    </div>
    <div class="panel-footer clearfix">
        <div class="pull-left">
            <div class="input-group" style="width: auto;">
                <select class="form-select" name="action" id="action" style="width: 180px !important; flex: 0 0 auto;" aria-label="Lựa chọn thao tác">
                    <option value="">-- Chọn hành động --</option>
                    <option value="delete">Xóa</option>
                    <option value="active">Kích hoạt</option>
                    <option value="deactive">Ngưng bán</option>
                </select>
                <button class="btn btn-primary" type="button" onclick="nv_main_action(this.form, \'' . NV_CHECK_SESSION . '\', \'Bạn chưa chọn thiết bị nào!\');">Thực hiện</button>
            </div>
        </div>
        <div class="pull-right">
            ' . $pagination_html . '
        </div>
    </div>
</div>
</form>';

$contents .= '
<div class="modal fade" id="device-detail-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="device-detail-title">Chi tiết sản phẩm</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <img id="device-detail-image" src="" alt="" class="img-thumbnail" style="width: 100%; max-height: 260px; object-fit: cover;" />
                        <div id="device-detail-gallery" class="m-top" style="margin-top: 10px;"></div>
                    </div>
                    <div class="col-sm-7">
                        <p><strong>Mã model:</strong> <span id="device-detail-model"></span></p>
                        <p><strong>Danh mục:</strong> <span id="device-detail-cat"></span></p>
                        <p><strong>Thương hiệu:</strong> <span id="device-detail-brand"></span></p>
                        <p><strong>Giá:</strong> <span id="device-detail-price"></span> VNĐ</p>
                        <p><strong>Số lượng:</strong> <span id="device-detail-quantity"></span></p>
                        <p><strong>Trạng thái:</strong> <span id="device-detail-status"></span></p>
                        <hr />
                        <h4>Thông số kỹ thuật</h4>
                        <div id="device-detail-specs" class="well well-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';

$contents .= '
<script type="text/javascript">
function nv_del_device(id, checkss) {
    nvConfirm("Bạn thực sự muốn xóa? Nếu đồng ý, tất cả dữ liệu liên quan sẽ bị xóa. Bạn sẽ không thể phục hồi lại chúng sau này", function() {
        $.post(script_name + "?" + nv_lang_variable + "=" + nv_lang_data + "&" + nv_name_variable + "=" + nv_module_name + "&" + nv_fc_variable + "=del_device&nocache=" + new Date().getTime(), \'id=\' + id + \'&checkss=\' + checkss, function(res) {
            nv_del_device_result(res);
        });
    });
    return false;
}

function nv_del_device_result(res) {
    var r_split = res.split("_");
    if (r_split[0] == "OK") {
        nvToast("Xóa thành công: " + r_split[1], \'success\');
        setTimeout(function() { location.reload(); }, 700);
    } else if (r_split[0] == "ERR") {
        nvToast("Lỗi: " + r_split[1], \'error\');
    } else {
        nvToast("Không thể xóa thiết bị này!", \'error\');
    }
}

function nv_main_action(oForm, checkss, msgnocheck) {
    var fa = oForm[\'idcheck[]\'];
    var listid = \'\';
    if (fa.length) {
        for (var i = 0; i < fa.length; i++) {
            if (fa[i].checked) {
                listid = listid + fa[i].value + \',\';
            }
        }
    } else {
        if (fa.checked) {
            listid = listid + fa.value + \',\';
        }
    }

    if (listid != \'\') {
        var action = document.getElementById(\'action\').value;
        if (action == \'delete\') {
            nvConfirm(\'Bạn thực sự muốn xóa? Nếu đồng ý, tất cả dữ liệu liên quan sẽ bị xóa. Bạn sẽ không thể phục hồi lại chúng sau này\', function() {
                $.post(script_name + \'?\' + nv_lang_variable + \'=\' + nv_lang_data + \'&\' + nv_name_variable + \'=\' + nv_module_name + \'&\' + nv_fc_variable + \'=del_device&nocache=\' + new Date().getTime(), \'listid=\' + listid + \'&checkss=\' + checkss, function(res) {
                    nv_del_device_result(res);
                });
            });
        } else if (action == \'active\' || action == \'deactive\') {
            nvConfirm(\'Bạn có chắc muốn thực hiện hành động này?\', function() {
                window.location.href = script_name + \'?\' + nv_lang_variable + \'=\' + nv_lang_data + \'&\' + nv_name_variable + \'=\' + nv_module_name + \'&\' + nv_fc_variable + \'=del_device&action=\' + action + \'&listid=\' + listid + \'&checkss=\' + checkss;
            });
        }
    } else {
        nvToast(msgnocheck, \'warning\');
    }
}

$("#device-detail-modal").on("show.bs.modal", function (event) {
    var button = $(event.relatedTarget);
    var title = button.data("title") || "";
    var model = button.data("model") || "";
    var cat = button.data("cat") || "";
    var brand = button.data("brand") || "";
    var price = button.data("price") || "";
    var quantity = button.data("quantity") || "";
    var status = button.data("status") || "";
    var image = button.data("image") || "";
    var specs = button.data("specs") || "";
    var images = [];

    try {
        images = JSON.parse(button.attr("data-images") || "[]");
    } catch (e) {
        images = [];
    }

    $("#device-detail-title").text(title);
    $("#device-detail-model").text(model);
    $("#device-detail-cat").text(cat);
    $("#device-detail-brand").text(brand);
    $("#device-detail-price").text(price);
    $("#device-detail-quantity").text(quantity);
    $("#device-detail-status").text(status);
    $("#device-detail-specs").html(specs ? specs : "Chưa có thông số");

    if (image) {
        $("#device-detail-image").attr("src", image).show();
    } else {
        $("#device-detail-image").attr("src", "").hide();
    }

    var gallery = "";
    if (images.length) {
        for (var i = 0; i < images.length; i++) {
            gallery += "<img src=\"" + images[i] + "\" class=\"img-thumbnail\" style=\"width:60px; height:60px; object-fit:cover; margin:2px;\" />";
        }
    }
    $("#device-detail-gallery").html(gallery);
});

// Hover effect cho các icon
$("body").on("mouseenter", ".action-icon", function() {
    $(this).css("color", "#007bff");
}).on("mouseleave", ".action-icon", function() {
    $(this).css("color", "#6c757d");
});
</script>
<style>
.table a.text-primary:hover {
    text-decoration: underline !important;
}
</style>
';

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
