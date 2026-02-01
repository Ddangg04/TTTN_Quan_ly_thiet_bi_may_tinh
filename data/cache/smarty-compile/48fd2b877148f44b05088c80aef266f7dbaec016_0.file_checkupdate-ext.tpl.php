<?php
/* Smarty version 5.4.3, created on 2026-02-01 18:59:17
  from 'file:checkupdate-ext.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f4015e97af5_09341725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48fd2b877148f44b05088c80aef266f7dbaec016' => 
    array (
      0 => 'checkupdate-ext.tpl',
      1 => 1769321929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f4015e97af5_09341725 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\webtools';
?><div class="card mb-3 text-bg-primary">
    <div class="card-header fs-5 fw-medium">
        <?php echo $_smarty_tpl->getValue('LANG')->getModule('checkExtensions');?>

    </div>
    <div class="card-body">
        <div class="table-responsive-lg table-card">
            <table class="table table-striped mb-0">
                <thead class="text-muted">
                    <tr>
                        <th style="width: 25%;" class="text-nowrap"><?php echo $_smarty_tpl->getValue('LANG')->getModule('extName');?>
</th>
                        <th style="width: 25%;" class="text-nowrap"><?php echo $_smarty_tpl->getValue('LANG')->getModule('extType');?>
</th>
                        <th style="width: 45%;" class="text-nowrap"><?php echo $_smarty_tpl->getValue('LANG')->getModule('extInfo');?>
</th>
                        <th style="width: 5%;" class="text-nowrap text-center"><?php echo $_smarty_tpl->getValue('LANG')->getModule('extNote');?>
</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('EXTS'), 'ext');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('ext')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td class="text-break"><?php echo $_smarty_tpl->getValue('ext')['name'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('ext')['type_text'];?>
</td>
                        <td>
                            <a href="#" data-toggle="viewUpExtInfo" data-title="<?php echo $_smarty_tpl->getValue('ext')['name'];?>
"><?php echo $_smarty_tpl->getValue('LANG')->getModule('userVersion');?>
: <?php echo $_smarty_tpl->getValue('ext')['version'] ?: 'n/a';?>
; <?php echo $_smarty_tpl->getValue('LANG')->getModule('onlineVersion');?>
: <?php if (!( !true || empty($_smarty_tpl->getValue('ext')['new_version']))) {
echo $_smarty_tpl->getValue('ext')['new_version'];
} elseif (!( !true || empty($_smarty_tpl->getValue('ext')['version'])) && $_smarty_tpl->getValue('ext')['origin']) {
echo $_smarty_tpl->getValue('ext')['version'];
} else { ?>n/a<?php }?></a>
                            <div class="d-none" data-toggle="viewUpExtInfoBody">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5"><?php echo $_smarty_tpl->getValue('LANG')->getModule('userVersion');?>
</div>
                                            <div class="col-6 fw-medium text-break"><?php echo $_smarty_tpl->getValue('ext')['version'] ?: 'n/a';
if (!( !true || empty($_smarty_tpl->getValue('ext')['date_show']))) {?> (<?php echo $_smarty_tpl->getValue('ext')['date_show'];?>
)<?php }?></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5"><?php echo $_smarty_tpl->getValue('LANG')->getModule('onlineVersion');?>
</div>
                                            <div class="col-6 fw-medium text-break"><?php if (!( !true || empty($_smarty_tpl->getValue('ext')['new_version']))) {
echo $_smarty_tpl->getValue('ext')['new_version'];
} elseif (!( !true || empty($_smarty_tpl->getValue('ext')['version'])) && $_smarty_tpl->getValue('ext')['origin']) {
echo $_smarty_tpl->getValue('ext')['version'];
} else { ?>n/a<?php }
if (!( !true || empty($_smarty_tpl->getValue('ext')['new_date_show']))) {?> (<?php echo $_smarty_tpl->getValue('ext')['new_date_show'];?>
)<?php }?></div>
                                        </div>
                                    </li>
                                    <?php if (!( !true || empty($_smarty_tpl->getValue('ext')['author']))) {?>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5"><?php echo $_smarty_tpl->getValue('LANG')->getModule('extAuthor');?>
</div>
                                            <div class="col-6 fw-medium text-break"><?php echo $_smarty_tpl->getValue('ext')['author'];?>
</div>
                                        </div>
                                    </li>
                                    <?php }?>
                                    <?php if (!( !true || empty($_smarty_tpl->getValue('ext')['license']))) {?>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5"><?php echo $_smarty_tpl->getValue('LANG')->getModule('extLicense');?>
</div>
                                            <div class="col-6 fw-medium text-break"><?php echo $_smarty_tpl->getValue('ext')['license'];?>
</div>
                                        </div>
                                    </li>
                                    <?php }?>
                                    <?php if (!( !true || empty($_smarty_tpl->getValue('ext')['mode']))) {?>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5"><?php echo $_smarty_tpl->getValue('LANG')->getModule('extMode');?>
</div>
                                            <div class="col-6 fw-medium text-break"><?php if ($_smarty_tpl->getValue('ext')['mode'] == 'sys') {
echo $_smarty_tpl->getValue('LANG')->getModule('extModeSys');
} else {
echo $_smarty_tpl->getValue('LANG')->getModule('extModeOther');
}?></div>
                                        </div>
                                    </li>
                                    <?php }?>
                                    <?php if (!( !true || empty($_smarty_tpl->getValue('ext')['link']))) {?>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5"><?php echo $_smarty_tpl->getValue('LANG')->getModule('extLink');?>
</div>
                                            <div class="col-6 fw-medium text-break"><a href="<?php echo $_smarty_tpl->getValue('ext')['link'];?>
" target="_blank"><?php echo $_smarty_tpl->getValue('ext')['link'];?>
</a></div>
                                        </div>
                                    </li>
                                    <?php }?>
                                    <?php if (!( !true || empty($_smarty_tpl->getValue('ext')['support']))) {?>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-5"><?php echo $_smarty_tpl->getValue('LANG')->getModule('extSupport');?>
</div>
                                            <div class="col-6 fw-medium text-break"><a href="<?php echo $_smarty_tpl->getValue('ext')['support'];?>
" target="_blank"><?php echo $_smarty_tpl->getValue('ext')['support'];?>
</a></div>
                                        </div>
                                    </li>
                                    <?php }?>
                                </ul>
                                <?php if (( !true || empty($_smarty_tpl->getValue('ext')['version'])) || $_smarty_tpl->getValue('ext')['note_level'] > 0) {?>
                                <div class="alert alert-danger mb-0 mt-3" role="alert">
                                    <?php echo $_smarty_tpl->getValue('LANG')->getModule('extNote1_detail');?>

                                </div>
                                <?php }?>
                                <?php if ($_smarty_tpl->getValue('ext')['up_need']) {?>
                                <?php if (( !true || empty($_smarty_tpl->getValue('ext')['up_new_version']))) {?>
                                <div class="alert alert-warning mb-0 mt-3" role="alert">
                                    <?php echo $_smarty_tpl->getValue('LANG')->getModule('extUpdNote1',$_smarty_tpl->getValue('ext')['link']);?>

                                </div>
                                <?php } elseif ($_smarty_tpl->getValue('ext')['up_new_version']['new'] != $_smarty_tpl->getValue('ext')['new_version']) {?>
                                <div class="alert alert-info mb-0 mt-3" role="alert">
                                    <?php echo $_smarty_tpl->getValue('LANG')->getModule('extUpdNote2',$_smarty_tpl->getValue('ext')['up_new_version']['new'],$_smarty_tpl->getValue('ext')['up_link']);?>

                                </div>
                                <?php } else { ?>
                                <div class="alert alert-success mb-0 mt-3" role="alert">
                                    <?php echo $_smarty_tpl->getValue('LANG')->getModule('extUpdNote3',$_smarty_tpl->getValue('ext')['up_link']);?>

                                </div>
                                <?php }?>
                                <?php }?>
                            </div>
                        </td>
                        <td class="text-center">
                            <i class="fa-solid<?php if ($_smarty_tpl->getValue('ext')['status_level'] == 3) {?> text-success fa-circle-check<?php } elseif ($_smarty_tpl->getValue('ext')['status_level'] == 2) {?> text-danger fa-circle-xmark<?php } else { ?> text-warning fa-triangle-exclamation<?php }?>" data-bs-toggle="tooltip" data-bs-title="<?php echo $_smarty_tpl->getValue('ext')['status_note'];?>
" aria-label="<?php echo $_smarty_tpl->getValue('ext')['status_note'];?>
" data-bs-trigger="hover" title="<?php echo $_smarty_tpl->getValue('ext')['status_note'];?>
"></i>
                        </td>
                    </tr>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-end">
                            <?php echo $_smarty_tpl->getValue('LANG')->getModule('checkDate');?>
 <?php echo $_smarty_tpl->getValue('EXTUPDDATE');?>
 (<a id="extUpdRefresh" href="#"><?php echo $_smarty_tpl->getValue('LANG')->getModule('reCheck');?>
</a>)
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-footer bg-body-tertiary text-body">
        <a class="btn btn-success" href="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=extensions&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=newest"><?php echo $_smarty_tpl->getValue('LANG')->getModule('extNew');?>
</a>
    </div>
</div>
<?php }
}
