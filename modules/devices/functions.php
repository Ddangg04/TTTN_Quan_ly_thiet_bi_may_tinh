<?php
/**
 * @Project NUKEVIET 5.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2025 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 */

if (!defined('NV_MAINFILE')) {
    exit('Stop!!!,func');
}

// -----------------------------------------------------------------------------
// A. HELPER FUNCTIONS
// -----------------------------------------------------------------------------

function nv_get_device_link($id) {
    global $module_name;
    return NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=detail&id=' . $id;
}

function nv_get_category_link($id) {
    global $module_name;
    return NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=main&catid=' . $id;
}

function nv_format_price($price) {
    if(empty($price) || $price == 0) return "Liên hệ";
    return number_format($price, 0, ',', '.') . '₫';
}

function nv_get_image_url($image_name) {
    // Nếu không có tên ảnh
    if (empty($image_name)) {
        return NV_BASE_SITEURL . 'themes/default/images/no_image.gif';
    }
    
    // Nếu là link tuyệt đối (http...) thì giữ nguyên
    if (preg_match('/^(http|https):\/\//', $image_name)) {
        return $image_name;
    }
    $url = (strpos($image_name, '/') === 0) ? $image_name : NV_BASE_SITEURL . $image_name;
    
    return $url;
}
function nv_get_tree_categories() {
    global $db, $module_data;
    $sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_device_categories WHERE status=1 ORDER BY weight ASC";
    $all_cats = $db->query($sql)->fetchAll();
    
    $tree = [];
    foreach ($all_cats as $key => $cat) {
        if ($cat['parent_id'] == 0) {
            $cat['subcats'] = [];
            $tree[$cat['id']] = $cat;
            unset($all_cats[$key]);
        }
    }
    foreach ($all_cats as $cat) {
        if (isset($tree[$cat['parent_id']])) {
            $tree[$cat['parent_id']]['subcats'][] = $cat;
        }
    }
    return $tree;
}

function nv_get_all_brands() {
    global $db, $module_data;
    return $db->query("SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_brands WHERE status=1 ORDER BY title ASC")->fetchAll();
}

// -----------------------------------------------------------------------------
// B. VIEW FUNCTIONS (HTML & CSS)
// -----------------------------------------------------------------------------

function nv_render_style() {
    return <<<CSS
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');
        
        /* Reset cơ bản để tránh lỗi box model */
        .gvn-wrapper, .gvn-wrapper * { box-sizing: border-box !important; }

        /* Khung bao ngoài */
        .gvn-top-search {
            background: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* ===========================================================
           1. GIAO DIỆN DESKTOP (Màn hình > 768px)
           =========================================================== */
        @media (min-width: 769px) {
            .gvn-search-form {
                display: grid !important;
                /* Chia cột: 
                */
                grid-template-columns: 1fr 200px auto !important; 
                gap: 10px !important; /* Khoảng cách giữa các cột */
                align-items: center !important;
                width: 100% !important;
                height: auto !important;
            }

            /* Reset toàn bộ style của phần tử con để nó chui lọt vào ô lưới */
            .gvn-search-form input.gvn-input,
            .gvn-search-form select.gvn-input,
            .gvn-search-form button.gvn-btn-search {
                width: 100% !important;       /* Chiếm 100% của CÁI Ô GRID (chứ không phải màn hình) */
                max-width: 100% !important;
                height: 40px !important;      /* Chiều cao cố định */
                margin: 0 !important;         /* Xóa margin thừa */
                display: block !important;
            }
        }

        /* ===========================================================
           2. GIAO DIỆN MOBILE (Màn hình <= 768px)
           =========================================================== */
        @media (max-width: 768px) {
            .gvn-search-form {
                display: flex !important;
                flex-direction: column !important; /* Xếp dọc */
                gap: 10px !important;              /* Khoảng cách giữa các dòng */
            }

            .gvn-search-form input.gvn-input,
            .gvn-search-form select.gvn-input,
            .gvn-search-form button.gvn-btn-search {
                width: 100% !important;
                height: 40px !important;
                margin: 0 !important;
            }
        }

        /* ===========================================================
           STYLE GIAO DIỆN (Màu sắc, Font chữ)
           =========================================================== */
        /* Input & Select */
        .gvn-input {
            background: #fff !important;
            color: #333 !important;
            padding: 0 15px !important;
            font-size: 14px !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
            outline: none;
            box-shadow: none !important;
            line-height: normal !important; /* Để text căn giữa theo chiều dọc */
        }

        /* Select riêng */
        select.gvn-input {
            appearance: auto !important; /* Hiển thị mũi tên mặc định */
            padding-right: 30px !important;
            cursor: pointer;
        }

        /* Nút Tìm kiếm */
        .gvn-btn-search {
            background: #d0021b !important;
            color: #fff !important;
            border: none !important;
            border-radius: 4px !important;
            font-weight: 700 !important;
            text-transform: uppercase;
            cursor: pointer;
            white-space: nowrap !important; /* Không xuống dòng chữ */
            padding: 0 20px !important;
            
            /* Flex để căn giữa chữ và icon */
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }
        
        /* Icon trong nút */
        .gvn-btn-search i { margin-right: 5px; }

        /* --- CÁC PHẦN KHÁC (GIỮ NGUYÊN) --- */
        .gvn-wrapper { font-family: 'Roboto', sans-serif; font-size: 14px; color: #333; line-height: 1.5; }
        
        /* Menu Sidebar */
        .gvn-box { background: #fff; border: 1px solid #e5e5e5; border-radius: 4px; margin-bottom: 20px; }
        .gvn-box-head { background: #f8f8f8; color: #333; padding: 12px 15px; font-weight: 700; text-transform: uppercase; font-size: 13px; border-bottom: 1px solid #eee; }
        .gvn-menu { list-style: none; padding: 0; margin: 0; }
        .gvn-menu-item { border-bottom: 1px solid #f0f0f0; position: relative; }
        .gvn-menu-item:last-child { border-bottom: none; }
        .gvn-menu-link { display: flex; justify-content: space-between; align-items: center; padding: 10px 15px; color: #444; text-decoration: none; font-size: 14px; }
        .gvn-menu-link:hover { color: #d0021b; background: #fafafa; padding-left: 20px; transition: 0.2s; }
        .gvn-submenu { display: none; position: absolute; left: 100%; top: 0; width: 250px; background: #fff; border: 1px solid #e5e5e5; box-shadow: 2px 2px 10px rgba(0,0,0,0.1); z-index: 999; }
        .gvn-menu-item:hover > .gvn-submenu { display: block; }
        .gvn-sub-link { display: block; padding: 8px 15px; color: #555; text-decoration: none; border-bottom: 1px solid #f9f9f9; }
        .gvn-sub-link:hover { color: #d0021b; background: #f5f5f5; padding-left: 20px; transition: 0.2s; }

        /* Layout 2 cột */
        .gvn-row { display: flex; flex-wrap: wrap; margin: 0 -10px; }
        .gvn-col-left { width: 230px; padding: 0 10px; flex-shrink: 0; }
        .gvn-col-right { width: calc(100% - 230px); padding: 0 10px; flex-grow: 1; }
        @media (max-width: 991px) { .gvn-col-left { width: 100%; margin-bottom: 20px; } .gvn-col-right { width: 100%; } }

        /* Danh sách sản phẩm */
        .gvn-grid { display: flex; flex-wrap: wrap; margin: 0 -10px; }
        .gvn-prod-col { width: 50%; padding: 0 10px; margin-bottom: 20px; }
        @media (max-width: 576px) { .gvn-prod-col { width: 100%; } }
        .gvn-card { border: 1px solid #e1e1e1; border-radius: 6px; background: #fff; height: 100%; display: flex; flex-direction: column; transition: 0.2s; overflow: hidden; }
        .gvn-card:hover { border-color: #d0021b; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transform: translateY(-2px); }
        .gvn-card-img { height: 220px; padding: 15px; display: flex; align-items: center; justify-content: center; border-bottom: 1px solid #f0f0f0; }
        .gvn-card-img img { max-width: 100%; max-height: 100%; object-fit: contain; }
        .gvn-card-body { padding: 20px; flex-grow: 1; display: flex; flex-direction: column; }
        .gvn-card-title { font-size: 16px; font-weight: 500; margin-bottom: 10px; line-height: 1.4; } 
        .gvn-card-title a { color: #333; text-decoration: none; }
        .gvn-card-price { font-size: 18px; color: #d0021b; font-weight: 700; margin-top: auto; }
        
        /* Chi tiết sản phẩm */
        .gvn-brand-list { display: flex; flex-wrap: wrap; gap: 8px; padding: 15px; }
        .gvn-brand-tag { font-size: 12px; padding: 5px 10px; border: 1px solid #e0e0e0; border-radius: 3px; color: #555; background: #fff; text-decoration: none; }
        .gvn-brand-tag:hover, .gvn-brand-tag.active { border-color: #d0021b; color: #fff; background: #d0021b; }
        .gvn-detail-row { display: flex; flex-wrap: wrap; }
        .gvn-d-img { width: 45%; padding-right: 20px; }
        .gvn-d-info { width: 55%; }
        @media (max-width: 768px) { .gvn-d-img, .gvn-d-info { width: 100%; padding: 0; } }
        .gvn-buy-btn { width: 100%; padding: 15px; background: #d0021b; color: #fff; border: none; font-size: 16px; font-weight: 700; text-transform: uppercase; cursor: pointer; border-radius: 4px; margin-top: 20px; }
    </style>
CSS;
}
/**
 * Hiển thị Thanh tìm kiếm 
 */
function nv_render_top_filter($filters) {
    global $module_name;
    $action_url = NV_BASE_SITEURL . 'index.php';
    
    $q_val = isset($filters['q']) ? $filters['q'] : '';
    $p_val = isset($filters['price_range']) ? $filters['price_range'] : 0;
    
    $price_opts = [
        0 => 'Mọi mức giá',
        1 => 'Dưới 10 triệu',
        2 => '10 triệu - 20 triệu',
        3 => '20 triệu - 30 triệu',
        4 => 'Trên 30 triệu'
    ];
    $opt_html = '';
    foreach($price_opts as $k => $v) {
        $sel = ($p_val == $k) ? 'selected' : '';
        $opt_html .= "<option value='$k' $sel>$v</option>";
    }

    return <<<HTML
    <div class="gvn-top-search">
        <form action="{$action_url}" method="get" class="gvn-search-form">
            <input type="hidden" name="{NV_LANG_VARIABLE}" value="{NV_LANG_DATA}">
            <input type="hidden" name="{NV_NAME_VARIABLE}" value="{$module_name}">
            
            <div class="gvn-search-group" style="flex: 2;">
                <label>Từ khóa tìm kiếm:</label>
                <input type="text" name="q" class="gvn-input" value="{$q_val}" placeholder="Nhập tên sản phẩm, mã số...">
            </div>
            
            <div class="gvn-search-group" style="flex: 1; min-width: 150px;">
                <label>Khoảng giá:</label>
                <select name="price_range" class="gvn-input">
                    {$opt_html}
                </select>
            </div>
            
            <button type="submit" class="gvn-btn-search"><i class="fa fa-search"></i> Tìm kiếm</button>
        </form>
    </div>
HTML;
}

/**
 * Hiển thị Sidebar (Danh mục & Thương hiệu)
 */
function nv_render_sidebar($filters = []) {
    global $module_name;
    
    // 1. Menu Danh mục
    $cats = nv_get_tree_categories();
    $menu_html = '<ul class="gvn-menu">';
    
    foreach($cats as $c) {
        $has_sub = !empty($c['subcats']);
        // Icon mũi tên nếu có menu con
        $icon = $has_sub ? '<i class="fa fa-angle-right" style="color:#999; font-size:12px;"></i>' : '';
        $link = nv_get_category_link($c['id']);
        $cls = (isset($filters['catid']) && $filters['catid'] == $c['id']) ? 'color:#d0021b; font-weight:bold' : '';
        
        $sub_html = '';
        if($has_sub) {
            // Tạo khối div submenu nhưng chưa hiển thị (do CSS display:none)
            $sub_html = '<div class="gvn-submenu">';
            foreach($c['subcats'] as $sub) {
                $sub_link = nv_get_category_link($sub['id']);
                $sub_html .= '<a href="'.$sub_link.'" class="gvn-sub-link">'.$sub['title'].'</a>';
            }
            $sub_html .= '</div>';
        }
        
        // QUAN TRỌNG: Thẻ <li> bao trọn cả Link cha và Submenu con
        $menu_html .= '<li class="gvn-menu-item">';
        $menu_html .= '  <a href="'.$link.'" class="gvn-menu-link" style="'.$cls.'"><span>'.$c['title'].'</span> '.$icon.'</a>';
        $menu_html .=    $sub_html; // Chèn submenu vào đây
        $menu_html .= '</li>';
    }
    $menu_html .= '</ul>';

    // 2. Thương hiệu
    $brands = nv_get_all_brands();
    $brand_html = '<div class="gvn-brand-list">';
    foreach($brands as $b) {
        $lnk = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&brand=' . $b['id'];
        $cls = (isset($filters['brand']) && $filters['brand'] == $b['id']) ? 'active' : '';
        $brand_html .= '<a href="'.$lnk.'" class="gvn-brand-tag '.$cls.'">'.$b['title'].'</a>';
    }
    $brand_html .= '</div>';

    return <<<HTML
    <div class="gvn-box"><div class="gvn-box-head"><i class="fa fa-bars"></i> Danh mục</div>{$menu_html}</div>
    <div class="gvn-box"><div class="gvn-box-head"><i class="fa fa-tag"></i> Thương hiệu</div>{$brand_html}</div>
HTML;
}

/**
 * TRANG DANH SÁCH (Main List)
 */
function nv_render_theme_list($products, $page_title, $pagination, $filters = []) {
    $css = nv_render_style();
    $top_search = nv_render_top_filter($filters);
    $sidebar = nv_render_sidebar($filters);
    
    $list_html = '';
    if(!empty($products)) {
        foreach($products as $p) {
            $link = nv_get_device_link($p['id']);
            $img = nv_get_image_url($p['image']); // Sử dụng hàm lấy ảnh đã sửa
            $price = nv_format_price($p['price']);
            $list_html .= <<<HTML
            <div class="gvn-prod-col">
                <div class="gvn-card">
                    <div class="gvn-card-img"><a href="{$link}"><img src="{$img}" alt="{$p['title']}"></a></div>
                    <div class="gvn-card-body">
                        <div class="gvn-card-meta">Model: {$p['model_code']}</div>
                        <div class="gvn-card-title"><a href="{$link}">{$p['title']}</a></div>
                        <div class="gvn-card-price">{$price}</div>
                    </div>
                </div>
            </div>
HTML;
        }
    } else {
        $list_html = '<div class="alert alert-warning w-100 text-center">Không có sản phẩm nào.</div>';
    }

    $top_search = str_replace(['{NV_LANG_VARIABLE}', '{NV_LANG_DATA}', '{NV_NAME_VARIABLE}'], [NV_LANG_VARIABLE, NV_LANG_DATA, NV_NAME_VARIABLE], $top_search);

    return <<<HTML
    {$css}
    <div class="gvn-wrapper" style="margin-top:20px;">
        {$top_search}
        <div class="gvn-row">
            <div class="gvn-col-left">{$sidebar}</div>
            <div class="gvn-col-right">
                <h1 style="font-size:18px; font-weight:700; text-transform:uppercase; border-bottom:1px solid #ddd; padding-bottom:10px; margin-bottom:20px;">{$page_title}</h1>
                <div class="gvn-grid">{$list_html}</div>
                <div class="mt-4 text-center">{$pagination['html']}</div>
            </div>
        </div>
    </div>
HTML;
}

/**
 * TRANG CHI TIẾT (Detail Page)
 */
function nv_render_theme_detail($product, $images, $related) {
    $css = nv_render_style();
    $img_url = nv_get_image_url($product['image']);
    $price = nv_format_price($product['price']);
    $desc = nl2br($product['description']);
    $sidebar = nv_render_sidebar(); 
    
    // Ảnh nhỏ
    $thumbs = '';
    foreach($images as $im) {
        $u = nv_get_image_url($im['url']);
        $thumbs .= '<img src="'.$u.'" style="width:50px; height:50px; object-fit:contain; border:1px solid #ddd; margin-right:5px; cursor:pointer;" onclick="document.getElementById(\'mainImg\').src=this.src">';
    }

    // SP Liên quan (Vẫn giữ 2 cột cho đồng bộ)
    $rel_html = '';
    foreach($related as $r) {
        $lnk = nv_get_device_link($r['id']);
        $img = nv_get_image_url($r['image']);
        $pr = nv_format_price($r['price']);
        $rel_html .= <<<HTML
        <div class="gvn-prod-col">
            <div class="gvn-card">
                <div class="gvn-card-img" style="height:180px"><a href="{$lnk}"><img src="{$img}"></a></div>
                <div class="gvn-card-body p-2">
                    <div class="gvn-card-title mb-1" style="height:40px; font-size:14px;"><a href="{$lnk}">{$r['title']}</a></div>
                    <div class="gvn-card-price" style="font-size:16px;">{$pr}</div>
                </div>
            </div>
        </div>
HTML;
    }

    return <<<HTML
    {$css}
    <div class="gvn-wrapper" style="margin-top:20px;">
        <div class="gvn-row">
            <div class="gvn-col-left d-none d-lg-block">
                {$sidebar}
            </div>
            <div class="gvn-col-right">
                <div class="gvn-box" style="padding:20px;">
                    <div class="gvn-detail-row">
                        <div class="gvn-d-img">
                            <div style="border:1px solid #eee; padding:10px; margin-bottom:10px; text-align:center; height:300px; display:flex; align-items:center; justify-content:center;">
                                <img id="mainImg" src="{$img_url}" style="max-width:100%; max-height:100%;">
                            </div>
                            <div style="display:flex; overflow-x:auto;">{$thumbs}</div>
                        </div>
                        <div class="gvn-d-info">
                            <h1 style="font-size:22px; font-weight:bold; margin-bottom:10px;">{$product['title']}</h1>
<<<<<<< HEAD
                            <div style="color:#777; font-size:13px; margin-bottom:15px;">Mã: <b>{$product['model_code']}</b> | Số lượng: {$product['quantity']}</div>
=======
                            <div style="color:#777; font-size:13px; margin-bottom:15px;">Mã: <b>{$product['model_code']}</b> | Xem: {$product['quantity']}</div>
>>>>>>> 6f83947686a34622ad1784a2ce826655977fa29d
                            <div style="font-size:26px; color:#d0021b; font-weight:bold; background:#f5f5f5; padding:10px; border-radius:4px; margin-bottom:15px;">{$price}</div>
                            
                            <div style="font-size:14px; line-height:1.6; color:#333;">
                                <b>Mô tả:</b><br>{$desc}
                            </div>
                            
                            <button class="gvn-buy-btn"><i class="fa fa-shopping-cart"></i> Mua ngay</button>
                        </div>
                    </div>
                </div>
                
                <div class="gvn-box">
                    <div class="gvn-box-head">Thông tin chi tiết</div>
                    <div style="padding:20px;">{$product['content']}</div>
                </div>
                
                <h3 style="font-size:18px; font-weight:bold; margin:20px 0 10px; border-bottom:2px solid #d0021b; padding-bottom:5px;">Sản phẩm khác</h3>
                <div class="gvn-grid">
                    {$rel_html}
                </div>
            </div>
        </div>
    </div>
HTML;
}
?>