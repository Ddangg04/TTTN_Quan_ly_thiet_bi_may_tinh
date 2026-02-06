<?php

/**
 * @Project NUKEVIET 5.x
 * @Controller Brands List - UI Optimized
 */

if (!defined('NV_ADMIN') || !defined('NV_MAINFILE') || !defined('NV_IS_MODADMIN')) {
    die('Stop!!!');
}

// Xử lý
if ($nv_Request->isset_request('change_status', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $new_status = $nv_Request->get_int('new_status', 'post', 0);
    if ($id > 0) {
        $db->query("UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_brands SET status = $new_status WHERE id = $id");
        nv_jsonOutput(['status' => 'OK']);
    }
}

if ($nv_Request->isset_request('delete', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $product_count = $db->query("SELECT COUNT(*) FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices WHERE brand_id = $id")->fetchColumn();
    if ($product_count > 0) nv_jsonOutput(['status' => 'ERROR', 'message' => 'Còn ' . $product_count . ' sản phẩm, không thể xóa!']);
    $db->query("DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . "_brands WHERE id = $id");
    nv_jsonOutput(['status' => 'OK', 'message' => 'Đã xóa thành công']);
}

// Truy vấn dữ liệu
$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_brands ORDER BY id DESC';
$result = $db->query($sql);
$brands = [];
while ($row = $result->fetch()) {
    $row['product_count'] = $db->query('SELECT COUNT(*) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_devices WHERE brand_id = ' . $row['id'])->fetchColumn();
    $brands[] = $row;
}

$contents = '<div class="row" style="margin-bottom: 20px;">
    <div class="col-sm-6">
        <a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/add" class="btn btn-primary shadow-sm" style="border-radius:20px; padding: 8px 25px;">
            <i class="fa fa-plus-circle"></i> Thêm thương hiệu mới
        </a>
    </div>
    <div class="col-sm-6 text-right">
        <p style="margin-top:10px; color:#666;">Tổng số: <strong>' . count($brands) . '</strong> thương hiệu</p>
    </div>
</div>';

$contents .= '<div class="card-custom" style="background:#fff; border-radius:10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); overflow:hidden; border:1px solid #eee;">
<table class="table table-hover" style="margin-bottom:0;">
    <thead>
        <tr style="background:#f8f9fa; color:#333;">
            <th class="text-center" width="70">ID</th>
            <th>Tên thương hiệu</th>
            <th>Website</th>
            <th class="text-center">Sản phẩm</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center" width="180">Thao tác</th>
        </tr>
    </thead>
    <tbody>';

foreach ($brands as $brand) {
    $status_class = $brand['status'] == 1 ? 'label-success' : 'label-default';
    $status_text = $brand['status'] == 1 ? 'Hiển thị' : 'Ẩn';
    
    $contents .= '<tr>
        <td class="text-center" style="vertical-align:middle;">' . $brand['id'] . '</td>
        <td style="vertical-align:middle;"><strong>' . $brand['title'] . '</strong></td>
        <td style="vertical-align:middle;">' . (!empty($brand['support']) ? '<a href="' . $brand['support'] . '" target="_blank" class="text-info"><i class="fa fa-external-link"></i> Truy cập</a>' : '-') . '</td>
        <td class="text-center" style="vertical-align:middle;"><span class="badge" style="background:#eee; color:#333; font-weight:normal;">' . $brand['product_count'] . '</span></td>
        <td class="text-center" style="vertical-align:middle;">
            <span class="label ' . $status_class . ' change-status" data-id="' . $brand['id'] . '" data-status="' . $brand['status'] . '" style="cursor:pointer; padding:5px 10px;">' . $status_text . '</span>
        </td>
        <td class="text-center" style="vertical-align:middle;">
            <a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/edit&id=' . $brand['id'] . '" class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-edit"></i> Sửa</a>
            <button class="btn btn-xs btn-danger btn-delete" data-id="' . $brand['id'] . '" title="Xóa"><i class="fa fa-trash"></i> Xóa</button>
        </td>
    </tr>';
}
$contents .= '</tbody></table></div>';

// JS G
$contents .= '<script>
$(function() {
    $(".change-status").click(function() {
        var $el = $(this);
        var id = $el.data("id"), status = $el.data("status"), newStatus = status == 1 ? 0 : 1;
        $.post("", {change_status: 1, id: id, new_status: newStatus}, function(res) {
            if (res.status == "OK") {
                $el.toggleClass("label-success label-default").text(newStatus == 1 ? "Hiển thị" : "Ẩn").data("status", newStatus);
            }
        }, "json");
    });
    $(".btn-delete").click(function() {
        var id = $(this).data("id");
        if (confirm("Xác nhận xóa thương hiệu này?")) {
            $.post("", {delete: 1, id: id}, function(res) {
                if (res.status == "OK") location.reload(); else alert(res.message);
            }, "json");
        }
    });
});
</script>';

echo nv_admin_theme($contents);