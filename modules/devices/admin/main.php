<?php

/**
 * @Project NUKEVIET 5.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2025 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 */

// Chặn truy cập trực tiếp
if (!defined('NV_ADMIN') || !defined('NV_MAINFILE') || !defined('NV_IS_MODADMIN')) {
    die('Stop!!!');
}

// Khai báo biến toàn cục
global $db, $module_name, $module_data, $module_file, $global_config;

$page_title = 'Dashboard';

// -----------------------------------------------------------------------------
// HÀM HỖ TRỢ (Đưa vào đây hoặc dùng admin.functions.php đều được)
// -----------------------------------------------------------------------------
function nv_admin_format_price($number) {
    if(empty($number)) return '0 ₫';
    return number_format($number, 0, ',', '.') . ' ₫';
}

// -----------------------------------------------------------------------------
// KHỞI TẠO TEMPLATE
// -----------------------------------------------------------------------------
$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['admin_theme'] . '/modules/' . $module_file);

// -----------------------------------------------------------------------------
// A. XỬ LÝ SỐ LIỆU THỐNG KÊ
// -----------------------------------------------------------------------------

// 1. Số lượng Active
$sql = "SELECT COUNT(*) FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices WHERE status=1";
$count_active = $db->query($sql)->fetchColumn();

// 2. Số lượng Danh mục
$sql = "SELECT COUNT(*) FROM " . NV_PREFIXLANG . "_" . $module_data . "_device_categories";
$count_cats = $db->query($sql)->fetchColumn();

// 3. Số lượng Thương hiệu
$sql = "SELECT COUNT(*) FROM " . NV_PREFIXLANG . "_" . $module_data . "_brands";
$count_brands = $db->query($sql)->fetchColumn();

// 4. Tổng giá trị kho
$sql = "SELECT SUM(price * quantity) FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices WHERE status=1";
$total_inventory_value = $db->query($sql)->fetchColumn();
if (!$total_inventory_value) $total_inventory_value = 0;

// Gán biến thống kê
$xtpl->assign('COUNT_ACTIVE', number_format($count_active));
$xtpl->assign('COUNT_CATS', number_format($count_cats));
$xtpl->assign('COUNT_BRANDS', number_format($count_brands));
$xtpl->assign('TOTAL_VALUE', nv_admin_format_price($total_inventory_value));

// -----------------------------------------------------------------------------
// B. XỬ LÝ LINK QUICK ACTIONS
// -----------------------------------------------------------------------------
$link_manage_device = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=devices/content"; // Lưu ý: OP là devices/content (dựa theo logic code cũ)
$link_add_device    = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=devices/add"; // OP là devices/add
$link_manage_cat    = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=category/content"; // OP là category/content
$link_manage_brand  = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=brands/content"; // OP là brands/content

$xtpl->assign('LINK_MANAGE_DEVICE', $link_manage_device);
$xtpl->assign('LINK_ADD_DEVICE', $link_add_device);
$xtpl->assign('LINK_MANAGE_CAT', $link_manage_cat);
$xtpl->assign('LINK_MANAGE_BRAND', $link_manage_brand);

// -----------------------------------------------------------------------------
// C. XỬ LÝ DANH SÁCH SẢN PHẨM MỚI
// -----------------------------------------------------------------------------
$sql = "SELECT t1.id, t1.title, t1.price, t1.quantity, t1.status, 
               t2.title as cat_name, 
               t3.title as brand_name 
        FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices t1
        LEFT JOIN " . NV_PREFIXLANG . "_" . $module_data . "_device_categories t2 ON t1.cat_id = t2.id
        LEFT JOIN " . NV_PREFIXLANG . "_" . $module_data . "_brands t3 ON t1.brand_id = t3.id
        ORDER BY t1.id DESC LIMIT 10";

$latest_items = $db->query($sql)->fetchAll();

if(!empty($latest_items)) {
    $stt = 1;
    foreach($latest_items as $item) {
        $link_edit = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=devices/content&id=" . $item['id'];
        
        // Format giá
        $price_show = nv_admin_format_price($item['price']);
        
        // Tên danh mục / thương hiệu (Xử lý null)
        $cat_show   = !empty($item['cat_name']) ? $item['cat_name'] : '<em class="text-muted">Chưa phân loại</em>';
        $brand_show = !empty($item['brand_name']) ? $item['brand_name'] : '<em class="text-muted">--</em>';
        
        // Label Kho hàng (HTML Badge)
        $stock_label = ($item['quantity'] > 0) 
            ? '<span class="status-badge label-instock">Còn ' . $item['quantity'] . '</span>' 
            : '<span class="status-badge label-outstock">Hết hàng</span>';

        $xtpl->assign('ROW', [
            'stt' => $stt,
            'title' => $item['title'],
            'link_edit' => $link_edit,
            'cat_name' => $cat_show,
            'brand_name' => $brand_show,
            'price' => $price_show,
            'stock_label' => $stock_label
        ]);
        
        $xtpl->parse('main.row');
        $stt++;
    }
} else {
    $xtpl->parse('main.empty');
}

// -----------------------------------------------------------------------------
// D. XUẤT GIAO DIỆN
// -----------------------------------------------------------------------------
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';