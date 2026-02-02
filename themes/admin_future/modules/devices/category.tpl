<!-- BEGIN: categories -->
<div class="container-fluid px-4">
    <div class="row mb-3 align-items-center">
        <div class="col-md-8">
            <h2 class="page-header">{LANG.categories_list_title}</h2>
        </div>
    </div>

    <!-- Add / Edit Form -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white fw-semibold">
            {LANG.category_add}
        </div>
        <div class="card-body">
            <form method="POST" action="{FORM_ACTION}">
                <input type="hidden" name="cat_id" value="{CAT_FORM.id}">
                <div class="row g-3 align-items-end">
                    <div class="col-md-2">
                        <label class="form-label">{LANG.category_parent}</label>
                        <select name="parent_id" class="form-select">
                            <!-- BEGIN: parent_option -->
                            <option value="{PARENT.id}" {PARENT.selected}>{PARENT.title}</option>
                            <!-- END: parent_option -->
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{LANG.category_title} <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{CAT_FORM.title}" required placeholder="{LANG.category_title}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">{LANG.category_description}</label>
                        <input type="text" name="description" class="form-control" value="{CAT_FORM.description}" placeholder="{LANG.category_description}">
                    </div>
                    <div class="col-md-1">
                        <label class="form-label">{LANG.category_weight}</label>
                        <input type="number" name="weight" class="form-control" value="{CAT_FORM.weight}" min="0">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">{LANG.category_status}</label>
                        <div class="d-flex gap-3 pt-1">
                            <label class="form-check">
                                <input type="radio" name="status" value="1" class="form-check-input" {CAT_FORM.status_active}>
                                <span class="form-check-label">{LANG.status_active}</span>
                            </label>
                            <label class="form-check">
                                <input type="radio" name="status" value="0" class="form-check-input" {CAT_FORM.status_inactive}>
                                <span class="form-check-label">{LANG.status_inactive}</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                        </button>
                        <a href="?" class="btn btn-outline-secondary"><i class="fas fa-undo"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories Table (Tree View) -->
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th style="width:50px">#</th>
                    <th>{LANG.category_title}</th>
                    <th>{LANG.category_description}</th>
                    <th style="width:80px" class="text-center">{LANG.category_weight}</th>
                    <th style="width:100px">{LANG.category_status}</th>
                    <th style="width:120px" class="text-center">{GLANG.actions}</th>
                </tr>
            </thead>
            <tbody>
                <!-- BEGIN: cat_row -->
                <tr>
                    <td class="text-center text-muted">{CAT.id}</td>
                    <td>{CAT.indent}<strong>{CAT.title}</strong></td>
                    <td class="text-muted" style="font-size:0.85rem">{CAT.description}</td>
                    <td class="text-center">{CAT.weight}</td>
                    <td><span class="{CAT.status_class}">{CAT.status}</span></td>
                    <td class="text-center">
                        <a href="{CAT.edit_url}" class="btn btn-sm btn-outline-primary me-1" title="{LANG.btn_edit}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="{CAT.del_url}" class="btn btn-sm btn-outline-danger" title="{LANG.btn_delete}"
                           onclick="return confirm('{LANG.confirm_delete}')">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <!-- END: cat_row -->
            </tbody>
        </table>
    </div>
</div>
<!-- END: categories -->
