<?php
/* Smarty version 5.4.3, created on 2026-02-04 14:22:17
  from 'file:config.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_6982f3a9e43ea7_94269963',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec686cf8f0d7f6e17f75131d8d09e51ce623b37b' => 
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
function content_6982f3a9e43ea7_94269963 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\page';
?><form method="post" class="ajax-submit" action="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('OP');?>
" novalidate>
    <div class="row g-3">
        <div class="col-xxl-6">
            <div class="card border-primary border-3 border-bottom-0 border-start-0 border-end-0">
                <div class="card-header fs-5 fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule('config_common');?>
</div>
                <div class="card-body pt-4">
                    <div class="row mb-3">
                        <label for="ele_viewtype" class="col-sm-3 col-xxl-4 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('config_view_type');?>
</label>
                        <div class="col-sm-4 col-lg-6 col-xxl-8">
                            <select class="form-select w-auto mw-100" id="ele_viewtype" name="viewtype">
                                <?php
$_smarty_tpl->assign('type', null);$_smarty_tpl->tpl_vars['type']->step = 1;$_smarty_tpl->tpl_vars['type']->total = (int) ceil(($_smarty_tpl->tpl_vars['type']->step > 0 ? 2+1 - (0) : 0-(2)+1)/abs($_smarty_tpl->tpl_vars['type']->step));
if ($_smarty_tpl->tpl_vars['type']->total > 0) {
for ($_smarty_tpl->tpl_vars['type']->value = 0, $_smarty_tpl->tpl_vars['type']->iteration = 1;$_smarty_tpl->tpl_vars['type']->iteration <= $_smarty_tpl->tpl_vars['type']->total;$_smarty_tpl->tpl_vars['type']->value += $_smarty_tpl->tpl_vars['type']->step, $_smarty_tpl->tpl_vars['type']->iteration++) {
$_smarty_tpl->tpl_vars['type']->first = $_smarty_tpl->tpl_vars['type']->iteration === 1;$_smarty_tpl->tpl_vars['type']->last = $_smarty_tpl->tpl_vars['type']->iteration === $_smarty_tpl->tpl_vars['type']->total;?>
                                <option value="<?php echo $_smarty_tpl->getValue('type');?>
"<?php if ($_smarty_tpl->getValue('type') == $_smarty_tpl->getValue('DATA')['viewtype']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('LANG')->getModule("config_view_type_".((string)$_smarty_tpl->getValue('type')));?>
</option>
                                <?php }
}
?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ele_per_page" class="col-sm-3 col-xxl-4 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('config_view_type_page');?>
</label>
                        <div class="col-sm-4 col-lg-6 col-xxl-8">
                            <select class="form-select w-auto mw-100" id="ele_per_page" name="per_page">
                                <?php
$_smarty_tpl->assign('value', null);$_smarty_tpl->tpl_vars['value']->step = 1;$_smarty_tpl->tpl_vars['value']->total = (int) ceil(($_smarty_tpl->tpl_vars['value']->step > 0 ? 30+1 - (2) : 2-(30)+1)/abs($_smarty_tpl->tpl_vars['value']->step));
if ($_smarty_tpl->tpl_vars['value']->total > 0) {
for ($_smarty_tpl->tpl_vars['value']->value = 2, $_smarty_tpl->tpl_vars['value']->iteration = 1;$_smarty_tpl->tpl_vars['value']->iteration <= $_smarty_tpl->tpl_vars['value']->total;$_smarty_tpl->tpl_vars['value']->value += $_smarty_tpl->tpl_vars['value']->step, $_smarty_tpl->tpl_vars['value']->iteration++) {
$_smarty_tpl->tpl_vars['value']->first = $_smarty_tpl->tpl_vars['value']->iteration === 1;$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration === $_smarty_tpl->tpl_vars['value']->total;?>
                                <option value="<?php echo $_smarty_tpl->getValue('value');?>
"<?php if ($_smarty_tpl->getValue('value') == $_smarty_tpl->getValue('DATA')['per_page']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('value');?>
</option>
                                <?php }
}
?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ele_related_articles" class="col-sm-3 col-xxl-4 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('config_view_related_articles');?>
</label>
                        <div class="col-sm-4 col-lg-6 col-xxl-8">
                            <select class="form-select w-auto mw-100" id="ele_related_articles" name="related_articles">
                                <?php
$_smarty_tpl->assign('value', null);$_smarty_tpl->tpl_vars['value']->step = 1;$_smarty_tpl->tpl_vars['value']->total = (int) ceil(($_smarty_tpl->tpl_vars['value']->step > 0 ? 30+1 - (2) : 2-(30)+1)/abs($_smarty_tpl->tpl_vars['value']->step));
if ($_smarty_tpl->tpl_vars['value']->total > 0) {
for ($_smarty_tpl->tpl_vars['value']->value = 2, $_smarty_tpl->tpl_vars['value']->iteration = 1;$_smarty_tpl->tpl_vars['value']->iteration <= $_smarty_tpl->tpl_vars['value']->total;$_smarty_tpl->tpl_vars['value']->value += $_smarty_tpl->tpl_vars['value']->step, $_smarty_tpl->tpl_vars['value']->iteration++) {
$_smarty_tpl->tpl_vars['value']->first = $_smarty_tpl->tpl_vars['value']->iteration === 1;$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration === $_smarty_tpl->tpl_vars['value']->total;?>
                                <option value="<?php echo $_smarty_tpl->getValue('value');?>
"<?php if ($_smarty_tpl->getValue('value') == $_smarty_tpl->getValue('DATA')['related_articles']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('value');?>
</option>
                                <?php }
}
?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-8 col-lg-6 col-xxl-8 offset-sm-3 offset-xxl-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="news_first" value="1"<?php if ($_smarty_tpl->getValue('DATA')['news_first']) {?> checked<?php }?> role="switch" id="element_news_first">
                                <label class="form-check-label" for="element_news_first"><?php echo $_smarty_tpl->getValue('LANG')->getModule('first_news');?>
</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ele_facebookapi" class="col-sm-3 col-xxl-4 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('config_facebookapi');?>
</label>
                        <div class="col-sm-4 col-lg-6 col-xxl-7">
                            <input type="text" class="form-control" id="ele_facebookapi" name="facebookapi" value="<?php echo $_smarty_tpl->getValue('DATA')['facebookapi'];?>
">
                            <div class="form-text"><?php echo $_smarty_tpl->getValue('LANG')->getModule('config_facebookapi_note');?>
</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3 col-xxl-4 col-form-label text-sm-end pt-0"><?php echo $_smarty_tpl->getValue('LANG')->getModule('socialbutton');?>
</div>
                        <div class="col-sm-8 col-lg-6 col-xxl-8">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('SOCIAL_BUTTONS'), 'button');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('button')->value) {
$foreach0DoElse = false;
?>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox"<?php if ($_smarty_tpl->getValue('button') == 'zalo' && ( !true || empty($_smarty_tpl->getValue('GCONFIG')['zaloOfficialAccountID']))) {?> disabled<?php }?> name="socialbutton[]" value="<?php echo $_smarty_tpl->getValue('button');?>
"<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')($_smarty_tpl->getValue('button'),$_smarty_tpl->getValue('DATA')['socialbutton'],true)) {?> checked<?php }?> role="switch" id="element_socialbutton_<?php echo $_smarty_tpl->getValue('button');?>
">
                                <label class="form-check-label opacity-100" for="element_socialbutton_<?php echo $_smarty_tpl->getValue('button');?>
">
                                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('ucfirst')($_smarty_tpl->getValue('button'));
if ($_smarty_tpl->getValue('button') == 'zalo' && ( !true || empty($_smarty_tpl->getValue('GCONFIG')['zaloOfficialAccountID']))) {?>
                                    (<a href="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=zalo&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=settings"><?php echo $_smarty_tpl->getValue('LANG')->getModule('socialbutton_zalo_note');?>
</a>)
                                    <?php }?>
                                </label>
                            </div>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-8 col-lg-6 col-xxl-8 offset-sm-3 offset-xxl-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="copy_page" value="1"<?php if ($_smarty_tpl->getValue('DATA')['copy_page']) {?> checked<?php }?> role="switch" id="element_copy_page">
                                <label class="form-check-label" for="element_copy_page"><?php echo $_smarty_tpl->getValue('LANG')->getModule('setting_copy_page');?>
</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-8 col-lg-6 col-xxl-8 offset-sm-3 offset-xxl-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="alias_lower" value="1"<?php if ($_smarty_tpl->getValue('DATA')['alias_lower']) {?> checked<?php }?> role="switch" id="element_alias_lower">
                                <label class="form-check-label" for="element_alias_lower"><?php echo $_smarty_tpl->getValue('LANG')->getModule('config_alias_lower');?>
</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-lg-6 col-xxl-8 offset-sm-3 offset-xxl-4">
                            <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('submit');?>
</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6">
            <div class="card border-primary border-3 border-bottom-0 border-start-0 border-end-0">
                <div class="card-header fs-5 fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule('config_dpost');?>
</div>
                <div class="card-body pt-4">
                    <div class="row mb-3">
                        <label for="schema_type" class="col-sm-3 col-xxl-4 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('schema_type');?>
</label>
                        <div class="col-sm-4 col-lg-6 col-xxl-8">
                            <select class="form-select w-auto mw-100" id="schema_type" name="schema_type">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('SCHEMA_TYPES'), 'value', false, 'key');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('value')->value) {
$foreach1DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('key');?>
"<?php if ($_smarty_tpl->getValue('key') == $_smarty_tpl->getValue('DATA')['schema_type']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('value');?>
</option>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3<?php if ($_smarty_tpl->getValue('DATA')['schema_type'] != 'webpage') {?> d-none<?php }?>" id="schema_about_container">
                        <label for="schema_about" class="col-sm-3 col-xxl-4 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('schema_about');?>
</label>
                        <div class="col-sm-4 col-lg-6 col-xxl-8">
                            <select class="form-select w-auto mw-100" id="schema_about" name="schema_about">
                                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('SCHEMA_ABOUTS'), 'value', false, 'key');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('value')->value) {
$foreach2DoElse = false;
?>
                                <option value="<?php echo $_smarty_tpl->getValue('key');?>
"<?php if ($_smarty_tpl->getValue('key') == $_smarty_tpl->getValue('DATA')['schema_about']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('value');?>
</option>
                                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 col-lg-6 col-xxl-8 offset-sm-3 offset-xxl-4">
                            <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('submit');?>
</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="save" value="1">
    <input type="hidden" name="checkss" value="<?php echo (defined('NV_CHECK_SESSION') ? constant('NV_CHECK_SESSION') : null);?>
">
</form>
<?php }
}
