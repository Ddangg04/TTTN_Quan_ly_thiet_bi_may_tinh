<?php

/**
 * NukeViet Content Management System
 * @version 5.x
 */

if (!defined('NV_IS_MOD_' . strtoupper($module_name))) {
    exit('Stop!!!');
}

$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];
$description = $module_info['description'];

// Lấy sản phẩm nổi bật
$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_devices 
        WHERE status=1 AND is_featured=1 
        ORDER BY weight ASC, add_time DESC 
        LIMIT 10';
$result = $db->query($sql);
$featured_devices = [];
while ($row = $result->fetch()) {
    $featured_devices[] = $row;
}

// Lấy sản phẩm mới nhất
$sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_devices 
        WHERE status=1 
        ORDER BY add_time DESC 
        LIMIT 12';
$result = $db->query($sql);
$latest_devices = [];
while ($row = $result->fetch()) {
    $latest_devices[] = $row;
}

$contents = '<div class="container">';
$contents .= '<h1>' . $page_title . '</h1>';

// Sản phẩm nổi bật
if (!empty($featured_devices)) {
    $contents .= '<div class="featured-section">';
    $contents .= '<h2>Sản phẩm nổi bật</h2>';
    $contents .= '<div class="row">';
    
    foreach ($featured_devices as $device) {
        $contents .= '<div class="col-md-3">
            <div class="product-item">
                <div class="product-image">
                    <img src="' . NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $device['image'] . '" alt="' . $device['title'] . '">
                </div>
                <h3><a href="' . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $device['alias'] . '">' . $device['title'] . '</a></h3>
                <div class="product-price">' . number_format($device['price']) . ' đ</div>
            </div>
        </div>';
    }
    
    $contents .= '</div></div>';
}

// Sản phẩm mới nhất
$contents .= '<div class="latest-section">';
$contents .= '<h2>Sản phẩm mới nhất</h2>';
$contents .= '<div class="row">';

foreach ($latest_devices as $device) {
    $contents .= '<div class="col-md-3">
        <div class="product-item">
            <div class="product-image">
                <img src="' . NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $device['image'] . '" alt="' . $device['title'] . '">
            </div>
            <h3><a href="' . NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $device['alias'] . '">' . $device['title'] . '</a></h3>
            <div class="product-price">' . number_format($device['price']) . ' đ</div>
        </div>
    </div>';
}

$contents .= '</div></div>';
$contents .= '</div>';

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
