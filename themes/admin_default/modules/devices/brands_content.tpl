<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/admin_default/css/admin.css">

<div class="row" style="margin-bottom: 20px;">
    <div class="col-sm-6">
        <a href="{ADD_URL}" class="btn btn-primary shadow-sm" style="border-radius:20px; padding: 8px 25px;">
            <i class="fa fa-plus-circle"></i> Thêm thương hiệu mới
        </a>
    </div>
    <div class="col-sm-6 text-right">
        <p style="margin-top:10px; color:#666;">Tổng số: <strong>{TOTAL_BRANDS}</strong> thương hiệu</p>
    </div>
</div>

<div class="card-custom" style="background:#fff; border-radius:10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); overflow:hidden; border:1px solid #eee;">
    <table class="table table-hover" style="margin-bottom:0;">
        <thead>
            <tr style="background:#f8f9fa; color:#333;">
                <th class="text-center" width="70">ID</th>
                <th>Tên thương hiệu</th>
                <th>Website</th>
                <th class="text-center">Sản phẩm</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center" width="180">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <!-- BEGIN: loop -->
            <tr>
                <td class="text-center" style="vertical-align:middle;">{BRAND.id}</td>
                <td style="vertical-align:middle;"><strong>{BRAND.title}</strong></td>
                <td style="vertical-align:middle;">{BRAND.support_link}</td>
                <td class="text-center" style="vertical-align:middle;">
                    <span class="badge" style="background:#eee; color:#333; font-weight:normal;">{BRAND.product_count}</span>
                </td>
                <td class="text-center" style="vertical-align:middle;">
                    <span class="label {BRAND.status_class} change-status" data-id="{BRAND.id}" data-status="{BRAND.status}" style="cursor:pointer; padding:5px 10px;">
                        {BRAND.status_text}
                    </span>
                </td>
                <td class="text-center" style="vertical-align:middle;">
                    <a href="{BRAND.edit_url}" class="btn btn-xs btn-default" title="Sửa">
                        <i class="fa fa-edit"></i> Sửa
                    </a>
                    <button class="btn btn-xs btn-danger btn-delete" data-id="{BRAND.id}" title="Xóa">
                        <i class="fa fa-trash"></i> Xóa
                    </button>
                </td>
            </tr>
            <!-- END: loop -->
        </tbody>
    </table>
</div>

<script>
$(function() {
    $(".change-status").click(function() {
        var $el = $(this);
        var id = $el.data("id"), status = $el.data("status"), newStatus = status == 1 ? 0 : 1;
        $.post("", {change_status: 1, id: id, new_status: newStatus}, function(res) {
            if (res.status == "OK") {
                $el.toggleClass("label-success label-default").text(newStatus == 1 ? "Hiển thị" : "Ẩn").data("status", newStatus);
            }
        }, "json");
    });
    
    $(".btn-delete").click(function() {
        var id = $(this).data("id");
        if (confirm("Xác nhận xóa thương hiệu này?")) {
            $.post("", {delete: 1, id: id}, function(res) {
                if (res.status == "OK") {
                    location.reload();
                } else {
                    alert(res.message);
                }
            }, "json");
        }
    });
});
</script>
<!-- END: main -->
