<?php

/**
 * @Project NUKEVIET 5.x
 * @Controller Device Save - Optimized with Template
 * @Description Thêm/Sửa thiết bị
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

require_once NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php';

if (defined('NV_EDITOR')) {
    require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
}

if (defined('DEVICE_FORM_ONLY')) {
    goto RENDER_FORM;
}

// ===== XỬ LÝ SUBMIT FORM =====
$submit = $nv_Request->get_int('submit', 'post', 0);
if ($submit) {
    $id = $nv_Request->get_int('id', 'post', 0);
    $checksess = $nv_Request->get_title('checkss', 'post', '');

    if ($checksess != md5($global_config['sitekey'] . session_id())) {
        nv_redirect_location(NV_BASE_ADMINURL . NV_LANG_DATA . '/' . $module_name . '/devices/content/');
    }

    // Lấy dữ liệu từ Form
    $row = [];
    $row['id'] = $id;
    $row['title'] = $nv_Request->get_title('title', 'post', '');
    $row['model_code'] = $nv_Request->get_title('model_code', 'post', '');
    $row['cat_id'] = $nv_Request->get_int('cat_id', 'post', 0);
    $row['brand_id'] = $nv_Request->get_int('brand_id', 'post', 0);

    $price_raw = $nv_Request->get_title('price', 'post', '0');
    $row['price'] = floatval(str_replace(['.', ','], '', $price_raw));

    $row['quantity'] = $nv_Request->get_int('quantity', 'post', 0);
    $row['status'] = $nv_Request->get_int('status', 'post', 1);
    $row['image'] = $nv_Request->get_title('image', 'post', '');
    $row['description'] = $nv_Request->get_title('description', 'post', '');
    $row['content'] = $nv_Request->get_editor('content', '', NV_ALLOWED_HTML_TAGS);
    $row['other_images'] = $nv_Request->get_array('other_images', 'post', []);

    $error = [];

    // Validate
    if (empty($row['title'])) {
        $error[] = 'Vui lòng nhập tên thiết bị';
    }
    if (empty($row['model_code'])) {
        $error[] = 'Vui lòng nhập mã model';
    }
    if ($row['cat_id'] <= 0) {
        $error[] = 'Vui lòng chọn danh mục';
    }
    if ($row['brand_id'] <= 0) {
        $error[] = 'Vui lòng chọn thương hiệu';
    }

    // Lưu dữ liệu
    if (empty($error)) {
        try {
            $data = [
                'cat_id' => $row['cat_id'],
                'brand_id' => $row['brand_id'],
                'model_code' => $row['model_code'],
                'title' => $row['title'],
                'quantity' => $row['quantity'],
                'price' => $row['price'],
                'description' => $row['description'],
                'content' => $row['content'],
                'image' => $row['image'],
                'status' => $row['status']
            ];

            if ($id > 0) {
                $result = updateDevice($id, $data);
                $log_msg = 'Sửa thiết bị';
            } else {
                $id = createDevice($data);
                $result = ($id > 0);
                $log_msg = 'Thêm thiết bị mới';
            }

            if ($result) {
                // Xử lý ảnh phụ
                if ($id > 0) {
                    $old_images = getDeviceImages($id);
                    $old_paths = [];
                    foreach ($old_images as $old_img) {
                        $old_paths[$old_img['url']] = $old_img['id'];
                    }

                    $new_paths = [];
                    if (!empty($row['other_images'])) {
                        foreach ($row['other_images'] as $item) {
                            if (!empty($item['path'])) {
                                $new_paths[] = $item['path'];
                            }
                        }
                    }

                    foreach ($old_paths as $old_path => $old_id) {
                        if (!in_array($old_path, $new_paths)) {
                            deleteDeviceImage($old_id);
                        }
                    }

                    if (!empty($row['other_images'])) {
                        foreach ($row['other_images'] as $item) {
                            if (!empty($item['path']) && !isset($old_paths[$item['path']])) {
                                addDeviceImage($id, $item['path'], $item['note'] ?? '');
                            }
                        }
                    }
                } else {
                    if (!empty($row['other_images'])) {
                        foreach ($row['other_images'] as $item) {
                            if (!empty($item['path'])) {
                                addDeviceImage($id, $item['path'], $item['note'] ?? '');
                            }
                        }
                    }
                }

                nv_insert_logs(NV_LANG_DATA, $module_name, $log_msg, 'ID: ' . $id . ' - ' . $row['title'], $admin_info['userid']);
                $nv_Cache->delMod($module_name);
                nv_redirect_location(NV_BASE_ADMINURL . NV_LANG_DATA . '/' . $module_name . '/devices/content/');
            } else {
                $error[] = 'Không thể lưu dữ liệu. Vui lòng thử lại.';
            }
        } catch (Exception $e) {
            $error[] = 'Lỗi: ' . $e->getMessage();
        }
    }
}

// ===== KHỞI TẠO DỮ LIỆU FORM =====
$id = $nv_Request->get_int('id', 'get', 0);
$error = isset($error) ? $error : [];

if ($id > 0) {
    $row = getDeviceById($id);
    if (empty($row)) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
    }

    $images = getDeviceImages($id);
    $row['other_images'] = [];
    foreach ($images as $img) {
        $row['other_images'][] = [
            'path' => $img['url'],
            'note' => $img['note']
        ];
    }

    $page_title = 'Sửa thiết bị: ' . $row['title'];
} else {
    $row = [
        'id' => 0,
        'title' => '',
        'model_code' => '',
        'cat_id' => 0,
        'brand_id' => 0,
        'price' => 0,
        'quantity' => 1,
        'status' => 1,
        'image' => '',
        'description' => '',
        'content' => '',
        'other_images' => []
    ];
    $page_title = 'Thêm thiết bị mới';
}

RENDER_FORM:

// ===== XỬ LÝ TEMPLATE =====
$cats = getCategories();
$brands = getBrands();
$checksess = md5($global_config['sitekey'] . session_id());

$xtpl = new XTemplate('device_form.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);

// Form action URL
$form_action = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=devices/save_device';
if ($id > 0) {
    $form_action .= '&id=' . $id;
}

// Assign basic variables
$xtpl->assign('FORM_ACTION', $form_action);
$xtpl->assign('CHECKSS', $checksess);
$xtpl->assign('DATA', [
    'id' => $row['id'],
    'title' => nv_htmlspecialchars($row['title']),
    'model_code' => nv_htmlspecialchars($row['model_code']),
    'description' => nv_htmlspecialchars($row['description']),
    'image' => nv_htmlspecialchars($row['image']),
    'price' => number_format($row['price'], 0, ',', '.'),
    'quantity' => intval($row['quantity'])
]);

// Status select
$xtpl->assign('STATUS_1', ($row['status'] == 1) ? 'selected' : '');
$xtpl->assign('STATUS_0', ($row['status'] == 0) ? 'selected' : '');

// Submit button text
$xtpl->assign('SUBMIT_TEXT', ($row['id'] > 0 ? '<i class="fa-solid fa-save"></i> Cập nhật' : '<i class="fa-solid fa-save"></i> Lưu'));
$xtpl->assign('CANCEL_TEXT', '<i class="fa-solid fa-times"></i> ' . ($row['id'] > 0 ? 'Hủy sửa' : 'Hủy thêm'));
$xtpl->assign('CANCEL_URL', NV_BASE_ADMINURL . NV_LANG_DATA . '/' . $module_name . '/devices/content/');

// Main image preview
if (!empty($row['image'])) {
    $img_src = (strpos($row['image'], '/') === 0) ? $row['image'] : NV_BASE_SITEURL . $row['image'];
    $main_preview = '<div id="main-image-preview" class="text-center mb-2">
        <img src="' . $img_src . '" alt="Preview" class="img-fluid rounded" style="max-height: 150px;">
    </div>';
} else {
    $main_preview = '<div id="main-image-preview" class="text-center mb-2 d-none">
        <img src="" alt="Preview" class="img-fluid rounded" style="max-height: 150px;">
    </div>';
}
$xtpl->assign('MAIN_IMAGE_PREVIEW', $main_preview);

// Other images
if (!empty($row['other_images'])) {
    foreach ($row['other_images'] as $idx => $img) {
        $img_src = (strpos($img['path'], '/') === 0) ? $img['path'] : NV_BASE_SITEURL . $img['path'];
        $xtpl->assign('IMG', [
            'index' => $idx,
            'path' => nv_htmlspecialchars($img['path']),
            'src' => $img_src,
            'note' => nv_htmlspecialchars($img['note'] ?? '')
        ]);
        $xtpl->parse('main.other_image');
    }
} else {
    $xtpl->parse('main.no_images');
}

// Categories
foreach ($cats as $cid => $ctitle) {
    $xtpl->assign('CAT', [
        'id' => $cid,
        'title' => nv_htmlspecialchars($ctitle),
        'selected' => ($row['cat_id'] == $cid) ? 'selected' : ''
    ]);
    $xtpl->parse('main.cat_option');
}

// Brands
foreach ($brands as $bid => $btitle) {
    $xtpl->assign('BRAND', [
        'id' => $bid,
        'title' => nv_htmlspecialchars($btitle),
        'selected' => ($row['brand_id'] == $bid) ? 'selected' : ''
    ]);
    $xtpl->parse('main.brand_option');
}

// Editor
if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
    $editor = nv_aleditor('content', '100%', '350px', $row['content']);
} else {
    $editor = '<textarea name="content" id="content" class="form-control" rows="10">' . nv_htmlspecialchars($row['content']) . '</textarea>';
}
$xtpl->assign('EDITOR', $editor);

// Error messages
if (!empty($error)) {
    foreach ($error as $err) {
        $xtpl->assign('ERROR', $err);
        $xtpl->parse('main.error.loop');
    }
    $xtpl->parse('main.error');
}

// JavaScript & CSS
$image_count = empty($row['other_images']) ? 0 : count($row['other_images']);
$script = file_get_contents(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file . '/device_form_script.tpl');
$script = str_replace('{NV_BASE_SITEURL}', NV_BASE_SITEURL, $script);
$script = str_replace('{IMAGE_COUNT}', $image_count, $script);
$xtpl->assign('SCRIPT', $script);

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';