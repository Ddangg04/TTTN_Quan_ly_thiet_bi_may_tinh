<?php

/**
 * @Project NUKEVIET 5.x
 * @Controller Brands Add - UI Optimized
 */

if (!defined('NV_ADMIN') || !defined('NV_MAINFILE') || !defined('NV_IS_MODADMIN')) {
    die('Stop!!!');
}

$page_title = 'Thêm thương hiệu mới';
$error = [];
$row = ['title' => '', 'support' => '', 'status' => 1];

if ($nv_Request->isset_request('submit', 'post')) {
    $row['title'] = $nv_Request->get_title('title', 'post', '');
    $row['support'] = $nv_Request->get_title('support', 'post', '');
    $row['status'] = $nv_Request->get_int('status', 'post', 0);
    
    if (empty($row['title'])) {
        $error[] = 'Tên thương hiệu không được trống';
    }
    
    if (empty($error)) {
        try {
            $sql = "INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . "_brands (title, support, status) VALUES (:title, :support, :status)";
            $stmt = $db->prepare($sql);
            $stmt->execute([':title' => $row['title'], ':support' => $row['support'], ':status' => $row['status']]);
            nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/content');
        } catch (PDOException $e) { $error[] = 'Lỗi: ' . $e->getMessage(); }
    }
}

$contents = '<style>
    .card-custom { background: #fff; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: none; margin-top: 20px; }
    .card-header-custom { background: #f8f9fa; border-bottom: 1px solid #eee; padding: 20px; border-radius: 10px 10px 0 0; }
    .card-body-custom { padding: 30px; }
    .form-control-custom { border-radius: 6px; border: 1px solid #ddd; padding: 10px 15px; }
    .btn-custom-save { border-radius: 6px; padding: 10px 35px; font-weight: bold; background-color: #337ab7; color: #fff; border: none; }
    .control-label-custom { font-weight: 600; color: #444; margin-bottom: 8px; }
</style>';

$contents .= '<div class="row"><div class="col-md-8 col-md-offset-2">';
if (!empty($error)) {
    $contents .= '<div class="alert alert-danger" style="border-radius:8px;">' . implode('<br>', $error) . '</div>';
}

$contents .= '<form method="post">
    <div class="card-custom">
        <div class="card-header-custom"><h3 class="panel-title"><i class="fa fa-plus-circle text-primary"></i> <strong>Thêm thương hiệu mới</strong></h3></div>
        <div class="card-body-custom">
            <div class="form-group">
                <label class="control-label-custom">Tên thương hiệu <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control form-control-custom" value="' . $row['title'] . '" placeholder="Ví dụ: Dell, Apple, Samsung..." required>
            </div>
            <div class="form-group">
                <label class="control-label-custom">Website hỗ trợ</label>
                <input type="url" name="support" class="form-control form-control-custom" value="' . $row['support'] . '" placeholder="https://">
            </div>
            <div class="form-group">
                <label class="control-label-custom" style="display:block;">Trạng thái hiển thị</label>
                <div style="background: #f9f9f9; padding: 10px; border-radius: 6px; border: 1px solid #eee;">
                    <label class="radio-inline"><input type="radio" name="status" value="1" ' . ($row['status'] == 1 ? 'checked' : '') . '> <span class="text-success">Hiển thị</span></label>
                    <label class="radio-inline"><input type="radio" name="status" value="0" ' . ($row['status'] == 0 ? 'checked' : '') . '> <span class="text-muted">Ẩn</span></label>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/content" class="btn btn-default" style="border-radius:6px; padding:10px 30px;">Hủy</a>
                <button type="submit" name="submit" class="btn btn-custom-save"><i class="fa fa-save"></i> Lưu thương hiệu</button>
            </div>
        </div>
    </div>
</form></div></div>';

echo nv_admin_theme($contents);