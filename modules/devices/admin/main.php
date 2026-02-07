<?php

/**
 * @Project NUKEVIET 5.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2025 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 */
<<<<<<< HEAD

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
=======
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!defined('NV_ADMIN') || !defined('NV_MAINFILE') || !defined('NV_IS_MODADMIN')) {
    die('Stop!!!');
}
$page_title = 'Dashboard';

// -----------------------------------------------------------------------------
// A. XỬ LÝ DỮ LIỆU (MODEL)
// -----------------------------------------------------------------------------

// 1. Các thông số thống kê cơ bản
$sql = "SELECT COUNT(*) FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices WHERE status=1";
$count_active = $db->query($sql)->fetchColumn();

$sql = "SELECT COUNT(*) FROM " . NV_PREFIXLANG . "_" . $module_data . "_device_categories";
$count_cats = $db->query($sql)->fetchColumn();

$sql = "SELECT COUNT(*) FROM " . NV_PREFIXLANG . "_" . $module_data . "_brands";
$count_brands = $db->query($sql)->fetchColumn();

// Tính tổng giá trị kho
>>>>>>> 6f83947686a34622ad1784a2ce826655977fa29d
$sql = "SELECT SUM(price * quantity) FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices WHERE status=1";
$total_inventory_value = $db->query($sql)->fetchColumn();
if (!$total_inventory_value) $total_inventory_value = 0;

<<<<<<< HEAD
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
=======
// 2. Lấy danh sách sản phẩm mới nhất (Kèm tên Danh mục và Thương hiệu)
// Sử dụng LEFT JOIN để lấy tên thay vì ID
>>>>>>> 6f83947686a34622ad1784a2ce826655977fa29d
$sql = "SELECT t1.id, t1.title, t1.price, t1.quantity, t1.status, 
               t2.title as cat_name, 
               t3.title as brand_name 
        FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices t1
        LEFT JOIN " . NV_PREFIXLANG . "_" . $module_data . "_device_categories t2 ON t1.cat_id = t2.id
        LEFT JOIN " . NV_PREFIXLANG . "_" . $module_data . "_brands t3 ON t1.brand_id = t3.id
        ORDER BY t1.id DESC LIMIT 10";

$latest_items = $db->query($sql)->fetchAll();

<<<<<<< HEAD
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
=======

// -----------------------------------------------------------------------------
// B. HÀM HỖ TRỢ & CSS
// -----------------------------------------------------------------------------

function nv_admin_format_price($number) {
    if(empty($number)) return '0 ₫';
    return number_format($number, 0, ',', '.') . ' ₫';
}

// Tạo URL Admin chuẩn
$link_manage_device = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=main"; // Danh sách thiết bị
$link_add_device    = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=content"; // Thêm thiết bị
$link_manage_cat    = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=cat"; // Quản lý danh mục
$link_manage_brand  = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=brand"; // Quản lý thương hiệu

$xtpl_css = <<<CSS
<style>
    /* Stats Cards */
    .dashboard-stat { display: block; margin-bottom: 25px; overflow: hidden; border-radius: 4px; box-shadow: 0 2px 3px rgba(0,0,0,0.1); }
    .dashboard-stat .visual { width: 80px; height: 80px; float: left; display: flex; align-items: center; justify-content: center; opacity: 0.9; }
    .dashboard-stat .visual i { font-size: 40px; color: #fff; }
    .dashboard-stat .details { position: relative; padding: 15px; background: #fff; height: 80px; }
    .dashboard-stat .details .number { font-size: 22px; font-weight: 700; color: #333; margin-bottom: 5px; line-height: 1; }
    .dashboard-stat .details .desc { color: #888; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; }
    
    .blue-madison { background-color: #578ebe; }
    .red-intense { background-color: #e35b5a; }
    .green-haze { background-color: #44b6ae; }
    .purple-plum { background-color: #8775a7; }

    /* Quick Links Bar */
    .quick-actions { margin-bottom: 25px; background: #f5f5f5; padding: 15px; border: 1px solid #e3e3e3; border-radius: 4px; display: flex; gap: 10px; flex-wrap: wrap; }
    .btn-quick { display: inline-flex; align-items: center; font-weight: 600; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
    .btn-quick i { margin-right: 8px; font-size: 1.1em; }

    /* Table Styles */
    .panel-custom { border-top: 3px solid #337ab7; }
    .table-vcenter th { background: #f9f9f9; border-bottom: 2px solid #eee; }
    .table-vcenter td { vertical-align: middle !important; padding: 10px 8px; }
    .status-badge { font-size: 11px; padding: 3px 8px; border-radius: 10px; }
    .label-instock { background: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9; }
    .label-outstock { background: #ffebee; color: #c62828; border: 1px solid #ffcdd2; }
</style>
CSS;

$contents = $xtpl_css;

// -----------------------------------------------------------------------------
// C. HIỂN THỊ GIAO DIỆN
// -----------------------------------------------------------------------------

// 1. HÀNG THỐNG KÊ (Stats Row)
$contents .= '<div class="row">';

// Box 1: Tổng sản phẩm
$contents .= '
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat">
        <div class="visual blue-madison"><i class="fa fa-cubes"></i></div>
        <div class="details">
            <div class="number">' . number_format($count_active) . '</div>
            <div class="desc">Sản phẩm</div>
        </div>
    </div>
</div>';

// Box 2: Tổng danh mục
$contents .= '
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat">
        <div class="visual purple-plum"><i class="fa fa-folder-open"></i></div>
        <div class="details">
            <div class="number">' . number_format($count_cats) . '</div>
            <div class="desc">Danh mục</div>
        </div>
    </div>
</div>';

// Box 3: Tổng thương hiệu
$contents .= '
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat">
        <div class="visual red-intense"><i class="fa fa-tags"></i></div>
        <div class="details">
            <div class="number">' . number_format($count_brands) . '</div>
            <div class="desc">Thương hiệu</div>
        </div>
    </div>
</div>';

// Box 4: Giá trị tồn kho
$contents .= '
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat">
        <div class="visual green-haze"><i class="fa fa-money"></i></div>
        <div class="details">
            <div class="number" style="font-size:18px">' . nv_admin_format_price($total_inventory_value) . '</div>
            <div class="desc">Giá trị kho</div>
        </div>
    </div>
</div>';

$contents .= '</div>'; // End Stats Row

// 2. THANH ĐIỀU HƯỚNG NHANH (Quick Actions)
$contents .= '<div class="quick-actions">';
$contents .= '<span class="text-uppercase text-muted" style="align-self:center; margin-right:10px; font-weight:bold"><i class="fa fa-bolt"></i> Truy cập nhanh:</span>';
$contents .= '<a href="'.NV_BASE_ADMINURL.'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=devices/content" class="btn btn-default btn-quick"><i class="fa fa-list-ul text-primary"></i> Quản lý Thiết Bị</a>';
$contents .= '<a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=category/content" class="btn btn-default btn-quick"><i class="fa fa-folder text-warning"></i> Quản lý Danh Mục</a>';
$contents .= '<a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/content" class="btn btn-default btn-quick"><i class="fa fa-star text-danger"></i> Quản lý Thương Hiệu</a>';
$contents .= '<a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=devices/add" class="btn btn-success btn-quick" style="margin-left:auto"><i class="fa fa-plus-circle"></i> Thêm Thiết Bị Mới</a>';
$contents .= '</div>';

// 3. BẢNG DỮ LIỆU CHI TIẾT
$contents .= '<div class="panel panel-default panel-custom">';
$contents .= '    <div class="panel-heading">
                    <i class="fa fa-clock-o"></i> <strong>SẢN PHẨM MỚI CẬP NHẬT</strong>
                  </div>';
$contents .= '    <div class="table-responsive">';
$contents .= '    <table class="table table-striped table-hover table-vcenter">';
$contents .= '        <thead>
                        <tr>
                            <th class="text-center" style="width:50px">STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th class="text-danger">Giá bán</th>
                            <th class="text-center">Kho</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                      </thead>';
$contents .= '        <tbody>';

if(!empty($latest_items)) {
    $stt = 1; // Khởi tạo biến đếm số thứ tự
    foreach($latest_items as $item) {
        $link_edit = NV_BASE_ADMINURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=content&id=" . $item['id'];
        
        // Xử lý hiển thị
        $price_show = nv_admin_format_price($item['price']);
        
        // Check null cho danh mục/thương hiệu (phòng trường hợp đã bị xóa)
        $cat_show   = !empty($item['cat_name']) ? $item['cat_name'] : '<em class="text-muted">Chưa phân loại</em>';
        $brand_show = !empty($item['brand_name']) ? $item['brand_name'] : '<em class="text-muted">--</em>';
        
        // Trạng thái kho hàng
>>>>>>> 6f83947686a34622ad1784a2ce826655977fa29d
        $stock_label = ($item['quantity'] > 0) 
            ? '<span class="status-badge label-instock">Còn ' . $item['quantity'] . '</span>' 
            : '<span class="status-badge label-outstock">Hết hàng</span>';

<<<<<<< HEAD
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
=======
        $contents .= "<tr>
                        <td class='text-center'><strong>{$stt}</strong></td>
                        <td><a href='{$link_edit}' style='font-weight:600; color:#337ab7'>{$item['title']}</a></td>
                        <td>{$cat_show}</td>
                        <td>{$brand_show}</td>
                        <td class='text-danger' style='font-weight:bold'>{$price_show}</td>
                        <td class='text-center'>{$stock_label}</td>
                        <td class='text-center'>
                            <a href='{$link_edit}' class='btn btn-xs btn-default' title='Sửa'><i class='fa fa-edit'></i></a>
                        </td>
                      </tr>";
        $stt++; // Tăng số thứ tự
    }
} else {
    $contents .= "<tr><td colspan='7' class='text-center'>Chưa có sản phẩm nào trong hệ thống.</td></tr>";
}

$contents .= '        </tbody>';
$contents .= '    </table>';
$contents .= '    </div>'; // end table-responsive
$contents .= '</div>'; // end panel
>>>>>>> 6f83947686a34622ad1784a2ce826655977fa29d

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';