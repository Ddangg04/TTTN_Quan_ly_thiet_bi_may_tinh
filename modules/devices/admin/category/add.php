<?php

/**
 * @Project NUKEVIET 5.x
 * @Controller Category Add - Optimized with Template
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!defined('NV_ADMIN') || !defined('NV_MAINFILE') || !defined('NV_IS_MODADMIN')) {
    die('Stop!!!,Cat_add');
}

$page_title = 'Thêm danh mục thiết bị';
$error = [];
$row = [
    'parent_id' => 0,
    'title' => '',
    'description' => '',
    'status' => 1,
    'weight' => 0
];

if ($nv_Request->isset_request('submit', 'post')) {
    $row['title'] = $nv_Request->get_title('title', 'post', '');
    $row['parent_id'] = $nv_Request->get_int('parent_id', 'post', 0);
    $row['description'] = $nv_Request->get_textarea('description', 'post', '');
    $row['status'] = $nv_Request->get_int('status', 'post', 0);
    $row['weight'] = $nv_Request->get_int('weight', 'post', 0);
    
    if (empty($row['title'])) {
        $error[] = 'Tên danh mục không được trống';
    }
    
    if ($row['weight'] == 0) {
        $sql = "SELECT MAX(weight) FROM " . NV_PREFIXLANG . "_" . $module_data . "_device_categories WHERE parent_id = " . $row['parent_id'];
        $max = $db->query($sql)->fetchColumn();
        $row['weight'] = $max + 1;
    }
    
    if (empty($error)) {
        try {
            $sql = "INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . "_device_categories 
                    (parent_id, title, description, status, weight) 
                    VALUES (:parent_id, :title, :description, :status, :weight)";
            
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':parent_id', $row['parent_id'], PDO::PARAM_INT);
            $stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $row['description'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $row['status'], PDO::PARAM_INT);
            $stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);
            $stmt->execute();
            
            nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=category/content');
        } catch (PDOException $e) {
            $error[] = 'Lỗi: ' . $e->getMessage();
        }
    }
}

// Lấy danh sách categories
$array_cat_list = [];
nv_show_cat_list(0, $array_cat_list);

// ===== XỬ LÝ TEMPLATE =====
$xtpl = new XTemplate('category_add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);

// Gán dữ liệu cơ bản
$xtpl->assign('FORM_ACTION', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=category/add');
$xtpl->assign('CANCEL_URL', NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=category/content');
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

// Hiển thị danh sách parent categories
foreach ($array_cat_list as $cat) {
    $selected = ($row['parent_id'] == $cat['id']) ? 'selected' : '';
    $title_show = str_repeat('&nbsp;&nbsp;&nbsp;', $cat['lev']) . ($cat['lev'] > 0 ? '└─ ' : '') . $cat['title'];
    
    $xtpl->assign('PARENT', [
        'id' => $cat['id'],
        'title_show' => $title_show,
        'selected' => $selected
    ]);
    $xtpl->parse('main.parent_loop');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';