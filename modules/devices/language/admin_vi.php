<?php
/**
 * NukeViet Content Management System
 * @version 5.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2025 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @createdate 01/02/2025
 * File: language/admin_vi.php - Ngôn ngữ Tiếng Việt (Admin)
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE'))
    die('Stop!!!');

$lang_translator['author']    = 'Nhóm Quản lý Thiết bị';
$lang_translator['createdate'] = '01/02/2025, 00:00';
$lang_translator['copyright'] = '@Copyright (C) 2025 VINADES.,JSC. All rights reserved';
$lang_translator['info']      = 'Ngôn ngữ Tiếng Việt cho module Quản lý Thiết bị';
$lang_translator['langtype']  = 'lang_module';

// ============================================================
// Menu
// ============================================================
$lang_module['admin_menu_devices']    = 'Quản lý Sản phẩm';
$lang_module['admin_menu_brands']     = 'Thương Hiệu';
$lang_module['admin_menu_categories'] = 'Danh Mục';

// ============================================================
// Devices (Sản phẩm)
// ============================================================
$lang_module['devices_list_title']  = 'Danh sách Sản phẩm';
$lang_module['add_device_title']    = 'Thêm Sản phẩm mới';
$lang_module['edit_device_title']   = 'Sửa thông tin Sản phẩm';
$lang_module['device_title']        = 'Tên sản phẩm';
$lang_module['device_model_code']   = 'Mã Model';
$lang_module['device_category']     = 'Danh mục';
$lang_module['device_brand']        = 'Thương hiệu';
$lang_module['device_quantity']     = 'Số lượng';
$lang_module['device_price']        = 'Giá (VND)';
$lang_module['device_description']  = 'Mô tả ngắn';
$lang_module['device_content']      = 'Nội dung chi tiết';
$lang_module['device_image']        = 'Ảnh đại diện';
$lang_module['device_images']       = 'Thư viện ảnh';
$lang_module['device_status']       = 'Trạng thái';
$lang_module['device_created']      = 'Ngày tạo';

// ============================================================
// Brands (Thương hiệu)
// ============================================================
$lang_module['brands_list_title']  = 'Danh sách Thương hiệu';
$lang_module['brand_title']        = 'Tên thương hiệu';
$lang_module['brand_support']      = 'Website hỗ trợ';
$lang_module['brand_status']       = 'Trạng thái';
$lang_module['brand_add']          = 'Thêm Thương hiệu mới';
$lang_module['brand_edit']         = 'Sửa Thương hiệu';

// ============================================================
// Categories (Danh mục)
// ============================================================
$lang_module['categories_list_title'] = 'Danh sách Danh mục';
$lang_module['category_title']        = 'Tên danh mục';
$lang_module['category_description']  = 'Mô tả';
$lang_module['category_parent']       = 'Danh mục cha';
$lang_module['category_weight']       = 'Thứ tự sắp xếp';
$lang_module['category_status']       = 'Trạng thái';
$lang_module['category_add']          = 'Thêm Danh mục mới';
$lang_module['category_edit']         = 'Sửa Danh mục';
$lang_module['cat_parent_root']       = '--- Danh mục gốc ---';

// ============================================================
// Status
// ============================================================
$lang_module['status_active']   = 'Đang hoạt động';
$lang_module['status_inactive'] = 'Đã ẩn';
$lang_module['status_label']    = 'Trạng thái';

// ============================================================
// Form / Button
// ============================================================
$lang_module['btn_save']       = 'Lưu';
$lang_module['btn_add']        = 'Thêm mới';
$lang_module['btn_edit']       = 'Sửa';
$lang_module['btn_delete']     = 'Xóa';
$lang_module['btn_back']       = 'Quay lại';
$lang_module['btn_cancel']     = 'Hủy';
$lang_module['btn_search']     = 'Tìm kiếm';
$lang_module['btn_reset']      = 'Xóa bộ lọc';
$lang_module['btn_upload']     = 'Chọn ảnh';
$lang_module['btn_add_images'] = 'Thêm ảnh';
$lang_module['btn_delete_img'] = 'Xóa ảnh';
$lang_module['confirm_delete'] = 'Bạn chắc chắn muốn xóa mục này?';

// ============================================================
// Filter / Search (Admin)
// ============================================================
$lang_module['filter_keyword']   = 'Từ khóa';
$lang_module['filter_category']  = 'Danh mục';
$lang_module['filter_brand']     = 'Thương hiệu';
$lang_module['filter_all']       = '--- Tất cả ---';
$lang_module['filter_label']     = 'Bộ lọc';

// ============================================================
// Errors
// ============================================================
$lang_module['error_title_empty']        = 'Tên sản phẩm không được để trống.';
$lang_module['error_cat_empty']          = 'Vui lòng chọn danh mục.';
$lang_module['error_brand_empty']        = 'Vui lòng chọn thương hiệu.';
$lang_module['error_brand_in_use']       = 'Không thể xóa thương hiệu này vì đang được sử dụng bởi một hoặc nhiều sản phẩm.';
$lang_module['error_category_in_use']    = 'Không thể xóa danh mục này vì đang chứa sản phẩm hoặc danh mục con.';
$lang_module['error_device_not_found']   = 'Sản phẩm không tìm thấy.';

// ============================================================
// Images
// ============================================================
$lang_module['img_note']         = 'Ghi chú ảnh';
$lang_module['img_existing']     = 'Ảnh hiện tại';
$lang_module['img_mark_delete']  = 'Đánh dấu xóa';
$lang_module['img_no_image']     = 'Chưa có ảnh';

// ============================================================
// Pagination
// ============================================================
$lang_module['total_items'] = 'Tổng số mục';
$lang_module['page']        = 'Trang';
