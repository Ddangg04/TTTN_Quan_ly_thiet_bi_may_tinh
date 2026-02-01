<?php
/* Smarty version 5.4.3, created on 2026-02-01 17:06:39
  from 'file:setting.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f25afb6a146_57799542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1693c8dd29ea9f2159557ac2bd86377b27f2da5' => 
    array (
      0 => 'setting.tpl',
      1 => 1769321928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f25afb6a146_57799542 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\database';
?><div class="card border-primary border-3 border-bottom-0 border-start-0 border-end-0 mb-4">
    <div class="card-body pt-4">
        <form method="post" class="ajax-submit" action="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('OP');?>
" novalidate>
            <div class="row mb-3">
                <div class="col-12 col-sm-7 col-lg-6 col-xxl-5 offset-sm-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="dump_autobackup" value="1"<?php if ($_smarty_tpl->getValue('DATA')['dump_autobackup']) {?> checked="checked"<?php }?> role="switch" id="element_dump_autobackup">
                        <label class="form-check-label" for="element_dump_autobackup"><?php echo $_smarty_tpl->getValue('LANG')->getModule('dump_autobackup');?>
</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-12 col-sm-3 col-form-label text-sm-end" for="element_dump_backup_ext"><?php echo $_smarty_tpl->getValue('LANG')->getModule('dump_backup_ext');?>
</label>
                <div class="col-12 col-sm-7 col-lg-6 col-xxl-5">
                    <select class="form-select" name="dump_backup_ext" id="element_dump_backup_ext">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('SQL_EXTS'), 'ext');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('ext')->value) {
$foreach0DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('ext');?>
"<?php if ($_smarty_tpl->getValue('ext') == $_smarty_tpl->getValue('DATA')['dump_backup_ext']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('ext');?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-12 col-sm-3 col-form-label text-sm-end" for="element_dump_interval"><?php echo $_smarty_tpl->getValue('LANG')->getModule('dump_interval');?>
</label>
                <div class="col-12 col-sm-7 col-lg-6 col-xxl-5">
                    <div class="d-flex align-items-center w-auto">
                        <select class="form-select" name="dump_interval" id="element_dump_interval">
                            <?php
$_smarty_tpl->assign('value', null);$_smarty_tpl->tpl_vars['value']->step = 1;$_smarty_tpl->tpl_vars['value']->total = (int) ceil(($_smarty_tpl->tpl_vars['value']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['value']->step));
if ($_smarty_tpl->tpl_vars['value']->total > 0) {
for ($_smarty_tpl->tpl_vars['value']->value = 1, $_smarty_tpl->tpl_vars['value']->iteration = 1;$_smarty_tpl->tpl_vars['value']->iteration <= $_smarty_tpl->tpl_vars['value']->total;$_smarty_tpl->tpl_vars['value']->value += $_smarty_tpl->tpl_vars['value']->step, $_smarty_tpl->tpl_vars['value']->iteration++) {
$_smarty_tpl->tpl_vars['value']->first = $_smarty_tpl->tpl_vars['value']->iteration === 1;$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration === $_smarty_tpl->tpl_vars['value']->total;?>
                            <option value="<?php echo $_smarty_tpl->getValue('value');?>
"<?php if ($_smarty_tpl->getValue('value') == $_smarty_tpl->getValue('DATA')['dump_interval']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('value');?>
</option>
                            <?php }
}
?>
                        </select>
                        <span class="ms-2">(<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('day');?>
)</span>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-12 col-sm-3 col-form-label text-sm-end" for="element_dump_backup_day"><?php echo $_smarty_tpl->getValue('LANG')->getModule('dump_backup_day');?>
</label>
                <div class="col-12 col-sm-7 col-lg-6 col-xxl-5">
                    <div class="d-flex align-items-center w-auto">
                        <select class="form-select" name="dump_backup_day" id="element_dump_backup_day">
                            <?php
$_smarty_tpl->assign('value', null);$_smarty_tpl->tpl_vars['value']->step = 1;$_smarty_tpl->tpl_vars['value']->total = (int) ceil(($_smarty_tpl->tpl_vars['value']->step > 0 ? 99+1 - (2) : 2-(99)+1)/abs($_smarty_tpl->tpl_vars['value']->step));
if ($_smarty_tpl->tpl_vars['value']->total > 0) {
for ($_smarty_tpl->tpl_vars['value']->value = 2, $_smarty_tpl->tpl_vars['value']->iteration = 1;$_smarty_tpl->tpl_vars['value']->iteration <= $_smarty_tpl->tpl_vars['value']->total;$_smarty_tpl->tpl_vars['value']->value += $_smarty_tpl->tpl_vars['value']->step, $_smarty_tpl->tpl_vars['value']->iteration++) {
$_smarty_tpl->tpl_vars['value']->first = $_smarty_tpl->tpl_vars['value']->iteration === 1;$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration === $_smarty_tpl->tpl_vars['value']->total;?>
                            <option value="<?php echo $_smarty_tpl->getValue('value');?>
"<?php if ($_smarty_tpl->getValue('value') == $_smarty_tpl->getValue('DATA')['dump_backup_day']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('value');?>
</option>
                            <?php }
}
?>
                        </select>
                        <span class="ms-2">(<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('day');?>
)</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-7 col-lg-6 col-xxl-5 offset-sm-3">
                    <input type="hidden" name="checkss" value="<?php echo $_smarty_tpl->getValue('CHECKSS');?>
">
                    <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('save');?>
</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php }
}
