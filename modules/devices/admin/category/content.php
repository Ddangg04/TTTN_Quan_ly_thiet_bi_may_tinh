<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!defined('NV_ADMIN') || !defined('NV_MAINFILE') || !defined('NV_IS_MODADMIN')) {
    die('Stop!!!');
}
$page_title = 'Quản lý danh mục';

// ===== XỬ LÝ CHANGE STATUS =====
if ($nv_Request->isset_request('change_status', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $new_status = $nv_Request->get_int('new_status', 'post', 0);
    
    if ($id > 0) {
        $sql = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_device_categories 
                SET status = " . $new_status . " 
                WHERE id = " . $id;
        $db->query($sql);
        
        nv_jsonOutput(['status' => 'OK']);
    }
    nv_jsonOutput(['status' => 'ERROR']);
}

// ===== XỬ LÝ DELETE =====
if ($nv_Request->isset_request('delete', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    
    if ($id > 0) {
        // Kiểm tra danh mục con
        $sql = "SELECT COUNT(*) FROM " . NV_PREFIXLANG . "_" . $module_data . "_device_categories WHERE parent_id = " . $id;
        $child_count = $db->query($sql)->fetchColumn();
        
        if ($child_count > 0) {
            nv_jsonOutput(['status' => 'ERROR', 'message' => 'Không thể xóa! Có ' . $child_count . ' danh mục con.']);
        }
        
        // Kiểm tra sản phẩm 
        $sql = "SELECT COUNT(*) FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices WHERE cat_id = " . $id;
        $product_count = $db->query($sql)->fetchColumn();
        
        if ($product_count > 0) {
            nv_jsonOutput(['status' => 'ERROR', 'message' => 'Không thể xóa! Có ' . $product_count . ' sản phẩm.']);
        }
        
        // Xóa
        $sql = "DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . "_device_categories WHERE id = " . $id;
        if ($db->exec($sql)) {
            nv_jsonOutput(['status' => 'OK', 'message' => 'Xóa thành công']);
        }
    }
    nv_jsonOutput(['status' => 'ERROR', 'message' => 'Lỗi xóa']);
}

// ===== CHANGE WEIGHT =====
if ($nv_Request->isset_request('change_weight', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $new_weight = $nv_Request->get_int('new_weight', 'post', 0);
    
    if ($id > 0) {
        $sql = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_device_categories 
                SET weight = " . $new_weight . " 
                WHERE id = " . $id;
        $db->query($sql);
        
        // Fix weight
        $sql = "SELECT parent_id FROM " . NV_PREFIXLANG . "_" . $module_data . "_device_categories WHERE id = " . $id;
        $parent_id = $db->query($sql)->fetchColumn();
        nv_fix_cat_weight($parent_id);
        
        nv_jsonOutput(['status' => 'OK']);
    }
    nv_jsonOutput(['status' => 'ERROR']);
}

// ===== LẤY DANH SÁCH DANH MỤC =====
$array_cat_list = [];
nv_show_cat_list(0, $array_cat_list);

// ===== HTML =====
$contents = '';

$contents .= '<div class="well">
    <a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=category/add" class="btn btn-primary btn-lg">
        <i class="fa fa-plus-circle"></i> Thêm danh mục mới
    </a>
</div>';

$contents .= '<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr class="active">
            <th width="50">#</th>
            <th>Tên danh mục</th>
            <th width="150">Danh mục cha</th>
            <th width="100" class="text-center">Số SP</th>
            <th width="120" class="text-center">Trạng thái</th>
            <th width="100" class="text-center">Thứ tự</th>
            <th width="150" class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>';

$stt = 0;
foreach ($array_cat_list as $cat) {
    $stt++;
    
    // Đếm số sản phẩm
    $sql = 'SELECT COUNT(*) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_devices WHERE cat_id = ' . $cat['id'];
    $product_count = $db->query($sql)->fetchColumn();
    
    // Format title với indent
    $title_show = str_repeat('&nbsp;&nbsp;&nbsp;', $cat['lev']) . ($cat['lev'] > 0 ? '└─ ' : '') . $cat['title'];
    
    // Status
    $status_text = $cat['status'] == 1 ? 'Hiển thị' : 'Ẩn';
    $status_class = $cat['status'] == 1 ? 'success' : 'default';
    
    // Parent name
    $parent_name = '-';
    if ($cat['parent_id'] > 0 && isset($array_cat_list[$cat['parent_id']])) {
        $parent_name = $array_cat_list[$cat['parent_id']]['title'];
    }
    
    $contents .= '<tr>
        <td>' . $stt . '</td>
        <td><strong>' . $title_show . '</strong></td>
        <td>' . $parent_name . '</td>
        <td class="text-center"><span class="badge">' . $product_count . '</span></td>
        <td class="text-center">
            <span class="label label-' . $status_class . ' change-status" data-id="' . $cat['id'] . '" data-status="' . $cat['status'] . '" style="cursor:pointer">
                ' . $status_text . '
            </span>
        </td>
        <td class="text-center">
            <select class="form-control input-sm change-weight" data-id="' . $cat['id'] . '" style="width:80px;margin:0 auto">';
    
    for ($i = 1; $i <= 50; $i++) {
        $selected = $i == $cat['weight'] ? ' selected' : '';
        $contents .= '<option value="' . $i . '"' . $selected . '>' . $i . '</option>';
    }
    
    $contents .= '</select>
        </td>
        <td class="text-center">
            <a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=category/edit&amp;id=' . $cat['id'] . '" class="btn btn-sm btn-default">
                <i class="fa fa-edit"></i>
            </a>
            <button class="btn btn-sm btn-danger btn-delete" data-id="' . $cat['id'] . '">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>';
}

$contents .= '</tbody></table></div>';

// JavaScript
$contents .= '<script>
$(function() {
    $(".change-status").click(function() {
        var $el = $(this);
        var id = $el.data("id");
        var status = $el.data("status");
        var newStatus = status == 1 ? 0 : 1;
        
        $.post("", {change_status: 1, id: id, new_status: newStatus}, function(res) {
            if (res.status == "OK") {
                if (newStatus == 1) {
                    $el.removeClass("label-default").addClass("label-success").text("Hiển thị");
                } else {
                    $el.removeClass("label-success").addClass("label-default").text("Ẩn");
                }
                $el.data("status", newStatus);
            }
        }, "json");
    });
    
    $(".change-weight").change(function() {
        var id = $(this).data("id");
        var weight = $(this).val();
        $.post("", {change_weight: 1, id: id, new_weight: weight}, function(res) {
            if (res.status == "OK") location.reload();
        }, "json");
    });
    
    $(".btn-delete").click(function() {
        if (!confirm("Xóa danh mục này?")) return;
        var id = $(this).data("id");
        $.post("", {delete: 1, id: id}, function(res) {
            alert(res.message);
            if (res.status == "OK") location.reload();
        }, "json");
    });
});
</script>';

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';