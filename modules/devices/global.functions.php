<?php

/**
 * NukeViet Content Management System
 * @version 5.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2025 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_MAINFILE')) {
    exit('Stop!!!');
}

/**
 * Lấy danh sách thương hiệu (brands) để đổ vào selectbox
 * Dùng ở admin (form thêm/sửa devices) và frontend (lọc sản phẩm)
 *
 * @return array ['id' => 'title', ...]
 */
function getBrands()
{
    global $db, $db_config, $lang, $module_data;
    $sql = "SELECT id, title FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brands WHERE status=1 ORDER BY title ASC";
    $result = $db->query($sql);
    $brands = [];
    while ($row = $result->fetch()) {
        $brands[$row['id']] = $row['title'];
    }
    return $brands;
}

/**
 * Lấy danh sách danh mục sản phẩm (categories) để đổ vào selectbox
 * Dùng ở admin (form devices) và frontend (menu, lọc)
 *
 * @return array ['id' => 'title', ...]
 */
function getCategories()
{
    global $db, $db_config, $lang, $module_data;

    $sql = "SELECT id, title FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_categories 
            WHERE status=1 ORDER BY weight ASC, title ASC";

    $result = $db->query($sql);
    $categories = [];
    while ($row = $result->fetch()) {
        $categories[$row['id']] = $row['title'];
    }
    return $categories;
}

/**
 * Lấy thông tin chi tiết sản phẩm theo ID
 * Bao gồm thông tin brand, category và danh sách ảnh
 * Dùng ở frontend (trang chi tiết sản phẩm)
 *
 * @param int $id Device ID
 * @return array|false Device detail array hoặc false nếu không tìm thấy
 */
function getDeviceDetail($id)
{
    global $db, $db_config, $lang, $module_data;
    $id = intval($id);

    $sql = "SELECT d.*, b.title AS brand_title, c.title AS cat_title
            FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices d
            LEFT JOIN " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brands b ON d.brand_id = b.id
            LEFT JOIN " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_categories c ON d.cat_id = c.id
            WHERE d.id = " . $id . " AND d.status=1";
    $result = $db->query($sql);
    $device = $result->fetch();

    if ($device) {
        $sql_images = "SELECT id, url, note FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_images WHERE device_id = " . $id . " ORDER BY id ASC";
        $result_images = $db->query($sql_images);
        $device['images'] = [];
        while ($row = $result_images->fetch()) {
            $device['images'][] = $row;
        }
    }

    return $device;
}

/**
 * Lấy danh sách sản phẩm (Dùng chung cho cả Admin và Frontend)
 *
 * @param string $keyword Từ khóa tìm kiếm (title, model_code)
 * @param int $cat_id Lọc danh mục
 * @param int $brand_id Lọc thương hiệu
 * @param int $status Trạng thái (1=Hiện, 0=Ẩn, -1=Lấy tất cả)
 * @param int $limit Số lượng
 * @param int $offset Vị trí bắt đầu
 */
function getAllDevices($keyword = '', $cat_id = 0, $brand_id = 0, $status = 1, $limit = 10, $offset = 0)
{
    global $db, $db_config, $lang, $module_data;

    $where = "WHERE 1=1";

    if (!empty($keyword)) {
        $keyword_escape = $db->dblikeescape($keyword);
        $where .= " AND (d.title LIKE '%" . $keyword_escape . "%' OR d.model_code LIKE '%" . $keyword_escape . "%')";
    }

    if ($status != -1) {
        $where .= " AND d.status=" . intval($status);
    }

    if ($cat_id > 0) {
        $where .= " AND d.cat_id=" . intval($cat_id);
    }
    if ($brand_id > 0) {
        $where .= " AND d.brand_id=" . intval($brand_id);
    }

    $sql = "SELECT d.id, d.title, d.model_code, d.price, d.image, d.quantity, d.description, d.content, d.status, d.created_time, 
                   b.title AS brand_title, c.title AS cat_title
            FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices d
            LEFT JOIN " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brands b ON d.brand_id = b.id
            LEFT JOIN " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_categories c ON d.cat_id = c.id
            " . $where . "
            ORDER BY d.created_time DESC
            LIMIT " . intval($limit) . " OFFSET " . intval($offset);

    $result = $db->query($sql);
    $devices = [];
    while ($row = $result->fetch()) {
        $devices[] = $row;
    }
    return $devices;
}

/**
 * Thêm sản phẩm mới (Create)
 * Dùng ở admin (save_device.php)
 *
 * @param array $data Dữ liệu sản phẩm [cat_id, brand_id, model_code, title, quantity, price, description, content, image, status]
 * @return int|false Device ID nếu thành công, false nếu thất bại
 */
function createDevice($data)
{
    global $db, $db_config, $lang, $module_data;

    $sql = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices
            (cat_id, brand_id, model_code, title, quantity, price, description, content, image, status, created_time)
            VALUES (:cat_id, :brand_id, :model_code, :title, :quantity, :price, :description, :content, :image, :status, NOW())";

    try {
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        return $db->lastInsertId();
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Cập nhật sản phẩm (Update)
 * Dùng ở admin (save_device.php)
 *
 * @param int $id Device ID
 * @param array $data Dữ liệu cập nhật
 * @return bool True nếu thành công
 */
function updateDevice($id, $data)
{
    global $db, $db_config, $lang, $module_data;

    $id = intval($id);
    $set_parts = [];
    foreach ($data as $key => $value) {
        $set_parts[] = $key . "=:" . $key;
    }
    $set_clause = implode(", ", $set_parts);

    $sql = "UPDATE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices
            SET " . $set_clause . ", updated_time=NOW()
            WHERE id=" . $id;

    try {
        $stmt = $db->prepare($sql);
        $stmt->execute($data);
        return true;
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Xóa sản phẩm (Delete)
 * Xóa cả device_images liên kết
 * Dùng ở admin (del_device.php)
 *
 * @param int $id Device ID
 * @return bool True nếu thành công
 */
function deleteDevice($id)
{
    global $db, $db_config, $lang, $module_data, $module_upload;

    $id = intval($id);

    $device = getDeviceById($id);
    if (empty($device)) {
        return false;
    }

    try {
        if (!empty($device['image'])) {
            $main_image_path = NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $device['image'];
            if (is_file($main_image_path)) {
                @nv_deletefile($main_image_path);
            }
        }

        $images = getDeviceImages($id);
        foreach ($images as $img) {
            if (!empty($img['url'])) {
                $file_path = NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $img['url'];
                if (is_file($file_path)) {
                    @nv_deletefile($file_path);
                }
            }
        }

        $db->query("DELETE FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_images WHERE device_id = " . $id);

        $db->query("DELETE FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices WHERE id = " . $id);

        return true;

    } catch (Exception $e) {
        return false;
    }
}

/**
 * Lấy sản phẩm theo ID (chi tiết cho admin)
 * Dùng ở admin (edit_device.php)
 *
 * @param int $id Device ID
 * @return array|false
 */
function getDeviceById($id)
{
    global $db, $db_config, $lang, $module_data;

    $id = intval($id);
    $sql = "SELECT * FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices WHERE id=" . $id;
    $result = $db->query($sql);
    return $result->fetch();
}

/**
 * Thêm ảnh sản phẩm (Create Device Image)
 * Dùng ở admin (khi upload ảnh)
 *
 * @param int $device_id Device ID
 * @param string $url Đường dẫn ảnh
 * @param string $note Ghi chú (tuỳ chọn)
 * @return int|false Image ID nếu thành công
 */
function addDeviceImage($device_id, $url, $note = '')
{
    global $db, $db_config, $lang, $module_data;

    $device_id = intval($device_id);
    $sql = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_images
            (device_id, url, note)
            VALUES (" . $device_id . ", :url, :note)";

    try {
        $stmt = $db->prepare($sql);
        $stmt->execute([':url' => $url, ':note' => $note]);
        return $db->lastInsertId();
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Lấy danh sách ảnh của sản phẩm (Get Device Images)
 * Dùng ở admin (edit form) và frontend (hiển thị)
 *
 * @param int $device_id Device ID
 * @return array Danh sách ảnh
 */
function getDeviceImages($device_id)
{
    global $db, $db_config, $lang, $module_data;

    $device_id = intval($device_id);
    $sql = "SELECT id, url, note FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_images
            WHERE device_id=" . $device_id . "
            ORDER BY id ASC";

    $result = $db->query($sql);
    $images = [];
    while ($row = $result->fetch()) {
        $images[] = $row;
    }
    return $images;
}

/**
 * Xóa ảnh sản phẩm (Delete Device Image)
 * Dùng ở admin (khi edit và xóa ảnh cũ)
 *
 * @param int $image_id Image ID
 * @return bool True nếu thành công
 */
function deleteDeviceImage($image_id)
{
    global $db, $db_config, $lang, $module_data;
    $image_id = intval($image_id);

    try {
        $sql = "SELECT url FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_images WHERE id=" . $image_id;
        $result = $db->query($sql);
        $row = $result->fetch();

        if ($row) {

            $file_path = NV_ROOTDIR . '/' . $row['url'];
            if (file_exists($file_path)) {
                @unlink($file_path);
            }
            $sql = "DELETE FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_images WHERE id=" . $image_id;
            $db->query($sql);
            return true;
        }
        return false;
    } catch (Exception $e) {
        return false;
    }
}

/**
 * Đếm tổng số sản phẩm
 * Dùng để tính toán phân trang
 *
 * @param string $keyword Từ khóa tìm kiếm (title, model_code)
 * @param int $cat_id ID danh mục
 * @param int $brand_id ID thương hiệu
 * @param int $status Trạng thái (1=Hiện, 0=Ẩn, -1=Lấy tất cả)
 * @return int Tổng số dòng
 */
function countAllDevices($keyword = '', $cat_id = 0, $brand_id = 0, $status = 1)
{
    global $db, $db_config, $lang, $module_data;

    $where = "WHERE 1=1";

    if (!empty($keyword)) {
        $keyword_escape = $db->dblikeescape($keyword);
        $where .= " AND (d.title LIKE '%" . $keyword_escape . "%' OR d.model_code LIKE '%" . $keyword_escape . "%')";
    }
    if ($status != -1) {
        $where .= " AND d.status=" . intval($status);
    }
    if ($cat_id > 0) {
        $where .= " AND d.cat_id=" . intval($cat_id);
    }
    if ($brand_id > 0) {
        $where .= " AND d.brand_id=" . intval($brand_id);
    }

    $sql = "SELECT COUNT(*) FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices d " . $where;
    return $db->query($sql)->fetchColumn();
}


