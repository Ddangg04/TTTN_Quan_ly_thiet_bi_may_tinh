<!-- BEGIN: main -->
<div class="nv-devices-container">
    <div class="row">

        <!-- ============ LEFT SIDEBAR: Filters ============ -->
        <div class="col-lg-3 col-md-4">
            <!-- Search Box -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form method="GET" action="{MODULE_URL}search">
                        <label class="form-label fw-semibold">{LANG.search_placeholder}</label>
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" value="{FILTER.keyword}" placeholder="{LANG.search_placeholder}">
                            <button type="submit" class="btn btn-primary">{LANG.search_btn}</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Category Filter -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white fw-semibold">{LANG.filter_category}</div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{MODULE_URL}" class="text-decoration-none text-dark">{LANG.all_devices}</a>
                        </li>
                        <!-- BEGIN: sidebar_cat -->
                        <li class="list-group-item {CAT.active}">
                            <a href="{CAT.url}" class="text-decoration-none text-dark">{CAT.title}</a>
                        </li>
                        <!-- END: sidebar_cat -->
                    </ul>
                </div>
            </div>

            <!-- Brand Filter -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white fw-semibold">{LANG.filter_brand}</div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <!-- BEGIN: sidebar_brand -->
                        <li class="list-group-item {BRAND.active}">
                            <a href="{BRAND.url}" class="text-decoration-none text-dark">{BRAND.title}</a>
                        </li>
                        <!-- END: sidebar_brand -->
                    </ul>
                </div>
            </div>

            <!-- Price Range Filter -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white fw-semibold">{LANG.filter_price}</div>
                <div class="card-body">
                    <form method="GET" action="{MODULE_URL}">
                        <input type="hidden" name="cat_id" value="{FILTER.cat_id}">
                        <input type="hidden" name="brand_id" value="{FILTER.brand_id}">
                        <div class="mb-2">
                            <label class="form-label small text-muted">{LANG.filter_price_min}</label>
                            <input type="number" name="min_price" class="form-control form-control-sm" value="{FILTER.min_price}" placeholder="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small text-muted">{LANG.filter_price_max}</label>
                            <input type="number" name="max_price" class="form-control form-control-sm" value="{FILTER.max_price}" placeholder="∞">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm w-100">{LANG.filter_apply}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MAIN CONTENT: Product Grid ============ -->
        <div class="col-lg-9 col-md-8">
            <!-- Sort Bar -->
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <small class="text-muted">{LANG.total_items}: <strong>{TOTAL_ITEMS}</strong></small>
                <div class="d-flex gap-2 align-items-center">
                    <span class="text-muted small">{LANG.sort_by}:</span>
                    <a href="?order=created_time&dir=DESC" class="btn btn-sm btn-outline-secondary">{LANG.sort_newest}</a>
                    <a href="?order=price&dir=ASC"          class="btn btn-sm btn-outline-secondary">{LANG.sort_price_asc}</a>
                    <a href="?order=price&dir=DESC"         class="btn btn-sm btn-outline-secondary">{LANG.sort_price_desc}</a>
                    <a href="?order=title&dir=ASC"          class="btn btn-sm btn-outline-secondary">{LANG.sort_name}</a>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <!-- BEGIN: device_card -->
                <div class="col">
                    <div class="card h-100 shadow-sm border-0" style="transition: transform 0.2s;">
                        <a href="{DEVICE.detail_url}" class="text-decoration-none">
                            <img src="{DEVICE.image}" alt="{DEVICE.title}" class="card-img-top" style="height:200px; object-fit:cover;">
                        </a>
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-light text-dark mb-2" style="font-size:0.75rem; align-self:flex-start;">{DEVICE.cat_title}</span>
                            <h6 class="card-title flex-grow-1">
                                <a href="{DEVICE.detail_url}" class="text-decoration-none text-dark">{DEVICE.title}</a>
                            </h6>
                            <p class="card-text text-muted small mb-2">{DEVICE.description}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary" style="font-size:1.1rem">{DEVICE.price}</span>
                                <span class="text-muted small">{DEVICE.brand_title}</span>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <a href="{DEVICE.detail_url}" class="btn btn-primary btn-sm w-100">{LANG.detail_title}</a>
                        </div>
                    </div>
                </div>
                <!-- END: device_card -->
            </div>

            <!-- No devices message (shown via PHP if $devices is empty) -->

            <!-- Pagination -->
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <!-- BEGIN: pagination_item -->
                    <li class="{PAGE.class}">
                        <a class="page-link" href="{PAGE.url}">{PAGE.num}</a>
                    </li>
                    <!-- END: pagination_item -->
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- END: main -->
