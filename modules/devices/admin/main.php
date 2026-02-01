<?php

/**
 * NukeViet Content Management System
 * @version 5.x
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$page_title = 'Dashboard';

// Thống kê
$sql = 'SELECT COUNT(*) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_devices';
$total_devices = $db->query($sql)->fetchColumn();

$sql = 'SELECT COUNT(*) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_device_categories';
$total_categories = $db->query($sql)->fetchColumn();

$sql = 'SELECT COUNT(*) FROM ' . NV_PREFIXLANG . '_' . $module_data . '_brands';
$total_brands = $db->query($sql)->fetchColumn();

// Sản phẩm mới nhất
$sql = 'SELECT id, title, add_time, price FROM ' . NV_PREFIXLANG . '_' . $module_data . '_devices 
        ORDER BY add_time DESC LIMIT 10';
$result = $db->query($sql);
$latest_devices = [];
while ($row = $result->fetch()) {
    $latest_devices[] = $row;
}

$contents = '<div class="panel panel-primary">
    <div class="panel-heading">Thống kê</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-4">
                <div class="alert alert-info">
                    <strong>' . $total_devices . '</strong> Sản phẩm
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-success">
                    <strong>' . $total_categories . '</strong> Danh mục
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-warning">
                    <strong>' . $total_brands . '</strong> Thương hiệu
                </div>
            </div>
        </div>
    </div>
</div>';

$contents .= '<div class="panel panel-default">
    <div class="panel-heading">Sản phẩm mới nhất</div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Thời gian</th>
                </tr>
            </thead>
            <tbody>';

foreach ($latest_devices as $device) {
    $contents .= '<tr>
        <td>' . $device['id'] . '</td>
        <td>' . $device['title'] . '</td>
        <td>' . number_format($device['price']) . ' đ</td>
        <td>' . date('d/m/Y H:i', $device['add_time']) . '</td>
    </tr>';
}

$contents .= '</tbody></table></div></div>';

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
