<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/admin_default/css/admin.css">
<style>
    .table-vcenter td { vertical-align: middle !important; }
    .label-status { cursor: pointer; padding: 5px 12px; border-radius: 20px; font-weight: 500; transition: 0.3s; }
    .label-status:hover { opacity: 0.8; }
    .btn-group-xs .btn { margin: 0 2px; }
    .cat-title { font-size: 14px; font-weight: 600; color: #333; }
</style>

<div class="panel panel-default shadow">
    <div class="panel-heading" style="display:flex; justify-content:space-between; align-items:center; background:#fff; padding: 15px;">
        <h3 class="panel-title" style="font-weight:bold; color:#2c3e50;">
            <i class="fa fa-list-ul text-primary"></i> {PAGE_TITLE}
        </h3>
        <a href="{ADD_URL}" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i> Thêm mới
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover table-vcenter" style="margin-bottom:0;">
            <thead>
                <tr class="bg-light">
                    <th class="text-center" style="width:70px">Thứ tự</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th class="text-center" style="width:130px">Trạng thái</th>
                    <th class="text-center" style="width:130px">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <!-- BEGIN: loop -->
                <tr>
                    <td class="text-center">
                        <input type="number" class="form-control input-sm change-weight text-center" data-id="{ROW.id}" value="{ROW.weight}" style="width:55px; margin:auto">
                    </td>
                    <td>
                        <span class="cat-title">{ROW.indent}{ROW.title}</span>
                    </td>
                    <td class="small text-muted">{ROW.description}</td>
                    <td class="text-center">
                        <span class="label {ROW.status_class} label-status change-status" data-id="{ROW.id}" data-status="{ROW.status}">
                            {ROW.status_text}
                        </span>
                    </td>
                    <td class="text-center btn-group-xs">
                        <a href="{ROW.edit_url}" class="btn btn-info btn-xs" title="Sửa">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger btn-xs btn-delete" data-id="{ROW.id}" title="Xóa">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <!-- END: loop -->
            </tbody>
        </table>
    </div>
</div>

<script>
$(function() {
    $(".change-status").click(function() {
        var $el = $(this);
        var id = $el.data("id"), status = $el.data("status"), newStatus = status == 1 ? 0 : 1;
        $.post("", {change_status: 1, id: id, new_status: newStatus}, function(res) {
            if (res.status == "OK") {
                $el.removeClass("label-success label-default").addClass(newStatus == 1 ? "label-success" : "label-default")
                   .text(newStatus == 1 ? "Đang hiện" : "Đang ẩn").data("status", newStatus);
            }
        }, "json");
    });
    
    $(".change-weight").change(function() {
        $.post("", {change_weight: 1, id: $(this).data("id"), new_weight: $(this).val()}, function(res) {
            if (res.status == "OK") location.reload();
        }, "json");
    });
    
    $(".btn-delete").click(function() {
        if (confirm("Bạn có chắc chắn muốn xóa danh mục này?")) {
            $.post("", {delete: 1, id: $(this).data("id")}, function(res) {
                if (res.status == "OK") location.reload();
            }, "json");
        }
    });
});
</script>
<!-- END: main -->
