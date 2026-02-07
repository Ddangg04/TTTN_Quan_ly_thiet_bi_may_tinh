<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/admin_default/css/admin.css">
<style>
    .card-custom { background: #fff; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: none; margin-top: 20px; }
    .card-header-custom { background: #f8f9fa; border-bottom: 1px solid #eee; padding: 20px; border-radius: 10px 10px 0 0; }
    .card-body-custom { padding: 30px; }
    .form-control-custom { border-radius: 6px; border: 1px solid #ddd; padding: 10px 15px; transition: all 0.3s; }
    .form-control-custom:focus { border-color: #337ab7; box-shadow: 0 0 8px rgba(51,122,183,0.2); }
    .btn-custom-save { border-radius: 6px; padding: 10px 35px; font-weight: bold; background-color: #5bc0de; border-color: #46b8da; color: #fff; transition: 0.3s; }
    .btn-custom-save:hover { background-color: #31b0d5; transform: translateY(-1px); box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
    .btn-custom-cancel { border-radius: 6px; padding: 10px 35px; color: #666; background: #eee; border: none; margin-right: 10px; }
    .control-label-custom { font-weight: 600; color: #444; margin-bottom: 8px; }
    .help-block-custom { font-size: 11px; color: #999; margin-top: 5px; }
</style>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
        <!-- BEGIN: error -->
        <div class="alert alert-danger shadow-sm" style="border-radius:8px; border:none; border-left:4px solid #d9534f;">
            <!-- BEGIN: loop -->
            <p style="margin:0;"><i class="fa fa-exclamation-circle"></i> {ERROR}</p>
            <!-- END: loop -->
        </div>
        <!-- END: error -->

        <form method="post" action="{FORM_ACTION}" class="form-horizontal">
            <div class="card-custom">
                <div class="card-header-custom">
                    <h3 class="panel-title" style="font-size: 18px; color: #2c3e50;">
                        <i class="fa fa-edit text-info"></i> 
                        <strong>Chỉnh sửa danh mục: {DATA.title}</strong>
                    </h3>
                </div>
                <div class="card-body-custom">
                    
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label-custom">Tên danh mục <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control form-control-custom" value="{DATA.title}" placeholder="Ví dụ: Laptop, Máy tính bảng..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label-custom">Danh mục cha</label>
                            <select name="parent_id" class="form-control form-control-custom">
                                <option value="0">--- Là danh mục gốc ---</option>
                                <!-- BEGIN: parent_loop -->
                                <option value="{PARENT.id}" {PARENT.selected}>{PARENT.title_show}</option>
                                <!-- END: parent_loop -->
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <label class="control-label-custom">Mô tả chi tiết</label>
                            <textarea name="description" class="form-control form-control-custom" rows="4" placeholder="Nhập mô tả ngắn về danh mục...">{DATA.description}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group" style="margin-left:0; margin-right:0;">
                                <label class="control-label-custom" style="display:block;">Trạng thái hiển thị</label>
                                <div style="background: #f9f9f9; padding: 8px 15px; border-radius: 6px; border: 1px solid #eee;">
                                    <label class="radio-inline" style="font-weight:normal;">
                                        <input type="radio" name="status" value="1" {STATUS_1}> <span class="text-success">Hiển thị</span>
                                    </label>
                                    <label class="radio-inline" style="font-weight:normal;">
                                        <input type="radio" name="status" value="0" {STATUS_0}> <span class="text-muted">Ẩn</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group" style="margin-left:0; margin-right:0;">
                                <label class="control-label-custom">Thứ tự ưu tiên</label>
                                <input type="number" name="weight" class="form-control form-control-custom" value="{DATA.weight}" min="0">
                            </div>
                        </div>
                    </div>

                    <hr style="border-top: 1px solid #f0f0f0; margin: 25px 0;">

                    <div class="text-center">
                        <a href="{CANCEL_URL}" class="btn btn-custom-cancel">
                            <i class="fa fa-reply"></i> Quay lại
                        </a>
                        <button type="submit" name="submit" class="btn btn-custom-save shadow-sm">
                            <i class="fa fa-save"></i> Cập nhật thay đổi
                        </button>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END: main -->
