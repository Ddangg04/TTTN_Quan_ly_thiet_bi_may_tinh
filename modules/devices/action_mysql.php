<?php
/**
 * NukeViet Content Management System
 * @version 5.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2025 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @createdate 01/02/2025
 */

if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');

// ============================================================
// DROP - Xóa các bảng khi uninstall module (ngược thứ tự FK)
// ============================================================
$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_images";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_categories";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brands";

// ============================================================
// CREATE - Tạo các bảng khi install module
// ============================================================
$sql_create_module = $sql_drop_module;

// ---------------------------------------------------------------
// 1. Bảng: brands (Thương Hiệu)
// ---------------------------------------------------------------
$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brands (
    id        INT(11)      NOT NULL AUTO_INCREMENT,
    title     VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
    support   VARCHAR(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
    status    TINYINT(1)   NOT NULL DEFAULT 1,
    PRIMARY KEY (id),
    INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

// ---------------------------------------------------------------
// 2. Bảng: device_categories (Danh Mục Sản Phẩm)
// ---------------------------------------------------------------
$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_categories (
    id          INT(11)      NOT NULL AUTO_INCREMENT,
    parent_id   INT(11)      NOT NULL DEFAULT 0,
    title       VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
    description VARCHAR(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
    status      TINYINT(1)   NOT NULL DEFAULT 1,
    weight      INT(5)       NOT NULL DEFAULT 0,
    created_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    INDEX idx_parent   (parent_id),
    INDEX idx_status   (status),
    INDEX idx_weight   (weight)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

// ---------------------------------------------------------------
// 3. Bảng: devices (Sản Phẩm / Thiết Bị)
// ---------------------------------------------------------------
$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices (
    id           INT(11)       NOT NULL AUTO_INCREMENT,
    cat_id       INT(11)       NOT NULL DEFAULT 0,
    brand_id     INT(11)       NOT NULL DEFAULT 0,
    model_code   VARCHAR(100)  CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
    title        VARCHAR(255)  CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
    quantity     INT(8)        NOT NULL DEFAULT 0,
    price        DECIMAL(15,2) NOT NULL DEFAULT 0.00,
    description  TEXT          CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    content      TEXT          CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    image        VARCHAR(512)  CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
    status       TINYINT(1)    NOT NULL DEFAULT 1,
    created_time DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_time DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    INDEX idx_cat       (cat_id),
    INDEX idx_brand     (brand_id),
    INDEX idx_status    (status),
    INDEX idx_price     (price),
    INDEX idx_title     (title(100)),
    CONSTRAINT fk_devices_cat   FOREIGN KEY (cat_id)   REFERENCES " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_categories (id) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_devices_brand FOREIGN KEY (brand_id) REFERENCES " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brands (id) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

// ---------------------------------------------------------------
// 4. Bảng: device_images (Hình Ảnh Sản Phẩm)
// ---------------------------------------------------------------
$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_images (
    id        INT(11)      NOT NULL AUTO_INCREMENT,
    device_id INT(11)      NOT NULL DEFAULT 0,
    url       VARCHAR(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
    note      VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
    PRIMARY KEY (id),
    INDEX idx_device (device_id),
    CONSTRAINT fk_images_device FOREIGN KEY (device_id) REFERENCES " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

// ---------------------------------------------------------------
// Sample data: insert 1 brand + 1 category mẫu
// ---------------------------------------------------------------
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brands (title, support, status) VALUES ('Dell', 'https://www.dell.com', 1)";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_categories (parent_id, title, description, status, weight) VALUES (0, 'Laptop', 'Danh mục thiết bị Laptop', 1, 1)";
