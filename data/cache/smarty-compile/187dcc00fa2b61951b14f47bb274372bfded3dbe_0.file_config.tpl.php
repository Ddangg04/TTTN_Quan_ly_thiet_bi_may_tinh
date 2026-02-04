<?php
/* Smarty version 5.4.3, created on 2026-02-04 14:22:41
  from 'file:config.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_6982f3c130a704_40691838',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '187dcc00fa2b61951b14f47bb274372bfded3dbe' => 
    array (
      0 => 'config.tpl',
      1 => 1769321928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6982f3c130a704_40691838 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\myapi';
?><form method="post" class="g-3 ajax-submit" action="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('OP');?>
" novalidate>
    <div class="card border-primary border-3 border-bottom-0 border-start-0 border-end-0">
        <div class="card-header fw-medium fs-5 py-2">
            <?php echo $_smarty_tpl->getValue('LANG')->getModule('general_settings');?>

        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-8 col-lg-6 col-xxl-5 offset-sm-3">
                    <div class="form-check form-switch">
                        <input type="checkbox" id="remote_api_access" name="remote_api_access" value="1" <?php if ($_smarty_tpl->getValue('DATA')['remote_api_access'] == 1) {?>checked="checked"<?php }?> class="form-check-input">
                        <label for="remote_api_access" class="form-check-label"><?php echo $_smarty_tpl->getValue('LANG')->getModule('remote_api_access');?>
</label>
                    </div>
                    <div class="form-text"><?php echo $_smarty_tpl->getValue('LANG')->getModule('remote_api_access_help');?>
</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="api_check_time" class="col-sm-3 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('api_check_time');?>
 <span class="text-danger">(*)</span></label>
                <div class="col-sm-8 col-lg-6 col-xxl-5">
                    <div class="input-group">
                        <input type="number" name="api_check_time" id="api_check_time" value="<?php echo $_smarty_tpl->getValue('DATA')['api_check_time'];?>
" min="1" max="1440" class="form-control">
                        <span class="input-group-text"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('sec');?>
</span>
                    </div>
                    <div class="form-text"><?php echo $_smarty_tpl->getValue('LANG')->getModule('api_check_time_help');?>
</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 offset-sm-3">
                    <input type="hidden" name="checkss" value="<?php echo $_smarty_tpl->getValue('CHECKSS');?>
">
                    <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('submit');?>
</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php }
}
