<!-- BEGIN: form -->
<div class="container-fluid px-4">
    <div class="row mb-3 align-items-center">
        <div class="col-md-8">
            <h2 class="page-header">{PAGE_TITLE}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{BACK_URL}">{LANG.devices_list_title}</a></li>
                <li class="breadcrumb-item active">{PAGE_TITLE}</li>
            </ol>
        </div>
        <div class="col-md-4 text-end">
            <a href="{BACK_URL}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i>{LANG.btn_back}
            </a>
        </div>
    </div>

    <form method="POST" action="{FORM_ACTION}" enctype="multipart/form-data">
        <input type="hidden" name="device_id" value="{DEVICE_ID}">

        <div class="row">
            <!-- LEFT COLUMN: Thông tin cơ bản -->
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold">{LANG.device_title}</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{LANG.device_title} <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{DEVICE.title}" required placeholder="{LANG.device_title}">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">{LANG.device_category} <span class="text-danger">*</span></label>
                                <select name="cat_id" class="form-select" required>
                                    <option value="0">--- {LANG.filter_all} ---</option>
                                    <!-- BEGIN: cat_option -->
                                    <option value="{CAT.id}" {CAT.selected}>{CAT.title}</option>
                                    <!-- END: cat_option -->
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">{LANG.device_brand} <span class="text-danger">*</span></label>
                                <select name="brand_id" class="form-select" required>
                                    <option value="0">--- {LANG.filter_all} ---</option>
                                    <!-- BEGIN: brand_option -->
                                    <option value="{BRAND.id}" {BRAND.selected}>{BRAND.title}</option>
                                    <!-- END: brand_option -->
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">{LANG.device_model_code}</label>
                                <input type="text" name="model_code" class="form-control" value="{DEVICE.model_code}" placeholder="VD: XPS-15-9500">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">{LANG.device_price}</label>
                                <input type="number" name="price" class="form-control" value="{DEVICE.price}" min="0" step="1000" placeholder="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-semibold">{LANG.device_quantity}</label>
                                <input type="number" name="quantity" class="form-control" value="{DEVICE.quantity}" min="0">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mô tả ngắn -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold">{LANG.device_description}</div>
                    <div class="card-body">
                        <textarea name="description" class="form-control" rows="3" placeholder="{LANG.device_description}">{DEVICE.description}</textarea>
                    </div>
                </div>

                <!-- Nội dung chi tiết (CKEditor) -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold">{LANG.device_content}</div>
                    <div class="card-body">
                        <textarea name="content" id="nv_content" class="form-control" rows="8">{DEVICE.content}</textarea>
                        <small class="text-muted">* Sử dụng CKEditor để soạn nội dung chi tiết sản phẩm</small>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN: Ảnh + Trạng thái -->
            <div class="col-lg-4">
                <!-- Ảnh đại diện -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold">{LANG.device_image}</div>
                    <div class="card-body">
                        <!-- BEGIN: has_current_image -->
                        <div class="text-center mb-3">
                            <img src="{DEVICE.current_image}" alt="" class="img-thumbnail" style="max-height:180px;">
                        </div>
                        <!-- END: has_current_image -->
                        <div class="form-group">
                            <label class="form-label">{LANG.btn_upload}</label>
                            <input type="file" name="device_image" class="form-control" accept="image/jpeg,image/png,image/gif,image/webp">
                            <small class="text-muted">JPG, PNG, GIF, WebP (max 2MB). Sẽ thay thế ảnh hiện tại.</small>
                        </div>
                    </div>
                </div>

                <!-- Thư viện ảnh -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold">{LANG.device_images}</div>
                    <div class="card-body">
                        <!-- Ảnh đã có -->
                        <!-- BEGIN: existing_image -->
                        <div class="d-flex align-items-center mb-2 p-2 border rounded">
                            <img src="{IMG.url}" alt="{IMG.note}" class="rounded me-2" style="width:60px; height:60px; object-fit:cover;">
                            <div class="flex-grow-1">
                                <small class="text-muted">{IMG.note}</small>
                            </div>
                            <div>
                                <label class="form-check">
                                    <input type="checkbox" name="del_images[]" value="{IMG.id}" class="form-check-input">
                                    <span class="form-check-label text-danger" style="font-size:0.8rem">{LANG.img_mark_delete}</span>
                                </label>
                            </div>
                        </div>
                        <!-- END: existing_image -->

                        <!-- Upload ảnh mới -->
                        <div class="mt-3">
                            <label class="form-label">{LANG.btn_add_images}</label>
                            <input type="file" name="device_images[]" class="form-control" multiple accept="image/jpeg,image/png,image/gif,image/webp">
                            <small class="text-muted">Chọn nhiều ảnh cùng lúc. JPG, PNG, GIF, WebP.</small>
                        </div>
                    </div>
                </div>

                <!-- Trạng thái -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white fw-semibold">{LANG.device_status}</div>
                    <div class="card-body">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="status" id="status_active" value="1" {DEVICE.status_active}>
                            <label class="form-check-label" for="status_active">{LANG.status_active}</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" {DEVICE.status_inactive}>
                            <label class="form-check-label" for="status_inactive">{LANG.status_inactive}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="card shadow-sm mb-4">
            <div class="card-body text-end">
                <a href="{BACK_URL}" class="btn btn-outline-secondary me-2">
                    <i class="fas fa-times me-1"></i>{LANG.btn_cancel}
                </a>
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save me-1"></i>{LANG.btn_save}
                </button>
            </div>
        </div>
    </form>
</div>
<!-- END: form -->
