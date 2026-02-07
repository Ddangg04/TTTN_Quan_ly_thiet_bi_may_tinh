<?php

/**
 * @Project NUKEVIET 5.x
 * @Controller Brands Edit - Optimized with Template
 */

if (!defined('NV_ADMIN') || !defined('NV_MAINFILE') || !defined('NV_IS_MODADMIN')) {
    die('Stop!!!');
}

$id = $nv_Request->get_int('id', 'get', 0);

if ($id <= 0) {
    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/content');
}

$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_brands WHERE id = " . $id;
$row = $db->query($sql)->fetch();

if (!$row) {
    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/content');
}

$page_title = 'Sửa thương hiệu: ' . $row['title'];
$error = [];

if ($nv_Request->isset_request('submit', 'post')) {
    $row['title'] = $nv_Request->get_title('title', 'post', '');
    $row['support'] = $nv_Request->get_title('support', 'post', '');
    $row['status'] = $nv_Request->get_int('status', 'post', 0);
    
    if (empty($row['title'])) {
        $error[] = 'Tên không được để trống';
    }
    
    if (empty($error)) {
        $sql = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_brands SET title = :title, support = :support, status = :status WHERE id = " . $id;
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':title' => $row['title'], 
            ':support' => $row['support'], 
            ':status' => $row['status']
        ]);
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/content');
    }
}

// ===== XỬ LÝ TEMPLATE =====
$xtpl = new XTemplate('brands_edit.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);

// Gán dữ liệu cơ bản
$xtpl->assign('FORM_ACTION', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/edit&id=' . $id);
$xtpl->assign('CANCEL_URL', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/content');
$xtpl->assign('DATA', $row);

// Xử lý status radio
$xtpl->assign('STATUS_1', ($row['status'] == 1) ? 'checked' : '');
$xtpl->assign('STATUS_0', ($row['status'] == 0) ? 'checked' : '');

// Hiển thị lỗi nếu có
if (!empty($error)) {
    foreach ($error as $err) {
        $xtpl->assign('ERROR', $err);
        $xtpl->parse('main.error.loop');
    }
    $xtpl->parse('main.error');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';