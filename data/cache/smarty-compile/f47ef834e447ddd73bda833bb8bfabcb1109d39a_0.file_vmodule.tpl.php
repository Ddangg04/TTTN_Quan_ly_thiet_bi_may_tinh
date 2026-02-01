<?php
/* Smarty version 5.4.3, created on 2026-02-01 07:07:13
  from 'file:vmodule.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697e993142fbd8_04424074',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f47ef834e447ddd73bda833bb8bfabcb1109d39a' => 
    array (
      0 => 'vmodule.tpl',
      1 => 1769321928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697e993142fbd8_04424074 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\modules';
?><div class="card border-primary border-3 border-bottom-0 border-start-0 border-end-0">
    <div class="card-body pt-4">
        <form method="post" class="ajax-submit" action="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('OP');?>
" novalidate>
            <div class="alert alert-info"><?php echo $_smarty_tpl->getValue('LANG')->getModule('vmodule_blockquote');?>
</div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-9">
                    <?php echo $_smarty_tpl->getValue('LANG')->getGlobal('required');?>

                </div>
            </div>
            <div class="row mb-3">
                <label for="element_title" class="col-sm-3 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('vmodule_name');?>
 <span class="text-danger">(*)</span></label>
                <div class="col-sm-8 col-lg-6 col-xxl-5">
                    <input type="text" class="form-control" id="element_title" name="title" value="" maxlength="50">
                    <div class="invalid-feedback"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('required_invalid');?>
</div>
                    <div class="form-text"><?php echo $_smarty_tpl->getValue('LANG')->getModule('vmodule_maxlength');?>
</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="element_m_file" class="col-sm-3 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('vmodule_file');?>
 <span class="text-danger">(*)</span></label>
                <div class="col-sm-4 col-lg-6 col-xxl-5">
                    <select class="form-select" id="element_m_file" name="m_file">
                        <option value=""><?php echo $_smarty_tpl->getValue('LANG')->getModule('vmodule_select');?>
</option>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('MODFILE'), 'm_file');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('m_file')->value) {
$foreach0DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('m_file');?>
"><?php echo $_smarty_tpl->getValue('m_file');?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
                    <div class="invalid-feedback"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('required_invalid');?>
</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="element_note" class="col-sm-3 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('vmodule_note');?>
</label>
                <div class="col-sm-8 col-lg-6 col-xxl-5">
                    <textarea type="text" class="form-control" id="element_note" name="note" rows="5"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-lg-6 col-xxl-5 offset-sm-3">
                    <input type="hidden" name="checkss" value="<?php echo (defined('NV_CHECK_SESSION') ? constant('NV_CHECK_SESSION') : null);?>
">
                    <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('submit');?>
</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php }
}
