<?php

/**
 * Quản lý thương hiệu - Danh sách
 */

if (!defined('NV_ADMIN') || !defined('NV_MAINFILE') || !defined('NV_IS_MODADMIN')) {
    die('Stop!!!,brands');
}
$page_title = 'Quản lý thương hiệu';

// ===== XỬ LÝ AJAX: CHANGE STATUS =====
if ($nv_Request->isset_request('change_status', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $new_status = $nv_Request->get_int('new_status', 'post', 0);
    
    if ($id > 0) {
        $sql = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_brands 
                SET status = " . $new_status . " 
                WHERE id = " . $id;
        $db->query($sql);
        
        nv_jsonOutput(['status' => 'OK']);
    }
    nv_jsonOutput(['status' => 'ERROR']);
}

// ===== XỬ LÝ AJAX: DELETE =====
if ($nv_Request->isset_request('delete', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    
    if ($id > 0) {
        // Kiểm tra sản phẩm (do có FK RESTRICT)
        $sql = "SELECT COUNT(*) FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices WHERE brand_id = " . $id;
        $product_count = $db->query($sql)->fetchColumn();
        
        if ($product_count > 0) {
            nv_jsonOutput(['status' => 'ERROR', 'message' => 'Không thể xóa! Có ' . $product_count . ' sản phẩm thuộc thương hiệu này.']);
        }
        
        // Xóa
        $sql = "DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . "_brands WHERE id = " . $id;
        if ($db->exec($sql)) {
            nv_jsonOutput(['status' => 'OK', 'message' => 'Xóa thành công']);
        }
    }
    nv_jsonOutput(['status' => 'ERROR', 'message' => 'Lỗi xóa']);
}

// ===== LẤY DANH SÁCH BRANDS =====
$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_brands ORDER BY id DESC';
$result = $db->query($sql);
$brands = [];
while ($row = $result->fetch()) {
    // Đếm số sản phẩm
    $sql_count = 'SELECT COUNT(*) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_devices WHERE brand_id = ' . $row['id'];
    $row['product_count'] = $db->query($sql_count)->fetchColumn();
    
    $brands[] = $row;
}

// ===== HTML =====
$contents = '';

$contents .= '<div class="well">
    <a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=brands/add" class="btn btn-primary btn-lg">
        <i class="fa fa-plus-circle"></i> Thêm thương hiệu mới
    </a>
    <span class="pull-right" style="line-height:46px">
        <strong>Tổng số: ' . count($brands) . '</strong> thương hiệu
    </span>
</div>';

$contents .= '<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr class="active">
            <th width="50" class="text-center">ID</th>
            <th>Tên thương hiệu</th>
            <th width="250">Website hỗ trợ</th>
            <th width="100" class="text-center">Số sản phẩm</th>
            <th width="120" class="text-center">Trạng thái</th>
            <th width="150" class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>';

foreach ($brands as $brand) {
    $status_text = $brand['status'] == 1 ? 'Hiển thị' : 'Ẩn';
    $status_class = $brand['status'] == 1 ? 'success' : 'default';
    
    $contents .= '<tr>
        <td class="text-center">' . $brand['id'] . '</td>
        <td><strong>' . $brand['title'] . '</strong></td>
        <td>' . (!empty($brand['support']) ? '<a href="' . $brand['support'] . '" target="_blank">' . $brand['support'] . '</a>' : '-') . '</td>
        <td class="text-center"><span class="badge">' . $brand['product_count'] . '</span></td>
        <td class="text-center">
            <span class="label label-' . $status_class . ' change-status" data-id="' . $brand['id'] . '" data-status="' . $brand['status'] . '" style="cursor:pointer">
                ' . $status_text . '
            </span>
        </td>
        <td class="text-center">
            <a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=brands/edit&amp;id=' . $brand['id'] . '" class="btn btn-sm btn-default">
                <i class="fa fa-edit"></i> Sửa
            </a>
            <button class="btn btn-sm btn-danger btn-delete" data-id="' . $brand['id'] . '">
                <i class="fa fa-trash"></i> Xóa
            </button>
        </td>
    </tr>';
}

if (empty($brands)) {
    $contents .= '<tr><td colspan="6" class="text-center">Chưa có thương hiệu nào</td></tr>';
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
    
    $(".btn-delete").click(function() {
        if (!confirm("Xóa thương hiệu này?")) return;
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