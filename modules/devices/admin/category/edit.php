<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!defined('NV_ADMIN') || !defined('NV_MAINFILE') || !defined('NV_IS_MODADMIN')) {
    die('Stop!!!,Cat_edit');
}
$page_title = 'Sửa danh mục';
$id = $nv_Request->get_int('id', 'get', 0);

if ($id <= 0) {
    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=category/content');
}

// Lấy dữ liệu
$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_device_categories WHERE id = " . $id;
$row = $db->query($sql)->fetch();

if (empty($row)) {
    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=category/content');
}

$error = [];

// ===== XỬ LÝ SUBMIT =====
if ($nv_Request->isset_request('submit', 'post')) {
    $row['title'] = $nv_Request->get_title('title', 'post', '');
    $row['parent_id'] = $nv_Request->get_int('parent_id', 'post', 0);
    $row['description'] = $nv_Request->get_textarea('description', 'post', '');
    $row['status'] = $nv_Request->get_int('status', 'post', 0);
    $row['weight'] = $nv_Request->get_int('weight', 'post', 0);
    
    // Validate
    if (empty($row['title'])) {
        $error[] = 'Tên danh mục không được trống';
    }
    
    // Kiểm tra vòng lặp
    if (nv_check_category_loop($id, $row['parent_id'])) {
        $error[] = 'Không thể chọn danh mục này làm cha (tạo vòng lặp)';
    }
    
    // Update
    if (empty($error)) {
        try {
            $sql = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_device_categories SET 
                    parent_id = :parent_id,
                    title = :title,
                    description = :description,
                    status = :status,
                    weight = :weight
                    WHERE id = " . $id;
            
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':parent_id', $row['parent_id'], PDO::PARAM_INT);
            $stmt->bindParam(':title', $row['title'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $row['description'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $row['status'], PDO::PARAM_INT);
            $stmt->bindParam(':weight', $row['weight'], PDO::PARAM_INT);
            $stmt->execute();
            
            nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=category/content');
        } catch (PDOException $e) {
            $error[] = 'Lỗi: ' . $e->getMessage();
        }
    }
}

// ===== LẤY DANH SÁCH CATEGORIES (trừ chính nó) =====
$array_cat_list = [];
nv_show_cat_list(0, $array_cat_list);

// ===== HTML (tương tự add.php, thêm kiểm tra không cho chọn chính nó) =====
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
    <div class="panel-heading">Sửa danh mục</div>
    <div class="panel-body">';

$contents .= '<div class="form-group">
    <label class="col-sm-3 control-label">Tên danh mục <span class="text-danger">*</span></label>
    <div class="col-sm-9">
        <input type="text" name="title" class="form-control" value="' . $row['title'] . '" required>
    </div>
</div>';

$contents .= '<div class="form-group">
    <label class="col-sm-3 control-label">Danh mục cha</label>
    <div class="col-sm-9">
        <select name="parent_id" class="form-control">
            <option value="0">--- Danh mục gốc ---</option>';

foreach ($array_cat_list as $cat) {
    if ($cat['id'] != $id) { // Không cho chọn chính nó
        $selected = $row['parent_id'] == $cat['id'] ? ' selected' : '';
        $title_show = str_repeat('&nbsp;&nbsp;&nbsp;', $cat['lev']) . ($cat['lev'] > 0 ? '└─ ' : '') . $cat['title'];
        $contents .= '<option value="' . $cat['id'] . '"' . $selected . '>' . $title_show . '</option>';
    }
}

$contents .= '</select>
    </div>
</div>';

$contents .= '<div class="form-group">
    <label class="col-sm-3 control-label">Mô tả</label>
    <div class="col-sm-9">
        <textarea name="description" class="form-control" rows="3">' . $row['description'] . '</textarea>
    </div>
</div>';

$contents .= '<div class="form-group">
    <label class="col-sm-3 control-label">Trạng thái</label>
    <div class="col-sm-9">';

for ($i = 0; $i <= 1; $i++) {
    $checked = $row['status'] == $i ? ' checked' : '';
    $label = $i == 1 ? 'Hiển thị' : 'Ẩn';
    $contents .= '<label class="radio-inline">
        <input type="radio" name="status" value="' . $i . '"' . $checked . '> ' . $label . '
    </label>';
}

$contents .= '</div></div>';

$contents .= '<div class="form-group">
    <label class="col-sm-3 control-label">Thứ tự</label>
    <div class="col-sm-3">
        <input type="number" name="weight" class="form-control" value="' . $row['weight'] . '" min="0">
    </div>
</div>';

$contents .= '</div></div>';

$contents .= '<div class="text-center">
    <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Cập nhật</button>
    <a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=category/content" class="btn btn-default btn-lg"><i class="fa fa-times"></i> Hủy</a>
</div>';

$contents .= '</form>';

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';