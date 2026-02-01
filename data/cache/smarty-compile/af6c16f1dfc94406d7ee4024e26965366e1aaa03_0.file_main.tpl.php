<?php
/* Smarty version 5.4.3, created on 2026-02-01 18:59:43
  from 'file:main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f402fc41675_13970641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af6c16f1dfc94406d7ee4024e26965366e1aaa03' => 
    array (
      0 => 'main.tpl',
      1 => 1769321928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f402fc41675_13970641 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\extensions';
?><div class="card">
    <div class="card-header">
        <form method="get" action="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php">
            <input type="hidden" name="<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
" value="<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
">
            <input type="hidden" name="<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
" value="<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
">
            <input type="hidden" name="mode" value="search">
            <div class="input-group">
                <input type="text" name="q" value="<?php echo $_smarty_tpl->getValue('REQUEST')['q'];?>
" class="form-control flex-grow-0 w-auto" placeholder="<?php echo $_smarty_tpl->getValue('LANG')->getModule('search_key');?>
" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getModule('search_key');?>
" aria-describedby="element_search_btn">
                <button class="btn btn-primary" type="submit" id="element_search_btn"><i class="fa-solid fa-magnifying-glass"></i> <?php echo $_smarty_tpl->getValue('LANG')->getGlobal('search');?>
</button>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive-lg table-card">
            <table class="table table-striped align-middle mb-0">
                <colgroup>
                    <col style="width: 60%;">
                    <col style="width: 20%;">
                    <col style="width: 20%;">
                </colgroup>
                <tbody>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('ARRAY'), 'row');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('row')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="ext-thumbnail">
                                    <div class="rounded bg-body-tertiary">
                                        <img alt="<?php echo $_smarty_tpl->getValue('row')['title'];?>
" src="<?php if (( !true || empty($_smarty_tpl->getValue('row')['image_small']))) {
echo (defined('ASSETS_STATIC_URL') ? constant('ASSETS_STATIC_URL') : null);?>
/images/no-photo.svg<?php } else {
echo $_smarty_tpl->getValue('row')['image_small'];
}?>">
                                    </div>
                                </div>
                                <div class="ext-titles ps-2">
                                    <h5><?php echo $_smarty_tpl->getValue('row')['title'];?>
</h5>
                                    <div class="text-truncate-2 mb-1"><?php echo $_smarty_tpl->getValue('row')['introtext'];?>
</div>
                                    <div class="text-<?php echo ( !true || empty($_smarty_tpl->getValue('row')['compatible'])) ? 'danger' : 'success';?>
">
                                        <?php echo $_smarty_tpl->getValue('LANG')->getModule(( !true || empty($_smarty_tpl->getValue('row')['compatible'])) ? 'incompatible' : 'compatible');?>

                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <ul class="list-unstyled mb-0">
                                <li><?php echo $_smarty_tpl->getValue('LANG')->getModule('author');?>
 : <span class="text-primary"><?php echo $_smarty_tpl->getValue('row')['username'];?>
</span></li>
                                <li><?php echo $_smarty_tpl->getValue('LANG')->getModule('ext_type');?>
 : <span class="text-primary"><?php echo $_smarty_tpl->getValue('LANG')->getModule("types_".((string)$_smarty_tpl->getValue('row')['tid']));?>
</span></li>
                            </ul>
                        </td>
                        <td class="text-center">
                            <div class="text-nowrap">
                                <?php
$_smarty_tpl->assign('star', null);$_smarty_tpl->tpl_vars['star']->step = 1;$_smarty_tpl->tpl_vars['star']->total = (int) ceil(($_smarty_tpl->tpl_vars['star']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['star']->step));
if ($_smarty_tpl->tpl_vars['star']->total > 0) {
for ($_smarty_tpl->tpl_vars['star']->value = 1, $_smarty_tpl->tpl_vars['star']->iteration = 1;$_smarty_tpl->tpl_vars['star']->iteration <= $_smarty_tpl->tpl_vars['star']->total;$_smarty_tpl->tpl_vars['star']->value += $_smarty_tpl->tpl_vars['star']->step, $_smarty_tpl->tpl_vars['star']->iteration++) {
$_smarty_tpl->tpl_vars['star']->first = $_smarty_tpl->tpl_vars['star']->iteration === 1;$_smarty_tpl->tpl_vars['star']->last = $_smarty_tpl->tpl_vars['star']->iteration === $_smarty_tpl->tpl_vars['star']->total;?><i class="fa-solid fa-star text-<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('ceil')($_smarty_tpl->getValue('row')['rating_avg']) >= $_smarty_tpl->getValue('star') ? 'warning' : 'muted';?>
"></i><?php }
}
?>
                            </div>
                            <div class="hstack gap-2 mt-2 d-inline-flex">
                                <button type="button" class="btn btn-secondary btn-sm text-nowrap ex-detail" data-title="<?php echo $_smarty_tpl->getValue('LANG')->getModule('detail_title',$_smarty_tpl->getValue('row')['title']);?>
" data-url="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=detail&amp;id=<?php echo $_smarty_tpl->getValue('row')['id'];?>
"><i class="fa-solid fa-expand"></i> <?php echo $_smarty_tpl->getValue('LANG')->getModule('detail');?>
</button>
                                <?php if (!( !true || empty($_smarty_tpl->getValue('row')['compatible'])) && ($_smarty_tpl->getValue('GCONFIG')['extension_setup'] == 2 || $_smarty_tpl->getValue('GCONFIG')['extension_setup'] == 3)) {?>
                                <a class="btn btn-primary btn-sm text-nowrap" href="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=install&amp;id=<?php echo $_smarty_tpl->getValue('row')['id'];?>
"><i class="fa-solid fa-cloud-arrow-down"></i> <?php echo $_smarty_tpl->getValue('LANG')->getModule('install');?>
</a>
                                <?php }?>
                            </div>
                        </td>
                    </tr>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (!( !$_smarty_tpl->hasVariable('PAGINATION') || empty($_smarty_tpl->getValue('PAGINATION')))) {?>
    <div class="card-footer border-top">
        <div class="d-flex">
            <div class="ms-auto pagination-wrap">
                <?php echo $_smarty_tpl->getValue('PAGINATION');?>

            </div>
        </div>
    </div>
    <?php }?>
</div>
<div class="modal fade" id="mdExtDetail" tabindex="-1" aria-labelledby="mdExtDetailLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title fs-5 fw-medium" id="mdExtDetailLabel"><?php echo $_smarty_tpl->getValue('LANG')->getModule('file_name');?>
</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('close');?>
"></button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>
<?php }
}
