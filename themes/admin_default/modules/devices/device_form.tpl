<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul class="mb-0">
        <!-- BEGIN: loop -->
        <li>{ERROR}</li>
        <!-- END: loop -->
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<!-- END: error -->

<form id="device-form" method="post" action="{FORM_ACTION}" class="needs-validation" novalidate>
    <input type="hidden" name="checkss" value="{CHECKSS}">
    <input type="hidden" name="id" value="{DATA.id}">
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
                                <input type="text" class="form-control required" id="title" name="title" value="{DATA.title}" maxlength="255" required placeholder="VD: iPhone 15 Pro Max 256GB">
                                <div class="invalid-feedback">Vui lòng nhập tên thiết bị</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="model_code" class="form-label">Mã Model <span class="text-danger">(*)</span></label>
                            <div class="position-relative">
                                <input type="text" class="form-control required" id="model_code" name="model_code" value="{DATA.model_code}" maxlength="50" required placeholder="VD: IPH15PM-256">
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
                                        <input type="text" class="form-control" name="image" id="main-image" value="{DATA.image}" placeholder="Chọn ảnh..." readonly required>
                                        <button type="button" class="btn btn-secondary" data-toggle="selectfile" data-target="main-image" data-path="uploads/devices" data-type="image">
                                            <i class="fa-solid fa-file-image"></i>
                                        </button>
                                    </div>
                                    <div class="invalid-feedback" id="main-image-error">Vui lòng chọn hình ảnh đại diện</div>
                                    {MAIN_IMAGE_PREVIEW}
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
                                <div id="other-images-list" class="row g-2">
                                    <!-- BEGIN: other_image -->
                                    <div class="col-md-6 col-lg-4 other-image-row">
                                        <div class="border rounded p-2 mb-2">
                                            <div class="input-group input-group-sm mb-2">
                                                <input type="text" class="form-control form-control-sm" name="other_images[{IMG.index}][path]" id="other_image_{IMG.index}" value="{IMG.path}" placeholder="Đường dẫn..." readonly>
                                                <button type="button" class="btn btn-secondary" data-toggle="selectfile" data-target="other_image_{IMG.index}" data-path="uploads/devices" data-type="image">
                                                    <i class="fa-solid fa-file-image"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" onclick="this.closest('.other-image-row').remove();">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                            <div class="text-center mb-2" id="other_image_preview_{IMG.index}">
                                                <img src="{IMG.src}" alt="Preview" class="img-fluid rounded" style="max-height: 150px;">
                                            </div>
                                            <input type="text" class="form-control form-control-sm" name="other_images[{IMG.index}][note]" value="{IMG.note}" placeholder="Ghi chú...">
                                        </div>
                                    </div>
                                    <!-- END: other_image -->
                                </div>
                                <!-- BEGIN: no_images -->
                                <div class="text-muted small mt-2" id="no-img-msg">Bấm "Thêm" để upload ảnh</div>
                                <!-- END: no_images -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả ngắn</label>
                        <textarea name="description" id="description" class="form-control" rows="3" placeholder="Mô tả ngắn về sản phẩm">{DATA.description}</textarea>
                        <div class="form-text">Mô tả hiển thị trong danh sách sản phẩm</div>
                    </div>
                    
                    <div class="mb-0">
                        <label for="content" class="form-label">Nội dung chi tiết (Thông số kỹ thuật)</label>
                        {EDITOR}
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
                            <option value="0">-- Chọn danh mục --</option>
                            <!-- BEGIN: cat_option -->
                            <option value="{CAT.id}" {CAT.selected}>{CAT.title}</option>
                            <!-- END: cat_option -->
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn danh mục</div>
                    </div>
                    <div class="mb-0">
                        <label for="brand_id" class="form-label">Thương hiệu <span class="text-danger">(*)</span></label>
                        <select name="brand_id" id="brand_id" class="form-select" required>
                            <option value="0">-- Chọn thương hiệu --</option>
                            <!-- BEGIN: brand_option -->
                            <option value="{BRAND.id}" {BRAND.selected}>{BRAND.title}</option>
                            <!-- END: brand_option -->
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
                        <input type="text" name="price" id="price" class="form-control price-input" value="{DATA.price}" placeholder="VD: 29.990.000" required>
                        <div class="invalid-feedback">Giá bán phải lớn hơn 0</div>
                        <div class="form-text">Tự động format khi nhập</div>
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <label for="quantity" class="form-label">Số lượng</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{DATA.quantity}" min="0" placeholder="VD: 100">
                            <div class="invalid-feedback">Số lượng phải là số từ 0 trở lên</div>
                        </div>
                        <div class="col-6">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select name="status" id="status" class="form-select">
                                <option value="1" {STATUS_1}>Hoạt động</option>
                                <option value="0" {STATUS_0}>Ngưng bán</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">{SUBMIT_TEXT}</button>
                        <a href="{CANCEL_URL}" class="btn btn-secondary">{CANCEL_TEXT}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

{SCRIPT}

<!-- END: main -->
