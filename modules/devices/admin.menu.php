<?php

/**
 * TÁC DỤNG: Định nghĩa các menu hiển thị trong admin module
 * CÁCH HOẠT ĐỘNG:
 * - Khi vào Admin -> Devices, menu bên trái sẽ hiển thị các mục này
 * - $submenu['key'] = 'Tên menu'
 * - Key tương ứng với file admin/{key}.php hoặc admin/{key}/content.php
 */

if (!defined('NV_ADMIN')) {
    exit('Stop!!!');
}

// ============================================================
// Submenu chính hiển thị trong thanh menu admin
// ============================================================
$submenu['devices/content'] = 'Danh sách sản phẩm';
$submenu['devices/add_device'] = 'Thêm sản phẩm';
$submenu['category/content'] = 'Danh mục sản phẩm';
$submenu['brands/content'] = 'Thương hiệu';

// ============================================================
// Danh sách các func được phép gọi trong admin
// ============================================================
$allow_func[] = 'main';
$allow_func[] = 'devices/content';
$allow_func[] = 'devices/add_device';
$allow_func[] = 'devices/edit_device';
$allow_func[] = 'devices/save_device';
$allow_func[] = 'devices/del_device';

$allow_func[] = 'brands/content';
$allow_func[] = 'brands/add';
$allow_func[] = 'brands/edit';

$allow_func[] = 'category/content';
$allow_func[] = 'category/add';
$allow_func[] = 'category/edit';

$allow_func[] = 'images/content';
$allow_func[] = 'images/add';
$allow_func[] = 'images/edit';

return $submenu;