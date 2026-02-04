<?php

/**
 * @Project NUKEVIET 5.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2025 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

if (defined('NV_EDITOR')) {
    require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
}

$page_title = 'Thêm thiết bị mới';
$error = [];

$row = [
    'id' => 0,
    'cat_id' => 0,
    'brand_id' => 0,
    'title' => '',
    'model_code' => '',
    'quantity' => 1,
    'price' => 0,
    'status' => 1,
    'image' => '',
    'description' => '',
    'content' => '',
    'other_images' => []
];


$checksess = md5($global_config['sitekey'] . session_id());

if ($nv_Request->isset_request('submit', 'post')) {
    $checkss_post = $nv_Request->get_title('checkss', 'post', '');

    if ($checkss_post != $checksess) {
        $error[] = 'Phiên làm việc không hợp lệ. Vui lòng thử lại.';
    } else {
        // Lấy dữ liệu từ Form
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


                $device_id = createDevice($data);
                $result = ($device_id > 0);

                if ($result) {
                    if (!empty($row['other_images'])) {
                        foreach ($row['other_images'] as $item) {
                            if (!empty($item['path'])) {
                                addDeviceImage($device_id, $item['path'], $item['note'] ?? '');
                            }
                        }
                    }

                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Thêm thiết bị mới', 'ID: ' . $device_id . ' - ' . $row['title'], $admin_info['userid']);
                    $nv_Cache->delMod($module_name);
                    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
                } else {
                    $error[] = 'Không thể lưu dữ liệu. Vui lòng thử lại.';
                }
            } catch (Exception $e) {
                $error[] = 'Lỗi: ' . $e->getMessage();
            }
        }
    }
}

$cats = getCategories();
$brands = getBrands();

$contents = '';

if (!empty($error)) {
    $contents .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
    $contents .= '<ul class="mb-0">';
    foreach ($error as $err) {
        $contents .= '<li>' . $err . '</li>';
    }
    $contents .= '</ul>';
    $contents .= '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
    $contents .= '</div>';
}

$form_action = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=save_device';

$contents .= '
<form id="device-form" method="post" action="' . $form_action . '" class="needs-validation" novalidate>
    <input type="hidden" name="checkss" value="' . $checksess . '">
    <input type="hidden" name="submit" value="1">
    
    <div class="row g-3">
        <div class="col-lg-8 col-xxl-9">
            <div class="card mb-3">
                <div class="card-header fw-medium fs-5">
                    <i class="fa-solid fa-info-circle"></i> Thông tin chính
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Tên thiết bị <span class="text-danger">(*)</span></label>
                            <div class="position-relative">
                                <input type="text" class="form-control required" id="title" name="title" value="' . nv_htmlspecialchars($row['title']) . '" maxlength="255" required placeholder="VD: iPhone 15 Pro Max 256GB">
                                <div class="invalid-feedback">Vui lòng nhập tên thiết bị</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="model_code" class="form-label">Mã Model <span class="text-danger">(*)</span></label>
                            <div class="position-relative">
                                <input type="text" class="form-control required" id="model_code" name="model_code" value="' . nv_htmlspecialchars($row['model_code']) . '" maxlength="50" required placeholder="VD: IPH15PM-256">
                                <div class="invalid-feedback">Vui lòng nhập mã model</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header fw-medium fs-5">
                    <i class="fa-solid fa-file-text"></i> Mô tả & Nội dung chi tiết
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="main-image" class="form-label"><i class="fa-solid fa-image"></i> Hình ảnh đại diện <span class="text-danger">(*)</span></label>
                                <div class="border rounded p-2 mb-2">
                                    <div class="input-group input-group-sm mb-2">
                                        <input type="text" class="form-control" name="image" id="main-image" value="' . nv_htmlspecialchars($row['image']) . '" placeholder="Chọn ảnh..." readonly required>
                                        <button type="button" class="btn btn-secondary" data-toggle="selectfile" data-target="main-image" data-path="uploads/devices" data-type="image">
                                            <i class="fa-solid fa-file-image"></i>
                                        </button>
                                    </div>
                                    <div class="invalid-feedback" id="main-image-error">Vui lòng chọn hình ảnh đại diện</div>';

if (!empty($row['image'])) {
    $img_src = (strpos($row['image'], '/') === 0) ? $row['image'] : NV_BASE_SITEURL . $row['image'];
    $contents .= '
                                    <div id="main-image-preview" class="text-center mb-2">
                                        <img src="' . $img_src . '" alt="Preview" class="img-fluid rounded" style="max-height: 150px;">
                                    </div>';
} else {
    $contents .= '
                                    <div id="main-image-preview" class="text-center mb-2 d-none">
                                        <img src="" alt="Preview" class="img-fluid rounded" style="max-height: 150px;">
                                    </div>';
}

$contents .= '
                                    <div class="form-text mb-0">Ảnh chính sản phẩm</div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <label class="form-label d-flex justify-content-between align-items-center">
                                    <span><i class="fa-solid fa-images"></i> Album ảnh phụ</span>
                                    <button type="button" class="btn btn-success btn-sm" onclick="nv_add_other_image();">
                                        <i class="fa-solid fa-plus"></i> Thêm
                                    </button>
                                </label>
                                <div id="other-images-list" class="row g-2">';

if (!empty($row['other_images'])) {
    foreach ($row['other_images'] as $idx => $img) {
        $img_src = (strpos($img['path'], '/') === 0) ? $img['path'] : NV_BASE_SITEURL . $img['path'];
        $contents .= '
                                    <div class="col-md-6 col-lg-4 other-image-row">
                                        <div class="border rounded p-2 mb-2">
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="text" class="form-control form-control-sm" name="other_images[' . $idx . '][path]" id="other_image_' . $idx . '" value="' . nv_htmlspecialchars($img['path']) . '" placeholder="Đường dẫn..." readonly>
                                                <button type="button" class="btn btn-secondary" data-toggle="selectfile" data-target="other_image_' . $idx . '" data-path="uploads/devices" data-type="image">
                                                    <i class="fa-solid fa-file-image"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" onclick="this.closest(\'.other-image-row\').remove();">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                            <div class="text-center mb-2" id="other_image_preview_' . $idx . '">
                                                <img src="' . $img_src . '" alt="Preview" class="img-fluid rounded" style="max-height: 150px;">
                                            </div>
                                            <input type="text" class="form-control form-control-sm" name="other_images[' . $idx . '][note]" value="' . nv_htmlspecialchars($img['note'] ?? '') . '" placeholder="Ghi chú...">
                                        </div>
                                    </div>';
    }
}

$contents .= '
                                </div>';

if (empty($row['other_images'])) {
    $contents .= '<div class="text-muted small mt-2" id="no-img-msg">Bấm "Thêm" để upload ảnh</div>';
}

$contents .= '
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả ngắn</label>
                        <textarea name="description" id="description" class="form-control" rows="3" placeholder="Mô tả ngắn về sản phẩm">' . nv_htmlspecialchars($row['description']) . '</textarea>
                        <div class="form-text">Mô tả hiển thị trong danh sách sản phẩm</div>
                    </div>
                    
                    <div class="mb-0">
                        <label for="content" class="form-label">Nội dung chi tiết (Thông số kỹ thuật)</label>';

// Editor
if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
    $contents .= nv_aleditor('content', '100%', '350px', $row['content']);
} else {
    $contents .= '<textarea name="content" id="content" class="form-control" rows="10">' . nv_htmlspecialchars($row['content']) . '</textarea>';
}

$contents .= '
                        <div class="form-text">Thông tin chi tiết, thông số kỹ thuật sản phẩm</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-xxl-3">
            <div class="card mb-3">
                <div class="card-header fw-medium">
                    <i class="fa-solid fa-folder"></i> Phân loại
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="cat_id" class="form-label">Danh mục <span class="text-danger">(*)</span></label>
                        <select name="cat_id" id="cat_id" class="form-select" required>
                            <option value="0">-- Chọn danh mục --</option>';

foreach ($cats as $cid => $ctitle) {
    $selected = ($row['cat_id'] == $cid) ? 'selected' : '';
    $contents .= '<option value="' . $cid . '" ' . $selected . '>' . nv_htmlspecialchars($ctitle) . '</option>';
}

$contents .= '
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn danh mục</div>
                    </div>
                    <div class="mb-0">
                        <label for="brand_id" class="form-label">Thương hiệu <span class="text-danger">(*)</span></label>
                        <select name="brand_id" id="brand_id" class="form-select" required>
                            <option value="0">-- Chọn thương hiệu --</option>';

foreach ($brands as $bid => $btitle) {
    $selected = ($row['brand_id'] == $bid) ? 'selected' : '';
    $contents .= '<option value="' . $bid . '" ' . $selected . '>' . nv_htmlspecialchars($btitle) . '</option>';
}

$contents .= '
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn thương hiệu</div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header fw-medium">
                    <i class="fa-solid fa-shopping-cart"></i> Thông tin bán hàng
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="price" class="form-label">Giá bán (VNĐ) <span class="text-danger">(*)</span></label>
                        <input type="text" name="price" id="price" class="form-control price-input" value="' . number_format($row['price'], 0, ',', '.') . '" placeholder="VD: 29.990.000" required>
                        <div class="invalid-feedback">Giá bán phải lớn hơn 0</div>
                        <div class="form-text">Tự động format khi nhập</div>
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <label for="quantity" class="form-label">Số lượng</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="' . intval($row['quantity']) . '" min="0" placeholder="VD: 100">
                            <div class="invalid-feedback">Số lượng phải là số từ 0 trở lên</div>
                        </div>
                        <div class="col-6">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select name="status" id="status" class="form-select">
                                <option value="1" ' . ($row['status'] == 1 ? 'selected' : '') . '>Hoạt động</option>
                                <option value="0" ' . ($row['status'] == 0 ? 'selected' : '') . '>Ngưng bán</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg"> Lưu
                        </button>
                        <a href="' . NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '" class="btn btn-secondary">
                            <i class="fa-solid fa-times"></i> Hủy thêm sản phẩm
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<style>
/* Custom validation styles */
#device-form.was-validated .form-control:valid,
#device-form.was-validated .form-select:valid,
#device-form .form-control.is-valid,
#device-form .form-select.is-valid {
    border-color: #dee2e6 !important;
    background-image: none !important;
    padding-right: 0.75rem !important;
}

#device-form.was-validated .form-control:valid:focus,
#device-form.was-validated .form-select:valid:focus,
#device-form .form-control.is-valid:focus,
#device-form .form-select.is-valid:focus {
    border-color: #86b7fe !important;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25) !important;
    background-image: none !important;
}

/* Hiển thị viền đỏ khi invalid */
#device-form.was-validated .form-control:invalid,
#device-form.was-validated .form-select:invalid,
#device-form .form-control.is-invalid,
#device-form .form-select.is-invalid,
#device-form select.form-select.is-invalid,
#device-form select#cat_id.is-invalid,
#device-form select#brand_id.is-invalid,
#device-form input#price.is-invalid {
    border: 1px solid #dc3545 !important;
    border-color: #dc3545 !important;
    background-image: none !important;
    padding-right: 0.75rem !important;
}

#device-form.was-validated .form-control:invalid:focus,
#device-form.was-validated .form-select:invalid:focus,
#device-form .form-control.is-invalid:focus,
#device-form .form-select.is-invalid:focus,
#device-form select.form-select.is-invalid:focus,
#device-form select#cat_id.is-invalid:focus,
#device-form select#brand_id.is-invalid:focus,
#device-form input#price.is-invalid:focus {
    border-color: #dc3545 !important;
    box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25) !important;
    background-image: none !important;
}

/* Hiển thị thông báo lỗi */
#device-form .invalid-feedback {
    display: none !important;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.875em;
    color: #dc3545;
}

#device-form .invalid-feedback.d-block {
    display: block !important;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
    function updateMainImagePreview() {
        var imgPath = $("#main-image").val();
        var preview = $("#main-image-preview");
        if (imgPath) {
            var imgSrc = imgPath.startsWith("/") ? imgPath : ("' . NV_BASE_SITEURL . '" + imgPath);
            preview.removeClass("d-none").find("img").attr("src", imgSrc);
        } else {
            preview.addClass("d-none");
        }
    }
    
    $("#main-image").on("change", updateMainImagePreview);
    
    updateMainImagePreview();
    
    $(document).on("change", "#main-image", updateMainImagePreview);
    
    $(document).on("change", "[id^=other_image_]", function() {
        var inputId = $(this).attr("id");
        var imgPath = $(this).val();
        var previewId = inputId.replace("other_image_", "other_image_preview_");
        var preview = $("#" + previewId);
        
        if (imgPath) {
            var imgSrc = imgPath.startsWith("/") ? imgPath : ("' . NV_BASE_SITEURL . '" + imgPath);
            preview.removeClass("d-none").find("img").attr("src", imgSrc);
        } else {
            preview.addClass("d-none");
        }
    });

    $(".price-input").on("input", function() {
        var val = $(this).val().replace(/[^0-9]/g, "");
        if (val) {
            $(this).val(val.replace(/\B(?=(\d{3})+(?!\d))/g, "."));
        }
    });

    function updateStatusColor() {
        var status = $("#status").val();
        if (status == "1") {
            $("#status").css({ "color": "#28a745", "font-weight": "bold" });
        } else {
            $("#status").css({ "color": "#dc3545", "font-weight": "bold" });
        }
    }
    $("#status option").css("color", "#000");
    updateStatusColor();
    $("#status").on("change", function() { updateStatusColor(); });

    window.imageIndex = ' . (empty($row['other_images']) ? 0 : count($row['other_images'])) . ';
    window.nv_add_other_image = function() {
        $("#no-img-msg").hide();
        var html = \'<div class="col-md-6 col-lg-4 other-image-row">\' +
                   \'<div class="border rounded p-2 mb-2">\' +
                   \'<div class="input-group input-group-sm mb-2">\' +
                   \'<input type="text" class="form-control form-control-sm" name="other_images[\' + imageIndex + \'][path]" id="other_image_\' + imageIndex + \'" placeholder="Đường dẫn..." readonly>\' +
                   \'<button type="button" class="btn btn-secondary" data-toggle="selectfile" data-target="other_image_\' + imageIndex + \'" data-path="uploads/devices" data-type="image">\' +
                   \'<i class="fa-solid fa-file-image"></i>\' +
                   \'</button>\' +
                   \'<button type="button" class="btn btn-danger" onclick="this.closest(\\\'.other-image-row\\\').remove();">\' +
                   \'<i class="fa-solid fa-trash"></i>\' +
                   \'</button>\' +
                   \'</div>\' +
                   // BỔ SUNG: Vùng hiển thị Preview ảnh
                   \'<div class="text-center mb-2 d-none" id="other_image_preview_\' + imageIndex + \'">\' +
                   \'<img src="" alt="Preview" class="img-fluid rounded" style="max-height: 150px;">\' +
                   \'</div>\' +
                   \'<input type="text" class="form-control form-control-sm" name="other_images[\' + imageIndex + \'][note]" placeholder="Ghi chú...">\' +
                   \'</div>\' +
                   \'</div>\';
        $("#other-images-list").append(html);
        imageIndex++;
    };

    //form validation với hiển thị lỗi inline
    var forms = document.querySelectorAll(\'.needs-validation\');
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener(\'submit\', function(event) {
            var isValid = true;
            var firstError = null;
            
            // Kiểm tra tên thiết bị
            var title = document.getElementById(\'title\');
            var titleFeedback = title.parentElement.querySelector(\'.invalid-feedback\');
            if (!title.value.trim()) {
                title.classList.add(\'is-invalid\');
                if (titleFeedback) titleFeedback.classList.add(\'d-block\');
                isValid = false;
                if (!firstError) firstError = title;
            } else {
                title.classList.remove(\'is-invalid\');
                if (titleFeedback) titleFeedback.classList.remove(\'d-block\');
            }
            
            // Kiểm tra mã model
            var modelCode = document.getElementById(\'model_code\');
            var modelFeedback = modelCode.parentElement.querySelector(\'.invalid-feedback\');
            if (!modelCode.value.trim()) {
                modelCode.classList.add(\'is-invalid\');
                if (modelFeedback) modelFeedback.classList.add(\'d-block\');
                isValid = false;
                if (!firstError) firstError = modelCode;
            } else {
                modelCode.classList.remove(\'is-invalid\');
                if (modelFeedback) modelFeedback.classList.remove(\'d-block\');
            }
            
            // Kiểm tra danh mục
            var catId = document.getElementById(\'cat_id\');
            var catFeedback = catId.parentElement.querySelector(\'.invalid-feedback\');
            if (catId.value == "0" || catId.value == "") {
                catId.classList.add(\'is-invalid\');
                if (catFeedback) catFeedback.classList.add(\'d-block\');
                isValid = false;
                if (!firstError) firstError = catId;
            } else {
                catId.classList.remove(\'is-invalid\');
                if (catFeedback) catFeedback.classList.remove(\'d-block\');
            }
            
            // Kiểm tra thương hiệu
            var brandId = document.getElementById(\'brand_id\');
            var brandFeedback = brandId.parentElement.querySelector(\'.invalid-feedback\');
            if (brandId.value == "0" || brandId.value == "") {
                brandId.classList.add(\'is-invalid\');
                if (brandFeedback) brandFeedback.classList.add(\'d-block\');
                isValid = false;
                if (!firstError) firstError = brandId;
            } else {
                brandId.classList.remove(\'is-invalid\');
                if (brandFeedback) brandFeedback.classList.remove(\'d-block\');
            }
            
            // Kiểm tra hình ảnh đại diện
            var mainImage = document.getElementById(\'main-image\');
            var mainImageError = document.getElementById(\'main-image-error\');
            if (!mainImage.value.trim()) {
                mainImage.classList.add(\'is-invalid\');
                if (mainImageError) {
                    mainImageError.style.display = \'block\';
                    mainImageError.classList.add(\'d-block\');
                }
                isValid = false;
                if (!firstError) firstError = mainImage;
            } else {
                mainImage.classList.remove(\'is-invalid\');
                if (mainImageError) {
                    mainImageError.style.display = \'none\';
                    mainImageError.classList.remove(\'d-block\');
                }
            }
            
            // Kiểm tra giá bán
            var price = document.getElementById(\'price\');
            var priceFeedback = price.nextElementSibling;
            if (priceFeedback && !priceFeedback.classList.contains(\'invalid-feedback\')) {
                priceFeedback = price.parentElement.querySelector(\'.invalid-feedback\');
            }
            var priceValue = parseFloat(price.value.replace(/[^0-9]/g, \'\'));
            if (!price.value.trim() || isNaN(priceValue) || priceValue <= 0) {
                price.classList.add(\'is-invalid\');
                if (priceFeedback) priceFeedback.classList.add(\'d-block\');
                isValid = false;
                if (!firstError) firstError = price;
            } else {
                price.classList.remove(\'is-invalid\');
                if (priceFeedback) priceFeedback.classList.remove(\'d-block\');
            }
            
            // Kiểm tra số lượng
            var quantity = document.getElementById(\'quantity\');
            var qtyFeedback = quantity.parentElement.querySelector(\'.invalid-feedback\');
            var qtyValue = parseInt(quantity.value);
            if (isNaN(qtyValue) || qtyValue < 0) {
                quantity.classList.add(\'is-invalid\');
                if (qtyFeedback) qtyFeedback.classList.add(\'d-block\');
                isValid = false;
                if (!firstError) firstError = quantity;
            } else {
                quantity.classList.remove(\'is-invalid\');
                if (qtyFeedback) qtyFeedback.classList.remove(\'d-block\');
            }
            
            if (!isValid) {
                event.preventDefault();
                event.stopPropagation();
                if (firstError) {
                    firstError.focus();
                    firstError.scrollIntoView({ behavior: \'smooth\', block: \'center\' });
                }
            }
            
            form.classList.add(\'was-validated\');
        }, false);
    });
    
    $(\'#title, #model_code\').on(\'input\', function() {
        if ($(this).val().trim()) {
            $(this).removeClass(\'is-invalid\');
            $(this).closest(\'.position-relative\').find(\'.invalid-feedback\').removeClass(\'d-block\');
        }
    });
    
    $(\'#cat_id, #brand_id\').on(\'change\', function() {
        if ($(this).val() != "0" && $(this).val() != "") {
            $(this).removeClass(\'is-invalid\');
            $(this).parent().find(\'.invalid-feedback\').removeClass(\'d-block\');
        }
    });
    
    $(\'#main-image\').on(\'change\', function() {
        if ($(this).val().trim()) {
            $(this).removeClass(\'is-invalid\');
            $(\'#main-image-error\').hide().removeClass(\'d-block\');
        }
    });
    
    $(\'#price\').on(\'input\', function() {
        var priceValue = parseFloat($(this).val().replace(/[^0-9]/g, \'\'));
        if ($(this).val().trim() && !isNaN(priceValue) && priceValue > 0) {
            $(this).removeClass(\'is-invalid\');
            var feedback = $(this).next(\'.invalid-feedback\');
            if (feedback.length === 0) {
                feedback = $(this).parent().find(\'.invalid-feedback\');
            }
            feedback.removeClass(\'d-block\');
        }
    });
    
    $(\'#quantity\').on(\'input\', function() {
        var qtyValue = parseInt($(this).val());
        if (!isNaN(qtyValue) && qtyValue >= 0) {
            $(this).removeClass(\'is-invalid\');
            $(this).parent().find(\'.invalid-feedback\').removeClass(\'d-block\');
        }
    });
});
</script>
';

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';