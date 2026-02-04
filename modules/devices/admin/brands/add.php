<?php

/**
 * Thêm thương hiệu mới
 */

if (!defined('NV_ADMIN') || !defined('NV_MAINFILE') || !defined('NV_IS_MODADMIN')) {
    die('Stop!!!');
}

$page_title = 'Thêm thương hiệu';
$error = [];
$row = [
    'title' => '',
    'support' => '',
    'status' => 1
];

// ===== XỬ LÝ SUBMIT =====
if ($nv_Request->isset_request('submit', 'post')) {
    $row['title'] = $nv_Request->get_title('title', 'post', '');
    $row['support'] = $nv_Request->get_title('support', 'post', '');
    $row['status'] = $nv_Request->get_int('status', 'post', 0);
    
    // Validate
    if (empty($row['title'])) {
        $error[] = 'Tên thương hiệu không được trống';
    }
    
    // Insert
    if (empty($error)) {
        try {
            $sql = "INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . "_brands 
                    (title, support, status) 
                    VALUES (:title, :support, :status)";
            
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);
            $stmt->bindParam(':support', $row['support'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $row['status'], PDO::PARAM_INT);
            $stmt->execute();
            
            nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=brands/content');
        } catch (PDOException $e) {
            $error[] = 'Lỗi: ' . $e->getMessage();
        }
    }
}

// ===== HTML =====
$contents = '';

if (!empty($error)) {
    $contents .= '<div class="alert alert-danger">';
    foreach ($error as $err) {
        $contents .= '<p>' . $err . '</p>';
    }
    $contents .= '</div>';
}

$contents .= '<form method="post" class="form-horizontal">';

$contents .= '<div class="panel panel-primary">
    <div class="panel-heading">Thông tin thương hiệu</div>
    <div class="panel-body">';

$contents .= '<div class="form-group">
    <label class="col-sm-3 control-label">Tên thương hiệu <span class="text-danger">*</span></label>
    <div class="col-sm-9">
        <input type="text" name="title" class="form-control" value="' . $row['title'] . '" required placeholder="Ví dụ: Dell, HP, Asus...">
    </div>
</div>';

$contents .= '<div class="form-group">
    <label class="col-sm-3 control-label">Website hỗ trợ</label>
    <div class="col-sm-9">
        <input type="text" name="support" class="form-control" value="' . $row['support'] . '" placeholder="https://www.dell.com">
        <small class="help-block">Link website chính thức của thương hiệu</small>
    </div>
</div>';

$contents .= '<div class="form-group">
    <label class="col-sm-3 control-label">Trạng thái</label>
    <div class="col-sm-9">';

for ($i = 0; $i <= 1; $i++) {
    $checked = $row['status'] == $i ? ' checked' : '';
    $label = $i == 1 ? '<span class="text-success"><i class="fa fa-eye"></i> Hiển thị</span>' : '<span class="text-muted"><i class="fa fa-eye-slash"></i> Ẩn</span>';
    
    $contents .= '<label class="radio-inline">
        <input type="radio" name="status" value="' . $i . '"' . $checked . '> ' . $label . '
    </label>';
}

$contents .= '</div></div>';

$contents .= '</div></div>';

$contents .= '<div class="text-center">
    <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Lưu</button>
    <a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=brands/content" class="btn btn-default btn-lg"><i class="fa fa-times"></i> Hủy</a>
</div>';

$contents .= '</form>';

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';