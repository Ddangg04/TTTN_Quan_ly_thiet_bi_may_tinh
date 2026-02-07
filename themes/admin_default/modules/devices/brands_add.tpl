<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/admin_default/css/admin.css">
<style>
    .card-custom { background: #fff; border-radius: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); border: none; margin-top: 20px; }
    .card-header-custom { background: #f8f9fa; border-bottom: 1px solid #eee; padding: 20px; border-radius: 10px 10px 0 0; }
    .card-body-custom { padding: 30px; }
    .form-control-custom { border-radius: 6px; border: 1px solid #ddd; padding: 10px 15px; }
    .btn-custom-save { border-radius: 6px; padding: 10px 35px; font-weight: bold; background-color: #337ab7; color: #fff; border: none; }
    .control-label-custom { font-weight: 600; color: #444; margin-bottom: 8px; }
</style>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        
        <!-- BEGIN: error -->
        <div class="alert alert-danger" style="border-radius:8px;">
            <!-- BEGIN: loop -->
            <p style="margin:0;">{ERROR}</p>
            <!-- END: loop -->
        </div>
        <!-- END: error -->

        <form method="post" action="{FORM_ACTION}">
            <div class="card-custom">
                <div class="card-header-custom">
                    <h3 class="panel-title">
                        <i class="fa fa-plus-circle text-primary"></i> 
                        <strong>Thêm thương hiệu mới</strong>
                    </h3>
                </div>
                <div class="card-body-custom">
                    
                    <div class="form-group">
                        <label class="control-label-custom">Tên thương hiệu <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control form-control-custom" value="{DATA.title}" placeholder="Ví dụ: Dell, Apple, Samsung..." required>
                    </div>

                    <div class="form-group">
                        <label class="control-label-custom">Website hỗ trợ</label>
                        <input type="url" name="support" class="form-control form-control-custom" value="{DATA.support}" placeholder="https://">
                    </div>

                    <div class="form-group">
                        <label class="control-label-custom" style="display:block;">Trạng thái hiển thị</label>
                        <div style="background: #f9f9f9; padding: 10px; border-radius: 6px; border: 1px solid #eee;">
                            <label class="radio-inline">
                                <input type="radio" name="status" value="1" {STATUS_1}> 
                                <span class="text-success">Hiển thị</span>
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" value="0" {STATUS_0}> 
                                <span class="text-muted">Ẩn</span>
                            </label>
                        </div>
                    </div>

                    <hr>

                    <div class="text-center">
                        <a href="{CANCEL_URL}" class="btn btn-default" style="border-radius:6px; padding:10px 30px;">
                            <i class="fa fa-times"></i> Hủy
                        </a>
                        <button type="submit" name="submit" class="btn btn-custom-save">
                            <i class="fa fa-save"></i> Lưu thương hiệu
                        </button>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END: main -->
