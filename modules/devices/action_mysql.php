<?php

/**
 * NukeViet Content Management System
 * @version 5.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2024 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_FILE_MODULES')) {
    exit('Stop!!!');
}

// SQL DROP TABLE khi gỡ cài đặt (Uninstall)
$sql_drop_module = [];
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_devices';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_device_images';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_device_categories';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_brands';

$sql_create_module = $sql_drop_module;

// ==================================================
// 1. BẢNG BRANDS (Thương hiệu) - Lâm phụ trách
// ==================================================
$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brands (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(250) NOT NULL COMMENT 'Tên thương hiệu',
  alias varchar(250) NOT NULL COMMENT 'Alias cho SEO',
  image varchar(255) DEFAULT '' COMMENT 'Logo thương hiệu',
  support text COMMENT 'Thông tin hỗ trợ, link website',
  description text COMMENT 'Mô tả thương hiệu',
  keywords varchar(255) DEFAULT '' COMMENT 'Từ khóa SEO',
  status tinyint(1) unsigned NOT NULL DEFAULT 1 COMMENT '0=Ẩn, 1=Hiển thị',
  weight int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'Thứ tự sắp xếp',
  add_time int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'Thời gian thêm',
  edit_time int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'Thời gian sửa',
  PRIMARY KEY (id),
  UNIQUE KEY alias (alias),
  KEY status (status),
  KEY weight (weight)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bảng thương hiệu thiết bị'";

// ==================================================
// 2. BẢNG DEVICE_CATEGORIES (Danh mục) - Đăng phụ trách
// ==================================================
$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_categories (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  parent_id int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'ID danh mục cha (0=gốc)',
  title varchar(250) NOT NULL COMMENT 'Tên danh mục',
  alias varchar(250) NOT NULL COMMENT 'Alias cho SEO',
  image varchar(255) DEFAULT '' COMMENT 'Hình ảnh danh mục',
  description text COMMENT 'Mô tả danh mục',
  keywords varchar(255) DEFAULT '' COMMENT 'Từ khóa SEO',
  groups_view varchar(255) DEFAULT '' COMMENT 'Nhóm được xem',
  status tinyint(1) unsigned NOT NULL DEFAULT 1 COMMENT '0=Ẩn, 1=Hiển thị',
  weight int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'Thứ tự',
  add_time int(11) unsigned NOT NULL DEFAULT 0,
  edit_time int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY alias (alias),
  KEY parent_id (parent_id),
  KEY status (status),
  KEY weight (weight)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bảng danh mục thiết bị'";

// ==================================================
// 3. BẢNG DEVICES (Sản phẩm) - Thảo phụ trách
// ==================================================
$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  cat_id int(11) unsigned NOT NULL COMMENT 'ID danh mục',
  brand_id int(11) unsigned NOT NULL COMMENT 'ID thương hiệu',
  model_code varchar(100) DEFAULT '' COMMENT 'Mã model sản phẩm',
  title varchar(250) NOT NULL COMMENT 'Tên sản phẩm',
  alias varchar(250) NOT NULL COMMENT 'Alias SEO',
  image varchar(255) DEFAULT '' COMMENT 'Ảnh đại diện',
  homeimgfile varchar(255) DEFAULT '' COMMENT 'Ảnh thumbnail',
  homeimgthumb tinyint(1) unsigned NOT NULL DEFAULT 0,
  inhome tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT 'Hiển thị trang chủ',
  quantity int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'Số lượng',
  price decimal(15,2) unsigned NOT NULL DEFAULT 0.00 COMMENT 'Giá bán',
  price_old decimal(15,2) unsigned NOT NULL DEFAULT 0.00 COMMENT 'Giá cũ',
  description text COMMENT 'Mô tả ngắn',
  bodytext longtext COMMENT 'Nội dung chi tiết',
  keywords varchar(255) DEFAULT '' COMMENT 'Từ khóa',
  status tinyint(1) unsigned NOT NULL DEFAULT 1 COMMENT '0=Ẩn,1=Hiển thị,2=Hết hàng',
  weight int(11) unsigned NOT NULL DEFAULT 0,
  hitstotal int(11) unsigned NOT NULL DEFAULT 0 COMMENT 'Lượt xem',
  hitscm int(11) unsigned NOT NULL DEFAULT 0,
  hitslm int(11) unsigned NOT NULL DEFAULT 0,
  is_featured tinyint(1) unsigned NOT NULL DEFAULT 0 COMMENT 'Nổi bật',
  groups_view varchar(255) DEFAULT '',
  add_time int(11) unsigned NOT NULL DEFAULT 0,
  edit_time int(11) unsigned NOT NULL DEFAULT 0,
  userid int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY alias (alias),
  KEY cat_id (cat_id),
  KEY brand_id (brand_id),
  KEY status (status),
  KEY weight (weight),
  KEY is_featured (is_featured),
  KEY price (price),
  KEY add_time (add_time),
  CONSTRAINT fk_devices_category FOREIGN KEY (cat_id) 
    REFERENCES " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_categories (id) 
    ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT fk_devices_brand FOREIGN KEY (brand_id) 
    REFERENCES " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brands (id) 
    ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bảng sản phẩm'";

// ==================================================
// 4. BẢNG DEVICE_IMAGES (Hình ảnh) - Thảo phụ trách
// ==================================================
$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_images (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  device_id int(11) unsigned NOT NULL COMMENT 'ID sản phẩm',
  url varchar(255) NOT NULL COMMENT 'Đường dẫn ảnh',
  note varchar(255) DEFAULT '' COMMENT 'Ghi chú',
  weight int(11) unsigned NOT NULL DEFAULT 0,
  add_time int(11) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  KEY device_id (device_id),
  KEY weight (weight),
  CONSTRAINT fk_images_device FOREIGN KEY (device_id) 
    REFERENCES " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices (id) 
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bảng hình ảnh'";

// ==================================================
// INSERT DỮ LIỆU MẪU
// ==================================================

// Dữ liệu mẫu BRANDS
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_brands 
(id, title, alias, image, support, description, status, weight, add_time, edit_time) VALUES
(1, 'Dell', 'dell', '', 'https://www.dell.com', 'Thương hiệu máy tính Dell của Mỹ', 1, 1, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(2, 'HP', 'hp', '', 'https://www.hp.com', 'Hewlett-Packard - Thương hiệu nổi tiếng', 1, 2, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(3, 'Asus', 'asus', '', 'https://www.asus.com', 'Thương hiệu ASUS của Đài Loan', 1, 3, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(4, 'Lenovo', 'lenovo', '', 'https://www.lenovo.com', 'Lenovo - Thương hiệu Trung Quốc', 1, 4, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(5, 'Acer', 'acer', '', 'https://www.acer.com', 'Acer - Thương hiệu Đài Loan', 1, 5, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(6, 'Apple', 'apple', '', 'https://www.apple.com', 'Apple - Thương hiệu cao cấp', 1, 6, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(7, 'MSI', 'msi', '', 'https://www.msi.com', 'MSI - Chuyên laptop gaming', 1, 7, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(8, 'Kingston', 'kingston', '', 'https://www.kingston.com', 'Kingston - RAM và SSD', 1, 8, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . ")";

// Dữ liệu mẫu DEVICE_CATEGORIES
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_categories 
(id, parent_id, title, alias, description, status, weight, add_time, edit_time) VALUES
(1, 0, 'Laptop', 'laptop', 'Máy tính xách tay các loại', 1, 1, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(2, 0, 'PC Desktop', 'pc-desktop', 'Máy tính để bàn', 1, 2, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(3, 0, 'Màn hình', 'man-hinh', 'Màn hình máy tính', 1, 3, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(4, 0, 'Linh kiện', 'linh-kien', 'Linh kiện máy tính', 1, 4, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(5, 1, 'Laptop Gaming', 'laptop-gaming', 'Laptop chuyên game', 1, 1, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(6, 1, 'Laptop Văn phòng', 'laptop-van-phong', 'Laptop văn phòng', 1, 2, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(7, 1, 'Laptop Đồ họa', 'laptop-do-hoa', 'Laptop đồ họa', 1, 3, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(8, 4, 'RAM', 'ram', 'Bộ nhớ RAM', 1, 1, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(9, 4, 'SSD', 'ssd', 'Ổ cứng SSD', 1, 2, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . "),
(10, 4, 'VGA', 'vga', 'Card đồ họa', 1, 3, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . ")";

// Dữ liệu mẫu DEVICES
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices 
(id, cat_id, brand_id, model_code, title, alias, quantity, price, price_old, description, bodytext, status, weight, is_featured, inhome, add_time, edit_time, userid) VALUES
(1, 5, 1, 'G15-5520', 'Dell Gaming G15 5520 i7-12700H', 'dell-gaming-g15-5520-i7-12700h', 10, 25990000, 29990000, 'Laptop gaming Dell G15 5520 với CPU Intel Core i7-12700H, RAM 16GB, RTX 3060 6GB', '<p>Dell Gaming G15 5520 là laptop gaming hiệu năng cao với cấu hình mạnh mẽ, thiết kế gaming chuyên nghiệp.</p><h3>Thông số kỹ thuật:</h3><ul><li>CPU: Intel Core i7-12700H</li><li>RAM: 16GB DDR5</li><li>VGA: RTX 3060 6GB</li><li>Màn hình: 15.6 inch Full HD 120Hz</li><li>Ổ cứng: 512GB SSD NVMe</li></ul>', 1, 1, 1, 1, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . ", 1),
(2, 5, 3, 'ROG-STRIX-G15', 'Asus ROG Strix G15 AMD Ryzen 9', 'asus-rog-strix-g15-amd-ryzen-9', 5, 32990000, 35990000, 'Laptop gaming Asus ROG Strix G15 với AMD Ryzen 9, RTX 3070', '<p>Asus ROG Strix G15 là dòng laptop gaming cao cấp với hiệu năng vượt trội.</p><h3>Thông số kỹ thuật:</h3><ul><li>CPU: AMD Ryzen 9 5900HX</li><li>RAM: 16GB DDR4</li><li>VGA: RTX 3070 8GB</li><li>Màn hình: 15.6 inch QHD 165Hz</li><li>Ổ cứng: 1TB SSD NVMe</li></ul>', 1, 2, 1, 1, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . ", 1),
(3, 6, 2, 'PAVILION-15', 'HP Pavilion 15 i5-1235U', 'hp-pavilion-15-i5-1235u', 15, 15990000, 17990000, 'Laptop văn phòng HP Pavilion 15 i5-1235U, RAM 8GB', '<p>HP Pavilion 15 phù hợp cho công việc văn phòng, học tập với thiết kế nhỏ gọn, pin tốt.</p><h3>Thông số kỹ thuật:</h3><ul><li>CPU: Intel Core i5-1235U</li><li>RAM: 8GB DDR4</li><li>VGA: Intel Iris Xe</li><li>Màn hình: 15.6 inch Full HD</li><li>Ổ cứng: 512GB SSD</li></ul>', 1, 3, 0, 1, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . ", 1),
(4, 8, 8, 'FURY-DDR4-16GB', 'Kingston Fury DDR4 16GB 3200MHz', 'kingston-fury-ddr4-16gb-3200mhz', 50, 1490000, 0, 'RAM Kingston Fury DDR4 16GB 3200MHz', '<p>Kingston Fury DDR4 16GB là RAM hiệu năng cao, ổn định cho gaming và làm việc.</p><h3>Thông số:</h3><ul><li>Dung lượng: 16GB (1x16GB)</li><li>Tốc độ: 3200MHz</li><li>CAS Latency: CL16</li><li>Điện áp: 1.35V</li></ul>', 1, 4, 0, 0, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . ", 1),
(5, 9, 8, 'NV2-1TB', 'Kingston NV2 SSD 1TB PCIe Gen 4', 'kingston-nv2-ssd-1tb-pcie-gen-4', 30, 1890000, 0, 'SSD NVMe Kingston NV2 1TB PCIe Gen 4', '<p>Kingston NV2 SSD 1TB với chuẩn PCIe Gen 4 tốc độ đọc ghi cực nhanh.</p><h3>Thông số:</h3><ul><li>Dung lượng: 1TB</li><li>Chuẩn: M.2 2280 NVMe PCIe Gen 4</li><li>Tốc độ đọc: 3500 MB/s</li><li>Tốc độ ghi: 2100 MB/s</li></ul>', 1, 5, 0, 0, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . ", 1)";

// Dữ liệu mẫu DEVICE_IMAGES
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_device_images 
(device_id, url, note, weight, add_time) VALUES
(1, 'products/dell-g15-1.jpg', 'Ảnh chính', 1, " . NV_CURRENTTIME . "),
(1, 'products/dell-g15-2.jpg', 'Góc nghiêng', 2, " . NV_CURRENTTIME . "),
(1, 'products/dell-g15-3.jpg', 'Bàn phím RGB', 3, " . NV_CURRENTTIME . "),
(2, 'products/asus-rog-1.jpg', 'Ảnh chính', 1, " . NV_CURRENTTIME . "),
(2, 'products/asus-rog-2.jpg', 'Logo ROG', 2, " . NV_CURRENTTIME . ")";

// SQL tạo config
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES 
('" . $lang . "', '" . $module_name . "', 'per_page', '20'),
('" . $lang . "', '" . $module_name . "', 'home_featured', '10'),
('" . $lang . "', '" . $module_name . "', 'auto_postname', '1'),
('" . $lang . "', '" . $module_name . "', 'rewrite_enable', '1'),
('" . $lang . "', '" . $module_name . "', 'price_symbol', 'đ')";