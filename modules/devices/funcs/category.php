<?php
/**
 * Module Devices - Category
 * NukeViet 5.x
 */

if (!defined('NV_IS_MOD_DEVICES')) {
    exit('Stop!!!');
}

global $db, $nv_Request, $module_name, $module_data, $module_info;

$alias = trim(str_replace('category/', '', $op));
if (empty($alias) || $alias == 'category') {
    nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name);
}

// Lấy thông tin danh mục

$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_device_categories
        WHERE alias = :alias AND status = 1';

$stmt = $db->prepare($sql);
$stmt->bindParam(':alias', $alias, PDO::PARAM_STR);
$stmt->execute();

$category = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($category)) {
    nv_redirect_location(NV_BASE_SITEURL);
}

// SEO

$page_title = $category['title'];
$key_words  = $category['title'];
$description = $category['description'];

// Lấy danh sách sản phẩm theo danh mục

$sql = 'SELECT id, title, image, price
        FROM ' . NV_PREFIXLANG . '_' . $module_data . '_devices
        WHERE cat_id = ' . intval($category['id']) . ' AND status = 1
        ORDER BY id DESC';

$result = $db->query($sql);

$devices = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $devices[] = $row;
}
// Render giao diện

$contents  = '<h1>' . $category['title'] . '</h1>';

if (!empty($category['description'])) {
    $contents .= '<p>' . $category['description'] . '</p>';
}

if (!empty($devices)) {
    $contents .= '<ul>';
    foreach ($devices as $item) {
        $contents .= '<li>';
        $contents .= '<strong>' . $item['title'] . '</strong>';
        $contents .= ' - Giá: ' . number_format($item['price']) . ' đ';
        $contents .= '</li>';
    }
    $contents .= '</ul>';
} else {
    $contents .= '<p>Không có sản phẩm trong danh mục này.</p>';
}
// Xuất giao diện

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
