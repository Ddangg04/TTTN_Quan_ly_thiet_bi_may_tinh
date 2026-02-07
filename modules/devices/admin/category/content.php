<?php

/**
 * @Project NUKEVIET 5.x
 * @Controller Category Content - Optimized with Template
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!defined('NV_ADMIN') || !defined('NV_MAINFILE') || !defined('NV_IS_MODADMIN')) {
    die('Stop!!!');
}

$page_title = 'Quản lý danh mục';

// Xử lý AJAX thay đổi trạng thái
if ($nv_Request->isset_request('change_status', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $new_status = $nv_Request->get_int('new_status', 'post', 0);
    if ($id > 0) {
        $sql = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_device_categories SET status = " . $new_status . " WHERE id = " . $id;
        $db->query($sql);
        nv_jsonOutput(['status' => 'OK']);
    }
    nv_jsonOutput(['status' => 'ERROR']);
}

// Xử lý AJAX xóa
if ($nv_Request->isset_request('delete', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    if ($id > 0) {
        $db->query("DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . "_device_categories WHERE id = " . $id);
        nv_jsonOutput(['status' => 'OK']);
    }
}

// Xử lý AJAX thay đổi weight
if ($nv_Request->isset_request('change_weight', 'post')) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $new_weight = $nv_Request->get_int('new_weight', 'post', 0);
    if ($id > 0) {
        $db->query("UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_device_categories SET weight = " . $new_weight . " WHERE id = " . $id);
        nv_jsonOutput(['status' => 'OK']);
    }
}

// ===== LẤY DỮ LIỆU =====
$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_device_categories ORDER BY parent_id ASC, weight ASC";
$result = $db->query($sql)->fetchAll();

// ===== XỬ LÝ TEMPLATE =====
$xtpl = new XTemplate('category_content.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);

// Gán biến cơ bản
$xtpl->assign('PAGE_TITLE', $page_title);
$xtpl->assign('ADD_URL', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=category/add');

// Duyệt qua từng danh mục
foreach ($result as $row) {
    $st_class = ($row['status'] == 1) ? 'label-success' : 'label-default';
    $st_text = ($row['status'] == 1) ? 'Đang hiện' : 'Đang ẩn';
    $indent = ($row['parent_id'] > 0) ? '<span class="text-muted" style="margin-left:20px">|— </span>' : '';
    
    $edit_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=category/edit&id=' . $row['id'];
    
    $xtpl->assign('ROW', [
        'id' => $row['id'],
        'title' => $row['title'],
        'description' => $row['description'],
        'weight' => $row['weight'],
        'status' => $row['status'],
        'status_class' => $st_class,
        'status_text' => $st_text,
        'indent' => $indent,
        'edit_url' => $edit_url
    ]);
    
    $xtpl->parse('main.loop');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';