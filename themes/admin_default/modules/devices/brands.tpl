<!-- BEGIN: brands -->
<div class="container-fluid px-4">
    <div class="row mb-3 align-items-center">
        <div class="col-md-8">
            <h2 class="page-header">{LANG.brands_list_title}</h2>
        </div>
    </div>

    <!-- Add / Edit Form -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white fw-semibold">
            {LANG.brand_add}
        </div>
        <div class="card-body">
            <form method="POST" action="{FORM_ACTION}">
                <input type="hidden" name="brand_id" value="{BRAND_FORM.id}">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label">{LANG.brand_title} <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{BRAND_FORM.title}" required placeholder="{LANG.brand_title}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">{LANG.brand_support}</label>
                        <input type="text" name="support" class="form-control" value="{BRAND_FORM.support}" placeholder="https://example.com">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">{LANG.brand_status}</label>
                        <div class="d-flex gap-3 pt-1">
                            <label class="form-check">
                                <input type="radio" name="status" value="1" class="form-check-input" {BRAND_FORM.status_active}>
                                <span class="form-check-label">{LANG.status_active}</span>
                            </label>
                            <label class="form-check">
                                <input type="radio" name="status" value="0" class="form-check-input" {BRAND_FORM.status_inactive}>
                                <span class="form-check-label">{LANG.status_inactive}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>{LANG.btn_save}
                        </button>
                        <a href="?" class="btn btn-outline-secondary">{LANG.btn_cancel}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Brands Table -->
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th style="width:50px">#</th>
                    <th>{LANG.brand_title}</th>
                    <th>{LANG.brand_support}</th>
                    <th style="width:120px">{LANG.brand_status}</th>
                    <th style="width:120px" class="text-center">{GLANG.actions}</th>
                </tr>
            </thead>
            <tbody>
                <!-- BEGIN: brand_row -->
                <tr>
                    <td class="text-center text-muted">{BRAND.id}</td>
                    <td><strong>{BRAND.title}</strong></td>
                    <td>
                        <a href="{BRAND.support}" target="_blank" class="text-decoration-none text-primary" style="font-size:0.85rem">
                            {BRAND.support} <i class="fas fa-external-link-alt fa-xs"></i>
                        </a>
                    </td>
                    <td><span class="{BRAND.status_class}">{BRAND.status}</span></td>
                    <td class="text-center">
                        <a href="{BRAND.edit_url}" class="btn btn-sm btn-outline-primary me-1" title="{LANG.btn_edit}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="{BRAND.del_url}" class="btn btn-sm btn-outline-danger" title="{LANG.btn_delete}"
                           onclick="return confirm('{LANG.confirm_delete}')">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <!-- END: brand_row -->
            </tbody>
        </table>
    </div>
</div>
<!-- END: brands -->
