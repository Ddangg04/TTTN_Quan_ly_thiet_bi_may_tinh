<?php

/**
 * NukeViet Content Management System
 * @version 5.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2025 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE')) {
    exit('Stop!!!');
}
$module_version = [
    'name'            => 'Quản lý Thiết bị',
    'modfuncs'        => 'main,detail,category,search',
    'is_sysmod'       => 1,
    'virtual'         => 1,
    'version'         => '1.0.00',
    'date'            => 'Sat, 1 Feb 2026 00:00:00 GMT',
    'author'          => 'Nhóm Quản lý Thiết bị',
    'note'            => '',
    'uploads_dir'     => [
        $module_upload
    ],
    'icon' => 'fa-solid fa-file-pen'
];
