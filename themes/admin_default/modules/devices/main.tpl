<!-- BEGIN: main -->
<style>
    /* Stats Cards - GIỮ NGUYÊN CSS GỐC */
    .dashboard-stat { display: block; margin-bottom: 25px; overflow: hidden; border-radius: 4px; box-shadow: 0 2px 3px rgba(0,0,0,0.1); }
    .dashboard-stat .visual { width: 80px; height: 80px; float: left; display: flex; align-items: center; justify-content: center; opacity: 0.9; }
    .dashboard-stat .visual i { font-size: 40px; color: #fff; }
    .dashboard-stat .details { position: relative; padding: 15px; background: #fff; height: 80px; }
    .dashboard-stat .details .number { font-size: 22px; font-weight: 700; color: #333; margin-bottom: 5px; line-height: 1; }
    .dashboard-stat .details .desc { color: #888; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; }
    
    .blue-madison { background-color: #578ebe; }
    .red-intense { background-color: #e35b5a; }
    .green-haze { background-color: #44b6ae; }
    .purple-plum { background-color: #8775a7; }

    /* Quick Links Bar */
    .quick-actions { margin-bottom: 25px; background: #f5f5f5; padding: 15px; border: 1px solid #e3e3e3; border-radius: 4px; display: flex; gap: 10px; flex-wrap: wrap; }
    .btn-quick { display: inline-flex; align-items: center; font-weight: 600; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
    .btn-quick i { margin-right: 8px; font-size: 1.1em; }

    /* Table Styles */
    .panel-custom { border-top: 3px solid #337ab7; }
    .table-vcenter th { background: #f9f9f9; border-bottom: 2px solid #eee; }
    .table-vcenter td { vertical-align: middle !important; padding: 10px 8px; }
    .status-badge { font-size: 11px; padding: 3px 8px; border-radius: 10px; }
    .label-instock { background: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9; }
    .label-outstock { background: #ffebee; color: #c62828; border: 1px solid #ffcdd2; }
</style>

<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat">
            <div class="visual blue-madison"><i class="fa fa-cubes"></i></div>
            <div class="details">
                <div class="number">{COUNT_ACTIVE}</div>
                <div class="desc">Sản phẩm</div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat">
            <div class="visual purple-plum"><i class="fa fa-folder-open"></i></div>
            <div class="details">
                <div class="number">{COUNT_CATS}</div>
                <div class="desc">Danh mục</div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat">
            <div class="visual red-intense"><i class="fa fa-tags"></i></div>
            <div class="details">
                <div class="number">{COUNT_BRANDS}</div>
                <div class="desc">Thương hiệu</div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat">
            <div class="visual green-haze"><i class="fa fa-money"></i></div>
            <div class="details">
                <div class="number" style="font-size:18px">{TOTAL_VALUE}</div>
                <div class="desc">Giá trị kho</div>
            </div>
        </div>
    </div>
</div>

<div class="quick-actions">
    <span class="text-uppercase text-muted" style="align-self:center; margin-right:10px; font-weight:bold"><i class="fa fa-bolt"></i> Truy cập nhanh:</span>
    <a href="{LINK_MANAGE_DEVICE}" class="btn btn-default btn-quick"><i class="fa fa-list-ul text-primary"></i> Quản lý Thiết Bị</a>
    <a href="{LINK_MANAGE_CAT}" class="btn btn-default btn-quick"><i class="fa fa-folder text-warning"></i> Quản lý Danh Mục</a>
    <a href="{LINK_MANAGE_BRAND}" class="btn btn-default btn-quick"><i class="fa fa-star text-danger"></i> Quản lý Thương Hiệu</a>
    <a href="{LINK_ADD_DEVICE}" class="btn btn-success btn-quick" style="margin-left:auto"><i class="fa fa-plus-circle"></i> Thêm Thiết Bị Mới</a>
</div>

<div class="panel panel-default panel-custom">
    <div class="panel-heading">
        <i class="fa fa-clock-o"></i> <strong>SẢN PHẨM MỚI CẬP NHẬT</strong>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width:50px">STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th class="text-danger">Giá bán</th>
                    <th class="text-center">Kho</th>
                    <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center"><strong>{ROW.stt}</strong></td>
                    <td><a href="{ROW.link_edit}" style="font-weight:600; color:#337ab7">{ROW.title}</a></td>
                    <td>{ROW.cat_name}</td>
                    <td>{ROW.brand_name}</td>
                    <td class="text-danger" style="font-weight:bold">{ROW.price}</td>
                    <td class="text-center">{ROW.stock_label}</td>
                    <td class="text-center">
                        <a href="{ROW.link_edit}" class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
                <tr><td colspan="7" class="text-center">Chưa có sản phẩm nào trong hệ thống.</td></tr>
                </tbody>
        </table>
    </div>
</div>
 <!-- END: main --> 