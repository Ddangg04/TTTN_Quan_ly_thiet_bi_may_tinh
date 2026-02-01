<?php

/**
 * NukeViet Content Management System
 * @version 5.x
 */

if (!defined('NV_ADMIN') and !defined('NV_MAINFILE')) {
    exit('Stop!!!');
}

$module_version = [
    'name' => 'Devices',
    'modfuncs' => 'main,detail,category,search',
    'submenu' => 'main,category,search',
    'is_sysmod' => 0,
    'virtual' => 1,
    'version' => '5.0.00',
    'date' => 'Wed, 31 Jan 2024 00:00:00 GMT',
    'author' => 'Nhóm TTTN - Nguyễn Danh Bảo Đăng',
    'note' => 'Module quản lý thiết bị máy tính',
    'uploads_dir' => [
        $module_name,
        $module_name . '/brands',
        $module_name . '/categories',
        $module_name . '/products'
    ],
    'files_dir' => []
];
