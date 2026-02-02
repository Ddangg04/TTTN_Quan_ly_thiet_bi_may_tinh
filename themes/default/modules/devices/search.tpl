<!-- BEGIN: search -->
<div class="nv-devices-search">
    <!-- Search Header -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="fw-semibold mb-3">{LANG.search_title}</h4>
            <form method="GET" action="{MODULE_URL}search">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control form-control-lg" value="{KEYWORD}" placeholder="{LANG.search_placeholder}">
                    <button type="submit" class="btn btn-primary btn-lg">{LANG.search_btn}</button>
                </div>
            </form>
            <small class="text-muted mt-2 d-block">
                {LANG.search_title}: "<strong>{KEYWORD}</strong>" — {LANG.total_items}: <strong>{TOTAL_ITEMS}</strong>
            </small>
        </div>
    </div>

    <!-- Results Grid -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        <!-- BEGIN: device_card -->
        <div class="col">
            <div class="card h-100 shadow-sm border-0">
                <a href="{DEVICE.detail_url}" class="text-decoration-none">
                    <img src="{DEVICE.image}" alt="{DEVICE.title}" class="card-img-top" style="height:200px; object-fit:cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h6 class="card-title flex-grow-1">
                        <a href="{DEVICE.detail_url}" class="text-decoration-none text-dark">{DEVICE.title}</a>
                    </h6>
                    <p class="card-text text-muted small mb-2">{DEVICE.description}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary">{DEVICE.price}</span>
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

    <!-- Back Link -->
    <div class="text-center mt-3">
        <a href="{MODULE_URL}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-1"></i>{LANG.back_to_list}
        </a>
    </div>
</div>
<!-- END: search -->
