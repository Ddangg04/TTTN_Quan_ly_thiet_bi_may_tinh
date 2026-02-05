<?php

/**
 * @Project NUKEVIET 5.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2025 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Description Form thêm thiết bị mới
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

if (defined('NV_EDITOR')) {
    require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
}

$page_title = 'Thêm thiết bị mới';
$form_action = NV_BASE_ADMINURL . NV_LANG_DATA . '/' . $module_name . '/devices/content/';

$row = [
    'id' => 0,
    'cat_id' => 0,
    'brand_id' => 0,
    'title' => '',
    'model_code' => '',
    'quantity' => 1,
    'price' => 0,
    'status' => 1,
    'image' => '',
    'description' => '',
    'content' => '',
    'other_images' => []
];

if ($nv_Request->isset_request('device_form_data', 'session')) {
    $row = array_merge($row, $nv_Request->get_array('device_form_data', 'session', []));
    $nv_Request->unset_request('device_form_data', 'session');
}

$error = [];
if ($nv_Request->isset_request('device_form_error', 'session')) {
    $error = $nv_Request->get_array('device_form_error', 'session', []);
    $nv_Request->unset_request('device_form_error', 'session');
}

define('DEVICE_FORM_ONLY', true);
include NV_ROOTDIR . '/modules/' . $module_file . '/admin/devices/save_device.php';
