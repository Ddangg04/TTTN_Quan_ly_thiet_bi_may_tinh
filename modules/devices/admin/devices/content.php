<?php

/**
 * @Project NUKEVIET 5.x
 * @Controller Devices List - Optimized with Template
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!defined('NV_MAINFILE')) {
    exit('Stop!!!');
}

$page_title = $lang_module['devices_list'] ?? 'Danh Sách Thiết Bị';

// Bulk action message
$bulk_message = '';
if (isset($_SESSION['bulk_result'])) {
    $bulk_message = '<script type="text/javascript">
    $(document).ready(function() {
        nvToast(\'' . addslashes($_SESSION['bulk_result']) . '\', \'success\');
        setTimeout(function() {
            $(".cr-toast").last().find("[data-dismiss=toast]").trigger("click");
        }, 700);
    });
    </script>';
    unset($_SESSION['bulk_result']);
}

// Get filters
$keyword = trim($nv_Request->get_string('q', 'get', ''));
$cat_id = $nv_Request->get_int('cat_id', 'get', 0);
$brand_id = $nv_Request->get_int('brand_id', 'get', 0);
$status_filter = $nv_Request->get_int('status', 'get', -1);
$page = $nv_Request->get_int('page', 'get', 1);
$limit = $nv_Request->get_int('limit', 'get', 10);
$limit < 10 && $limit = 10;

$offset = ($page - 1) * $limit;
$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=devices/content';
$base_url .= '&q=' . urlencode($keyword) . '&cat_id=' . $cat_id . '&brand_id=' . $brand_id . '&status=' . $status_filter . '&limit=' . $limit;

// Get data
$total = countAllDevices($keyword, $cat_id, $brand_id, $status_filter);
$devices = getAllDevices($keyword, $cat_id, $brand_id, $status_filter, $limit, $offset);

// URLs
$link_add = NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=devices/add_device';
$checksess = md5($global_config['sitekey'] . session_id());

// Categories options
$cats = getCategories();
$cats_options = '<option value="0">Tất cả danh mục</option>';
foreach ($cats as $cid => $ctitle) {
    $selected = ($cat_id == $cid) ? 'selected' : '';
    $cats_options .= '<option value="' . $cid . '" ' . $selected . '>' . $ctitle . '</option>';
}

// Brands options
$brands = getBrands();
$brands_options = '<option value="0">Tất cả thương hiệu</option>';
foreach ($brands as $bid => $btitle) {
    $selected = ($brand_id == $bid) ? 'selected' : '';
    $brands_options .= '<option value="' . $bid . '" ' . $selected . '>' . $btitle . '</option>';
}

// Status options
$status_options = '<option value="-1">Trạng thái</option>';
$status_options .= '<option value="1" ' . ($status_filter == 1 ? 'selected' : '') . '>Hoạt động</option>';
$status_options .= '<option value="0" ' . ($status_filter == 0 ? 'selected' : '') . '>Ngưng bán</option>';

// Pagination
$pagination_html = '';
if ($total > $limit) {
    $pagination_html = nv_generate_page($base_url, $total, $limit, $page);
}

// ===== XỬ LÝ TEMPLATE =====
$xtpl = new XTemplate('devices_content.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);

// Assign variables
$xtpl->assign('BULK_MESSAGE', $bulk_message);
$xtpl->assign('SEARCH_URL', NV_BASE_ADMINURL . 'index.php');
$xtpl->assign('LANG_VAR', NV_LANG_VARIABLE);
$xtpl->assign('LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NAME_VAR', NV_NAME_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP_VAR', NV_OP_VARIABLE);
$xtpl->assign('KEYWORD', nv_htmlspecialchars($keyword));
$xtpl->assign('CATS_OPTIONS', $cats_options);
$xtpl->assign('BRANDS_OPTIONS', $brands_options);
$xtpl->assign('STATUS_OPTIONS', $status_options);
$xtpl->assign('ADD_URL', $link_add);
$xtpl->assign('FORM_ACTION', NV_BASE_ADMINURL . 'index.php');
$xtpl->assign('CHECKSESS', $checksess);
$xtpl->assign('PAGINATION', $pagination_html);

// Process devices
if (empty($devices)) {
    $xtpl->parse('main.empty');
} else {
    $i = $offset;
    foreach ($devices as $device) {
        $i++;
        $price_format = number_format($device['price'], 0, ',', '.');
        
        $status_html = ($device['status'] == 1)
            ? '<span class="text-success"><i class="fa fa-check-circle"></i> Hoạt động</span>'
            : '<span class="text-danger"><i class="fa fa-minus-circle"></i> Ngưng bán</span>';
        
        $link_edit = NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=devices/edit_device&id=' . $device['id'];
        $link_view = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=detail&id=' . $device['id'];
        
        $image_html = '<div class="text-muted small">Chưa có ảnh</div>';
        if (!empty($device['image'])) {
            $image_url = (strpos($device['image'], '/') === 0) ? $device['image'] : NV_BASE_SITEURL . $device['image'];
            $image_html = '<img src="' . $image_url . '" class="img-thumbnail" style="width:130px; height:80px; object-fit:cover;" />';
        }
        
        $xtpl->assign('ROW', [
            'id' => $device['id'],
            'stt' => $i,
            'image_html' => $image_html,
            'title' => $device['title'],
            'model_code' => $device['model_code'],
            'cat_title' => $device['cat_title'],
            'brand_title' => $device['brand_title'],
            'price_format' => $price_format,
            'quantity' => intval($device['quantity'] ?? 0),
            'status_html' => $status_html,
            'edit_url' => $link_edit,
            'view_url' => $link_view,
            'checkss' => md5($device['id'] . NV_CHECK_SESSION)
        ]);
        
        $xtpl->parse('main.loop');
    }
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';