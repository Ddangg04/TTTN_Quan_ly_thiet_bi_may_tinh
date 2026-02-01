<?php

/**
 * NukeViet Content Management System
 * @version 5.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2024 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_ADMIN') and !defined('NV_MAINFILE')) {
    exit('Stop!!!');
}

$module_version = [
    'name' => 'Devices', // Tên module (hiển thị trong admin)
    'modfuncs' => 'main,detail,category,search', // Các funcs frontend có thể truy cập
    'submenu' => 'main,category,detail,search',
    'is_sysmod' => 1, // 0 = module thường, 1 = module hệ thống (như users, news)
    'virtual' => 1, // 1 = hỗ trợ virtual URL (SEO friendly)
    'version' => '5.1.00', // Version module
    'date' => 'Sat, 31 Jan 2026 00:00:00 GMT', // Ngày phát hành
    'author' => 'Nhóm TTTN - Nguyễn Danh Bảo Đăng', // Tác giả
    'note' => 'Module quản lý thiết bị máy tính', // Ghi chú
    'uploads_dir' => [ 
        $module_name,
        $module_name . '/brands',
        $module_name . '/categories',
        $module_name . '/products'
    ],
    'files_dir' => []
];