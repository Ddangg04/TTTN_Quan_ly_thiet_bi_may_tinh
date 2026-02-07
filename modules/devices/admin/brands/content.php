<?php

/**
 * @Project NUKEVIET 5.x
 * @Controller Brands List - Optimized with Template
 */

if (!defined('NV_ADMIN') || !defined('NV_MAINFILE') || !defined('NV_IS_MODADMIN')) {
    die('Stop!!!');
}

$page_title = 'Quản lý thương hiệu';

// Xử lý AJAX thay đổi trạng thái
if ($nv_Request->isset_request('change_status', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $new_status = $nv_Request->get_int('new_status', 'post', 0);
    if ($id > 0) {
        $db->query("UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_brands SET status = $new_status WHERE id = $id");
        nv_jsonOutput(['status' => 'OK']);
    }
}

// Xử lý AJAX xóa
if ($nv_Request->isset_request('delete', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $product_count = $db->query("SELECT COUNT(*) FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices WHERE brand_id = $id")->fetchColumn();
    
    if ($product_count > 0) {
        nv_jsonOutput(['status' => 'ERROR', 'message' => 'Còn ' . $product_count . ' sản phẩm, không thể xóa!']);
    }
    
    $db->query("DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . "_brands WHERE id = $id");
    nv_jsonOutput(['status' => 'OK', 'message' => 'Đã xóa thành công']);
}

// ===== LẤY DỮ LIỆU =====
$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_brands ORDER BY id DESC';
$result = $db->query($sql);
$brands = [];

while ($row = $result->fetch()) {
    $row['product_count'] = $db->query('SELECT COUNT(*) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_devices WHERE brand_id = ' . $row['id'])->fetchColumn();
    $brands[] = $row;
}

// ===== XỬ LÝ TEMPLATE =====
$xtpl = new XTemplate('brands_content.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);

// Gán biến cơ bản
$xtpl->assign('ADD_URL', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/add');
$xtpl->assign('TOTAL_BRANDS', count($brands));

// Duyệt qua từng thương hiệu
foreach ($brands as $brand) {
    $status_class = $brand['status'] == 1 ? 'label-success' : 'label-default';
    $status_text = $brand['status'] == 1 ? 'Hiển thị' : 'Ẩn';
    
    $support_link = '-';
    if (!empty($brand['support'])) {
        $support_link = '<a href="' . $brand['support'] . '" target="_blank" class="text-info"><i class="fa fa-external-link"></i> Truy cập</a>';
    }
    
    $edit_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/edit&id=' . $brand['id'];
    
    $xtpl->assign('BRAND', [
        'id' => $brand['id'],
        'title' => $brand['title'],
        'support_link' => $support_link,
        'product_count' => $brand['product_count'],
        'status' => $brand['status'],
        'status_class' => $status_class,
        'status_text' => $status_text,
        'edit_url' => $edit_url
    ]);
    
    $xtpl->parse('main.loop');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';