<!-- BEGIN: main -->
<div class="container-fluid px-4">
    <div class="row mb-3 align-items-center">
        <div class="col-md-6">
            <h2 class="page-header">{LANG.devices_list_title}</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{ADD_DEVICE_URL}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>{LANG.btn_add}
            </a>
        </div>
    </div>

    <!-- Filter Form -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">{LANG.filter_keyword}</label>
                    <input type="text" name="keyword" class="form-control" value="{SEARCH_KEYWORD}" placeholder="{LANG.filter_keyword}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">{LANG.filter_category}</label>
                    <select name="cat_id" class="form-select">
                        <option value="0">{LANG.filter_all}</option>
                        <!-- BEGIN: cat_option -->
                        <option value="{CAT.id}" {CAT.selected}>{CAT.title}</option>
                        <!-- END: cat_option -->
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">{LANG.filter_brand}</label>
                    <select name="brand_id" class="form-select">
                        <option value="0">{LANG.filter_all}</option>
                        <!-- BEGIN: brand_option -->
                        <option value="{BRAND.id}" {BRAND.selected}>{BRAND.title}</option>
                        <!-- END: brand_option -->
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search me-1"></i>{LANG.btn_search}
                    </button>
                    <a href="?" class="btn btn-outline-secondary">{LANG.btn_reset}</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Info -->
    <div class="d-flex justify-content-between align-items-center mb-2">
        <small class="text-muted">{LANG.total_items}: <strong>{TOTAL_ITEMS}</strong></small>
    </div>

    <!-- Data Table -->
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th style="width:50px">#</th>
                    <th style="width:80px">{LANG.device_image}</th>
                    <th>{LANG.device_title}</th>
                    <th>{LANG.device_category}</th>
                    <th>{LANG.device_brand}</th>
                    <th style="width:120px">{LANG.device_price}</th>
                    <th style="width:70px">{LANG.device_quantity}</th>
                    <th style="width:100px">{LANG.device_status}</th>
                    <th style="width:100px">{LANG.device_created}</th>
                    <th style="width:120px" class="text-center">{GLANG.actions}</th>
                </tr>
            </thead>
            <tbody>
                <!-- BEGIN: device_row -->
                <tr>
                    <td class="text-center text-muted">{DEVICE.id}</td>
                    <td>
                        <img src="{DEVICE.image}" alt="{DEVICE.title}" class="rounded" style="width:60px; height:60px; object-fit:cover;">
                    </td>
                    <td><strong>{DEVICE.title}</strong></td>
                    <td>{DEVICE.cat_title}</td>
                    <td>{DEVICE.brand_title}</td>
                    <td>{DEVICE.price}</td>
                    <td class="text-center">{DEVICE.quantity}</td>
                    <td><span class="{DEVICE.status_class}">{DEVICE.status}</span></td>
                    <td class="text-muted" style="font-size:0.85rem">{DEVICE.created_time}</td>
                    <td class="text-center">
                        <a href="{DEVICE.edit_url}" class="btn btn-sm btn-outline-primary me-1" title="{LANG.btn_edit}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="{DEVICE.del_url}" class="btn btn-sm btn-outline-danger" title="{LANG.btn_delete}"
                           onclick="return confirm('{LANG.confirm_delete}')">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                <!-- END: device_row -->
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <!-- BEGIN: pagination_item -->
    <!-- END: pagination_item -->
    <nav>
        <ul class="pagination pagination-sm justify-content-center">
            <!-- BEGIN: pagination_item -->
            <li class="{PAGE.class}">
                <a class="page-link" href="{PAGE.url}">{PAGE.num}</a>
            </li>
            <!-- END: pagination_item -->
        </ul>
    </nav>
</div>
<!-- END: main -->
