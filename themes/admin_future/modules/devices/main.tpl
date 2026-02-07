<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-cube fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 30px;">{COUNT_ACTIVE}</div>
                        <div>Sản phẩm Active</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-folder fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 30px;">{COUNT_CATS}</div>
                        <div>Danh mục</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tags fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 30px;">{COUNT_BRANDS}</div>
                        <div>Thương hiệu</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-money fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div style="font-size: 20px; font-weight:bold">{TOTAL_VALUE}</div>
                        <div>Giá trị kho</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-clock-o fa-fw"></i> 5 Sản phẩm mới cập nhật
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="text-center" width="50">STT</th>
                        <th>Tên thiết bị</th>
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>
                        <th>Giá bán</th>
                        <th class="text-center">Kho hàng</th>
                        <th class="text-center" width="100">Hành động</th>
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
                    </tbody>
            </table>
        </div>
        <div class="text-center">{LANG.no_product}</div>
        </div>
</div>

<style>
    /* CSS bổ trợ cho Dashboard */
    .panel-green { border-color: #5cb85c; }
    .panel-green .panel-heading { border-color: #5cb85c; color: #fff; background-color: #5cb85c; }
    .panel-yellow { border-color: #f0ad4e; }
    .panel-yellow .panel-heading { border-color: #f0ad4e; color: #fff; background-color: #f0ad4e; }
    .panel-red { border-color: #d9534f; }
    .panel-red .panel-heading { border-color: #d9534f; color: #fff; background-color: #d9534f; }
    
    .status-badge { display: inline-block; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: bold; text-transform: uppercase; color: #fff; }
    .label-instock { background-color: #28a745; }
    .label-outstock { background-color: #dc3545; }
</style>