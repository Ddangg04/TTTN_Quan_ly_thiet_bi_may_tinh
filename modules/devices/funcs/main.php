<?php
/**
 * @Project NUKEVIET 5.x
 * @Controller LIST PAGE
 * @File main.php
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

// KHAI BÁO CÁC BIẾN HỆ THỐNG ĐỂ GIỮ GIAO DIỆN VÀ LẤY ẢNH
global $module_name, $module_data, $module_upload, $db, $nv_Request, $contents, $page_title;

// --- 1. LẤY THAM SỐ TỪ URL  ---
$page = $nv_Request->get_int('page', 'get', 1);
$per_page = 8; 
$catid = $nv_Request->get_int('catid', 'get', 0);
$brand = $nv_Request->get_int('brand', 'get', 0);
$q = $nv_Request->get_string('q', 'get', ''); 
$price_range = $nv_Request->get_int('price_range', 'get', 0);

$page_title = 'Danh sách thiết bị';

// --- 2. XÂY DỰNG ĐIỀU KIỆN TRUY VẤN  ---
$where = "status = 1";
$params = [];

if ($catid > 0) {
    $where .= " AND cat_id = :catid";
    $params[':catid'] = $catid;
    $row_cat = $db->query("SELECT title FROM " . NV_PREFIXLANG . "_" . $module_data . "_device_categories WHERE id = " . $catid)->fetch();
    if ($row_cat) $page_title = $row_cat['title'];
}

if ($brand > 0) {
    $where .= " AND brand_id = :brandid";
    $params[':brandid'] = $brand;
}

if (!empty($q)) {
    $where .= " AND (title LIKE :q OR model_code LIKE :q_model)";
    $params[':q'] = '%' . $q . '%';
    $params[':q_model'] = '%' . $q . '%';
}

if ($price_range == 1) $where .= " AND price < 10000000";
elseif ($price_range == 2) $where .= " AND price >= 10000000 AND price <= 20000000";
elseif ($price_range == 3) $where .= " AND price > 20000000 AND price <= 30000000";
elseif ($price_range == 4) $where .= " AND price > 30000000";

// --- 3. THỰC THI TRUY VẤN DỮ LIỆU ---
$sql_count = "SELECT COUNT(*) FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices WHERE " . $where;
$sth = $db->prepare($sql_count);
foreach ($params as $key => $value) {
    $sth->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
}
$sth->execute();
$num_items = $sth->fetchColumn();

$offset = ($page - 1) * $per_page;
$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices 
        WHERE " . $where . " 
        ORDER BY id DESC 
        LIMIT $per_page OFFSET $offset";

$sth = $db->prepare($sql);
foreach ($params as $key => $value) {
    $sth->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
}
$sth->execute();
$array_data = $sth->fetchAll();

// --- 4. TẠO PHÂN TRANG ---
$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name;
if ($catid > 0) $base_url .= '&catid=' . $catid;
if ($brand > 0) $base_url .= '&brand=' . $brand;
if (!empty($q)) $base_url .= '&q=' . urlencode($q);
if ($price_range > 0) $base_url .= '&price_range=' . $price_range;

$page_html = nv_generate_page($base_url, $num_items, $per_page, $page);

// Đóng gói mảng để truyền vào hàm render
$pagination = ['html' => $page_html];
$filters = ['q' => $q, 'price_range' => $price_range];

// --- 5. QUAN TRỌNG:
// Hàm này nằm trong functions.php đã sửa để lấy ảnh
$contents = nv_render_theme_list($array_data, $page_title, $pagination, $filters);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents); 
include NV_ROOTDIR . '/includes/footer.php';