<?php
/* Smarty version 5.4.3, created on 2026-02-04 14:24:11
  from 'file:main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_6982f41bbea8c0_63574584',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcea1340e76497c1cb46470373b94fb1b3e0bc71' => 
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
function content_6982f41bbea8c0_63574584 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\page';
?><div class="card">
    <div class="table-responsive-lg table-card pb-1">
        <table class="table table-striped align-middle table-sticky mb-0">
            <thead>
                <tr>
                    <th class="text-nowrap" style="width: 7%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('order');?>
</th>
                    <th class="text-nowrap" style="width: 45%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('title');?>
</th>
                    <th class="text-nowrap" style="width: 10%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('add_time');?>
</th>
                    <th class="text-nowrap" style="width: 10%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('edit_time');?>
</th>
                    <th class="text-nowrap" style="width: 6%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('active');?>
</th>
                    <th class="text-nowrap text-center" style="width: 7%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('hitstotal');?>
</th>
                    <th class="text-nowrap" style="width: 15%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('feature');?>
</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('DATA'), 'row', false, 'key');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('row')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td>
                        <select aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getModule('order');?>
" data-toggle="changeWeiPage" data-checkss="<?php echo $_smarty_tpl->getValue('row')['checkss'];?>
" data-id="<?php echo $_smarty_tpl->getValue('row')['id'];?>
" name="change_weight_<?php echo $_smarty_tpl->getValue('row')['id'];?>
" id="change_weight_<?php echo $_smarty_tpl->getValue('row')['id'];?>
" class="form-select form-select-sm fw-75">
                            <?php
$_smarty_tpl->assign('weight', null);$_smarty_tpl->tpl_vars['weight']->step = 1;$_smarty_tpl->tpl_vars['weight']->total = (int) ceil(($_smarty_tpl->tpl_vars['weight']->step > 0 ? $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('DATA'))+1 - (1) : 1-($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('DATA')))+1)/abs($_smarty_tpl->tpl_vars['weight']->step));
if ($_smarty_tpl->tpl_vars['weight']->total > 0) {
for ($_smarty_tpl->tpl_vars['weight']->value = 1, $_smarty_tpl->tpl_vars['weight']->iteration = 1;$_smarty_tpl->tpl_vars['weight']->iteration <= $_smarty_tpl->tpl_vars['weight']->total;$_smarty_tpl->tpl_vars['weight']->value += $_smarty_tpl->tpl_vars['weight']->step, $_smarty_tpl->tpl_vars['weight']->iteration++) {
$_smarty_tpl->tpl_vars['weight']->first = $_smarty_tpl->tpl_vars['weight']->iteration === 1;$_smarty_tpl->tpl_vars['weight']->last = $_smarty_tpl->tpl_vars['weight']->iteration === $_smarty_tpl->tpl_vars['weight']->total;?>
                            <option value="<?php echo $_smarty_tpl->getValue('weight');?>
"<?php if ($_smarty_tpl->getValue('weight') == $_smarty_tpl->getValue('row')['weight']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('weight');?>
</option>
                            <?php }
}
?>
                        </select>
                    </td>
                    <td>
                        <a title="<?php echo $_smarty_tpl->getValue('row')['title'];?>
" href="<?php echo $_smarty_tpl->getValue('row')['url_view'];?>
"><?php echo $_smarty_tpl->getValue('row')['title'];?>
</a>
                    </td>
                    <td><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('ddatetime')($_smarty_tpl->getValue('row')['add_time'],1);?>
</td>
                    <td><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('ddatetime')($_smarty_tpl->getValue('row')['edit_time'],1);?>
</td>
                    <td class="text-center form-switch">
                        <div class="d-inline-flex">
                            <div class="form-check form-switch mb-0">
                                <input class="form-check-input" type="checkbox" role="switch" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getModule('active');?>
" data-toggle="changeActive" data-checkss="<?php echo $_smarty_tpl->getValue('row')['checkss'];?>
" data-id="<?php echo $_smarty_tpl->getValue('row')['id'];?>
" name="change_status_<?php echo $_smarty_tpl->getValue('row')['id'];?>
" id="change_status_<?php echo $_smarty_tpl->getValue('row')['id'];?>
" <?php if ($_smarty_tpl->getValue('row')['status'] == 1) {?> checked<?php }?>/>
                            </div>
                        </div>
                    </td>
                    <td class="text-center"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('dnumber')($_smarty_tpl->getValue('row')['hitstotal']);?>
</td>
                    <td>
                        <div class="hstack gap-1">
                            <?php if (!( !true || empty($_smarty_tpl->getValue('PCONFIG')['copy_page']))) {?>
                            <div class="text-nowrap">
                                <a title="<?php echo $_smarty_tpl->getValue('LANG')->getModule('title_copy_page');?>
" href="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=content&amp;copy=1&amp;id=<?php echo $_smarty_tpl->getValue('row')['id'];?>
" class="btn btn-success btn-sm"><i class="fa-solid fa-copy fa-fw text-center"></i></a>
                            </div>
                            <?php }?>
                            <div class="text-nowrap">
                                <a href="<?php echo $_smarty_tpl->getValue('row')['url_edit'];?>
" class="btn btn-secondary btn-sm"><i class="fa-solid fa-pen"></i> <?php echo $_smarty_tpl->getValue('LANG')->getGlobal('edit');?>
</a>
                            </div>
                            <div class="text-nowrap">
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="nv_del_page" data-checkss="<?php echo $_smarty_tpl->getValue('row')['checkss'];?>
" data-id="<?php echo $_smarty_tpl->getValue('row')['id'];?>
"><i class="fa-solid fa-trash" data-icon="fa-trash"></i> <?php echo $_smarty_tpl->getValue('LANG')->getGlobal('delete');?>
</button>
                            </div>
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
<?php }
}
