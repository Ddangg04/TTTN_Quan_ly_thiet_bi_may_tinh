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
$submenu['main'] = 'Dashboard';
$submenu['category/content'] = 'Quản lý danh mục';
$submenu['brands/content'] = 'Quản lý thương hiệu';
$submenu['devices/content'] = 'Quản lý sản phẩm';
$submenu['images/content'] = 'Quản lý hình ảnh';
$submenu['search/content'] = 'Tìm kiếm';
$submenu['detail/content'] = 'Chi tiết sản phẩm';
$submenu['config/content'] = 'Cấu hình';
return $submenu;