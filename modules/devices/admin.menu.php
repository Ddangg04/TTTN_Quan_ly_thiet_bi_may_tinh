<?php
/**
 * NukeViet Content Management System
 * @version 5.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2025 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @createdate 01/02/2025
 */

if (!defined('NV_ADMIN'))
    die('Stop!!!');

// ============================================================
// Submenu chính hiển thị trong thanh menu admin
// ============================================================
$submenu['main']       = $lang_module['Trang Chủ'];
$submenu['brands']     = $lang_module['Thương Hiệu'];
$submenu['category']   = $lang_module['Danh Mục'];

// ============================================================
// Danh sách các func được phép gọi trong admin
// ============================================================
// --- Devices (Sản phẩm) ---
$allow_func[] = 'main';
$allow_func[] = 'add_device';
$allow_func[] = 'edit_device';
$allow_func[] = 'save_device';
$allow_func[] = 'del_device';

// --- Brands (Thương hiệu) ---
$allow_func[] = 'brands';
$allow_func[] = 'add_brand';
$allow_func[] = 'edit_brand';
$allow_func[] = 'save_brand';
$allow_func[] = 'del_brand';

// --- Categories (Danh mục) ---
$allow_func[] = 'category';
$allow_func[] = 'add_category';
$allow_func[] = 'edit_category';
$allow_func[] = 'save_category';
$allow_func[] = 'del_category';
