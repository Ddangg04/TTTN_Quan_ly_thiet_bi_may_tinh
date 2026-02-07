<!-- BEGIN: main -->
{BULK_MESSAGE}

<div class="panel panel-default">
    <div class="panel-body" style="padding: 15px; background-color: var(--nv-breadcrumb-bg) !important;">
        <form action="{SEARCH_URL}" method="get" style="display: flex; flex-wrap: wrap; align-items: flex-end; margin-bottom: 15px;">
            <input type="hidden" name="{LANG_VAR}" value="{LANG_DATA}" />
            <input type="hidden" name="{NAME_VAR}" value="{MODULE_NAME}" />
            <input type="hidden" name="{OP_VAR}" value="devices/content" />
            
            <div style="display: inline-block; margin-right: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Từ khóa tìm kiếm</label>
                <input class="form-control" type="text" value="{KEYWORD}" maxlength="64" name="q" placeholder="Nhập tên sản phẩm hoặc mã model sản phẩm" style="width: 300px;" />
            </div>
            
            <div style="display: inline-block; margin-right: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Danh mục</label>
                <select class="form-select" name="cat_id" style="width: 180px;">
                    {CATS_OPTIONS}
                </select>
            </div>
            
            <div style="display: inline-block; margin-right: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Thương hiệu</label>
                <select class="form-select" name="brand_id" style="width: 180px;">
                    {BRANDS_OPTIONS}
                </select>
            </div>
            
            <div style="display: inline-block; margin-right: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Trạng thái</label>
                <select class="form-select" name="status" style="width: 140px;">
                    {STATUS_OPTIONS}
                </select>
            </div>
            
            <div style="display: inline-block;">
                <button type="submit" class="btn btn-primary" style="margin-right: 5px;"><i class="fa fa-search"></i> Tìm kiếm</button>
                <a href="{ADD_URL}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Thêm mới</a>
            </div>
        </form>
    </div>
</div>

<form action="{FORM_ACTION}" method="post">
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="text-center" width="40">
                    <input type="checkbox" name="check_all[]" value="yes" onclick="nv_checkAll(this.form, 'idcheck[]', 'check_all[]', this.checked);" />
                </th>
                <th class="text-center" width="50">STT</th>
                <th class="text-center" width="140">Ảnh đại diện</th>
                <th class="text-center">Tên sản phẩm</th>
                <th class="text-center" width="120">Mã Model</th>
                <th class="text-center" width="130">Danh mục</th>
                <th class="text-center" width="130">Thương hiệu</th>
                <th class="text-center" width="120">Giá (VNĐ)</th>
                <th class="text-center" width="80">SL</th>
                <th class="text-center" width="120">Trạng thái</th>
                <th class="text-center" width="80">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <!-- BEGIN: loop -->
            <tr style="vertical-align: middle;">
                <td class="text-center">
                    <input type="checkbox" name="idcheck[]" value="{ROW.id}" onclick="nv_UncheckAll(this.form, 'idcheck[]', 'check_all[]', this.checked);" />
                </td>
                <td class="text-center">{ROW.stt}</td>
                <td class="text-center">{ROW.image_html}</td>
                <td>
                    <a href="{ROW.view_url}" class="text-primary"><strong>{ROW.title}</strong></a>
                </td>
                <td class="text-center">{ROW.model_code}</td>
                <td class="text-center">{ROW.cat_title}</td>
                <td class="text-center">{ROW.brand_title}</td>
                <td class="text-center"><strong style="color: #d9534f;">{ROW.price_format}</strong></td>
                <td class="text-center">{ROW.quantity}</td>
                <td class="text-center">{ROW.status_html}</td>
                <td class="text-center">
                    <a href="{ROW.edit_url}" style="text-decoration: none; padding: 5px;" title="Sửa">
                        <i class="fa fa-edit action-icon" style="font-size: 15px; color: #6c757d;"></i>
                    </a>
                    <a href="javascript:void(0);" onclick="nv_del_device({ROW.id}, '{ROW.checkss}');" style="text-decoration: none; padding: 5px;" title="Xóa">
                        <i class="fa fa-trash-o action-icon" style="font-size: 15px; color: #6c757d;"></i>
                    </a>
                </td>
            </tr>
            <!-- END: loop -->
            
            <!-- BEGIN: empty -->
            <tr>
                <td colspan="11" class="text-center">Không có dữ liệu nào!</td>
            </tr>
            <!-- END: empty -->
        </tbody>
    </table>
</div>

<div class="table-footer clearfix" style="padding: 15px 0;">
    <div class="pull-left">
        <div class="input-group" style="width: auto;">
            <select class="form-select" name="action" id="action" style="width: 180px !important; flex: 0 0 auto;">
                <option value="">-- Chọn hành động --</option>
                <option value="delete">Xóa</option>
                <option value="active">Kích hoạt</option>
                <option value="deactive">Ngưng bán</option>
            </select>
            <button class="btn btn-primary" type="button" onclick="nv_main_action(this.form, '{CHECKSESS}', 'Bạn chưa chọn thiết bị nào!');">Thực hiện</button>
        </div>
    </div>
    <div class="pull-right">
        {PAGINATION}
    </div>
</div>
</form>

<script type="text/javascript">
function nv_del_device(id, checkss) {
    nvConfirm("Bạn thực sự muốn xóa? Nếu đồng ý, tất cả dữ liệu liên quan sẽ bị xóa. Bạn sẽ không thể phục hồi lại chúng sau này", function() {
        $.post(script_name + "?" + nv_lang_variable + "=" + nv_lang_data + "&" + nv_name_variable + "=" + nv_module_name + "&{OP_VAR}=devices/del_device&nocache=" + new Date().getTime(), 'id=' + id + '&checkss=' + checkss, function(res) {
            nv_del_device_result(res);
        });
    });
    return false;
}

function nv_del_device_result(res) {
    var r_split = res.split("_");
    if (r_split[0] == "OK") {
        nvToast("Xóa thành công: " + r_split[1], 'success');
        setTimeout(function() { location.reload(); }, 700);
    } else if (r_split[0] == "ERR") {
        nvToast("Lỗi: " + r_split[1], 'error');
    } else {
        nvToast("Không thể xóa thiết bị này!", 'error');
    }
}

function nv_main_action(oForm, checkss, msgnocheck) {
    var fa = oForm['idcheck[]'];
    var listid = '';
    if (fa.length) {
        for (var i = 0; i < fa.length; i++) {
            if (fa[i].checked) {
                listid = listid + fa[i].value + ',';
            }
        }
    } else {
        if (fa.checked) {
            listid = listid + fa.value + ',';
        }
    }

    if (listid != '') {
        var action = document.getElementById('action').value;
        if (action == 'delete') {
            nvConfirm('Bạn thực sự muốn xóa? Nếu đồng ý, tất cả dữ liệu liên quan sẽ bị xóa. Bạn sẽ không thể phục hồi lại chúng sau này', function() {
                $.post(script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&{OP_VAR}=devices/del_device&nocache=' + new Date().getTime(), 'listid=' + listid + '&checkss=' + checkss, function(res) {
                    nv_del_device_result(res);
                });
            });
        } else if (action == 'active' || action == 'deactive') {
            nvConfirm('Bạn có chắc muốn thực hiện hành động này?', function() {
                $.post(script_name + '?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + nv_module_name + '&{OP_VAR}=devices/del_device&nocache=' + new Date().getTime(), 'action=' + action + '&listid=' + listid + '&checkss=' + checkss, function(res) {
                    nv_del_device_result(res);   
                });
            });
        }
    } else {
        nvToast(msgnocheck, 'warning');
    }
}

$("body").on("mouseenter", ".action-icon", function() {
    $(this).css("color", "#007bff");
}).on("mouseleave", ".action-icon", function() {
    $(this).css("color", "#6c757d");
});
</script>

<style>
.table a.text-primary:hover {
    text-decoration: underline !important;
}
</style>
<!-- END: main -->
