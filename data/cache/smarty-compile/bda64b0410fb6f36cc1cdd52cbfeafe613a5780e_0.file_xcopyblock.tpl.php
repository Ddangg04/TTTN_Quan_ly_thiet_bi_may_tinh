<?php
/* Smarty version 5.4.3, created on 2026-02-01 17:14:49
  from 'file:xcopyblock.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f2799c10024_06570843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bda64b0410fb6f36cc1cdd52cbfeafe613a5780e' => 
    array (
      0 => 'xcopyblock.tpl',
      1 => 1769321929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f2799c10024_06570843 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\themes';
?><div class="alert alert-info" role="alert"><?php echo $_smarty_tpl->getValue('LANG')->getModule('xcopyblock_notice');?>
</div>
<div class="card border-primary border-3 border-bottom-0 border-start-0 border-end-0">
    <div class="card-body pt-4">
        <form method="post" id="formXcopyBlock" action="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('OP');?>
" novalidate data-error="<?php echo $_smarty_tpl->getValue('LANG')->getModule('xcopyblock_no_position');?>
">
            <div class="row mb-3">
                <label for="element_theme1" class="col-sm-3 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('xcopyblock');?>
 <?php echo $_smarty_tpl->getValue('LANG')->getModule('xcopyblock_from');?>
</label>
                <div class="col-sm-4 col-lg-6 col-xxl-5">
                    <select class="form-select w-auto mw-100" id="element_theme1" name="theme1" data-toggle="xCpBlSel">
                        <option value="0"><?php echo $_smarty_tpl->getValue('LANG')->getModule('autoinstall_method_theme_none');?>
</option>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('ARRAY_THEMES'), 'theme');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('theme')->value) {
$foreach0DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('theme');?>
"><?php echo $_smarty_tpl->getValue('theme');?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="element_theme2" class="col-sm-3 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('xcopyblock_to');?>
</label>
                <div class="col-sm-4 col-lg-6 col-xxl-5">
                    <select class="form-select w-auto mw-100" id="element_theme2" name="theme2" data-toggle="xCpBlSel">
                        <option value="0"><?php echo $_smarty_tpl->getValue('LANG')->getModule('autoinstall_method_theme_none');?>
</option>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('ARRAY_THEMES'), 'theme');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('theme')->value) {
$foreach1DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('theme');?>
"<?php if ($_smarty_tpl->getValue('theme') == $_smarty_tpl->getValue('SELECTTHEMES') && $_smarty_tpl->getValue('SELECTTHEMES') != 'default') {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('theme');?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div id="loadposition" class="row mb-3 d-none">
                <div class="col-sm-3 col-form-label text-sm-end pt-0"><?php echo $_smarty_tpl->getValue('LANG')->getModule('xcopyblock_position');?>
</div>
                <div class="col-sm-4 col-lg-6 col-xxl-5">
                    <div data-toggle="loader" class="d-none">
                        <i class="fa-solid fa-spinner fa-spin-pulse"></i> <?php echo $_smarty_tpl->getValue('LANG')->getGlobal('wait_page_load');?>

                    </div>
                    <div data-toggle="res" class="d-none"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-lg-6 col-xxl-5 offset-sm-3">
                    <input type="hidden" name="checkss" value="<?php echo $_smarty_tpl->getValue('CHECKSS');?>
">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-shuffle" data-icon="fa-shuffle"></i> <?php echo $_smarty_tpl->getValue('LANG')->getGlobal('submit');?>
</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php }
}
