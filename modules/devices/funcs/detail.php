<?php
/**
 * @Project NUKEVIET 5.x
 * @Controller DETAIL PAGE
 */

if (!defined('NV_MAINFILE')) die('Stop!!!');

$id = $nv_Request->get_int('id', 'get', 0);

$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices WHERE id=" . $id . " AND status=1";
$row = $db->query($sql)->fetch();

if (empty($row)) {
    Header("Location: " . NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name);
    exit();
}

$page_title = $row['title'];
$key_words = $row['title'];
$description = strip_tags($row['description']);

// Images
$sql_img = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_device_images WHERE device_id=" . $id;
$images = $db->query($sql_img)->fetchAll();

// Related
$sql_rel = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_devices 
            WHERE cat_id=" . $row['cat_id'] . " AND id!=" . $id . " AND status=1 
            ORDER BY RAND() LIMIT 4";
$related = $db->query($sql_rel)->fetchAll();

$contents = nv_render_theme_detail($row, $images, $related);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';