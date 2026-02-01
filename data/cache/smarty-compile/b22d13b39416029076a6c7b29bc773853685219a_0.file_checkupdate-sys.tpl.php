<?php
/* Smarty version 5.4.3, created on 2026-02-01 18:59:16
  from 'file:checkupdate-sys.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f4014d5ae25_94085954',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b22d13b39416029076a6c7b29bc773853685219a' => 
    array (
      0 => 'checkupdate-sys.tpl',
      1 => 1769321929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f4014d5ae25_94085954 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\webtools';
?><div class="card mb-3 text-bg-primary">
    <div class="card-header fs-5 fw-medium">
        <?php echo $_smarty_tpl->getValue('LANG')->getModule('checkSystem');?>

    </div>
    <div class="card-body">
        <div class="table-responsive-lg table-card">
            <table class="table table-striped mb-0">
                <thead class="text-muted">
                    <tr>
                        <th style="width: 30%;" class="text-nowrap"><?php echo $_smarty_tpl->getValue('LANG')->getModule('checkContent');?>
</th>
                        <th style="width: 70%;" class="text-nowrap"><?php echo $_smarty_tpl->getValue('LANG')->getModule('checkValue');?>
</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('LANG')->getModule('userVersion');?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('GCONFIG')['version'];?>
</td>
                    </tr>
                    <tr>
                        <td><?php echo $_smarty_tpl->getValue('LANG')->getModule('onlineVersion');?>
</td>
                        <td>
                            <?php echo $_smarty_tpl->getValue('LANG')->getModule('newVersion_detail',$_smarty_tpl->getValue('VERSION')['version'],$_smarty_tpl->getValue('VERSION')['name'],$_smarty_tpl->getValue('VERSION')['date']);?>

                            <?php if ($_smarty_tpl->getValue('VERSION')['need_update']) {?>
                            <div class="mt-2">
                                <?php echo $_smarty_tpl->getValue('VERSION')['info'];?>

                            </div>
                            <div class="mt-2 text-danger fw-medium">
                                <?php if ($_smarty_tpl->getValue('VERSION')['version'] == $_smarty_tpl->getValue('VERSION')['updateable']) {?>
                                <?php echo $_smarty_tpl->getValue('LANG')->getModule('newVersion_info1',$_smarty_tpl->getValue('VERSION')['link_update']);?>

                                <?php } elseif (!( !true || empty($_smarty_tpl->getValue('VERSION')['updateable']))) {?>
                                <?php echo $_smarty_tpl->getValue('LANG')->getModule('newVersion_info2',$_smarty_tpl->getValue('VERSION')['updateable'],$_smarty_tpl->getValue('VERSION')['link_update']);?>

                                <?php } else { ?>
                                <?php echo $_smarty_tpl->getValue('LANG')->getModule('newVersion_info3',$_smarty_tpl->getValue('VERSION')['link']);?>

                                <?php }?>
                            </div>
                            <?php }?>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="text-end">
                            <?php echo $_smarty_tpl->getValue('LANG')->getModule('checkDate');?>
 <?php echo $_smarty_tpl->getValue('SYSUPDDATE');?>
 (<a id="sysUpdRefresh" href="#"><?php echo $_smarty_tpl->getValue('LANG')->getModule('reCheck');?>
</a>)
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php }
}
