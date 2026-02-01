<?php
/* Smarty version 5.4.3, created on 2026-02-01 18:59:55
  from 'file:detail-popup.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f403b260130_53464920',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c34758fb71d0281adcfe84a0ebb6464babe5e426' => 
    array (
      0 => 'detail-popup.tpl',
      1 => 1769321928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f403b260130_53464920 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\extensions';
?><div class="ext-detail-container">
    <div class="px-4 tab-header">
        <ul class="nav nav-tabs nav-justified" id="tab-ext-detail">
            <li class="nav-item">
                <a class="nav-link text-truncate active" id="link-info" data-bs-toggle="tab" data-bs-target="#tab-info" aria-current="true" role="tab" aria-controls="tab-info" aria-selected="true" href="#"><?php echo $_smarty_tpl->getValue('LANG')->getModule('tab_info');?>
</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-truncate" id="link-guide" data-bs-toggle="tab" data-bs-target="#tab-guide" aria-current="false" role="tab" aria-controls="tab-guide" aria-selected="false" href="#"><?php echo $_smarty_tpl->getValue('LANG')->getModule('tab_guide');?>
</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-truncate" id="link-images" data-bs-toggle="tab" data-bs-target="#tab-images" aria-current="false" role="tab" aria-controls="tab-images" aria-selected="false" href="#"><?php echo $_smarty_tpl->getValue('LANG')->getModule('tab_images');?>
</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-truncate" id="link-files" data-bs-toggle="tab" data-bs-target="#tab-files" aria-current="false" role="tab" aria-controls="tab-files" aria-selected="false" href="#"><?php echo $_smarty_tpl->getValue('LANG')->getModule('tab_files');?>
</a>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane show active" id="tab-info" role="tabpanel" aria-labelledby="link-info" tabindex="0">
            <div class="px-4 pt-3">
                <div class="row g-3">
                    <div class="col-lg-8 order-2 order-lg-1">
                        <?php echo $_smarty_tpl->getValue('DATA')['description'];?>

                    </div>
                    <div class="col-lg-4 order-1 order-lg-2">
                        <?php if (!( !true || empty($_smarty_tpl->getValue('DATA')['compatible'])) && ($_smarty_tpl->getValue('GCONFIG')['extension_setup'] == 2 || $_smarty_tpl->getValue('GCONFIG')['extension_setup'] == 3)) {?>
                        <div class="d-grid mb-2">
                            <a href="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=install&amp;id=<?php echo $_smarty_tpl->getValue('DATA')['id'];?>
" class="btn btn-primary btn-lg btn-block"><?php echo $_smarty_tpl->getValue('LANG')->getModule('install');?>
</a>
                        </div>
                        <?php }?>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="fw-bold text-<?php echo ( !true || empty($_smarty_tpl->getValue('DATA')['compatible'])) ? 'danger' : 'success';?>
">
                                    <?php echo $_smarty_tpl->getValue('LANG')->getModule(( !true || empty($_smarty_tpl->getValue('DATA')['compatible'])) ? 'incompatible' : 'compatible');?>

                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row g-2">
                                    <div class="col-6 fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule('newest_version');?>
</div>
                                    <div class="col-6"><?php echo $_smarty_tpl->getValue('DATA')['newest_version'];?>
</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row g-2">
                                    <div class="col-6 fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule('updatetime');?>
</div>
                                    <div class="col-6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('ddatetime')($_smarty_tpl->getValue('DATA')['updatetime'],1);?>
</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row g-2">
                                    <div class="col-6 fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule('view_hits');?>
</div>
                                    <div class="col-6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('dnumber')($_smarty_tpl->getValue('DATA')['view_hits']);?>
</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row g-2">
                                    <div class="col-6 fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule('download_hits');?>
</div>
                                    <div class="col-6"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('dnumber')($_smarty_tpl->getValue('DATA')['download_hits']);?>
</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row g-2">
                                    <div class="col-6 fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule('rating_text');?>
</div>
                                    <div class="col-6"><?php echo $_smarty_tpl->getValue('LANG')->getModule('rating_text_detail',$_smarty_tpl->getSmarty()->getModifierCallback('dnumber')($_smarty_tpl->getValue('DATA')['rating_totals']),$_smarty_tpl->getSmarty()->getModifierCallback('dnumber')($_smarty_tpl->getValue('DATA')['rating_hits']));?>
</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row g-2">
                                    <div class="col-6 fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule('license');?>
</div>
                                    <div class="col-6"><?php echo $_smarty_tpl->getValue('DATA')['license'];?>
</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row g-2">
                                    <div class="col-6 fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule('author');?>
</div>
                                    <div class="col-6"><?php echo $_smarty_tpl->getValue('DATA')['username'];?>
</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row g-2">
                                    <div class="col-6 fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule('ext_type');?>
</div>
                                    <div class="col-6"><?php echo $_smarty_tpl->getValue('DATA')['types'];?>
</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row g-2">
                                    <div class="col-6 fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule('price');?>
</div>
                                    <div class="col-6">
                                        <?php if (( !true || empty($_smarty_tpl->getValue('DATA')['price']))) {
echo $_smarty_tpl->getValue('LANG')->getModule('free');
} else { ?>
                                        <?php if ($_smarty_tpl->getValue('DATA')['currency'] == 'VND') {?>
                                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('dcurrency')($_smarty_tpl->getValue('DATA')['price'],'vi');?>

                                        <?php } else { ?>
                                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('dcurrency')($_smarty_tpl->getValue('DATA')['price'],'en');?>

                                        <?php }?>
                                        <?php }?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="tab-guide" role="tabpanel" aria-labelledby="link-guide" tabindex="0">
            <div class="px-4 pt-3">
                <?php if (( !true || empty($_smarty_tpl->getValue('DATA')['documentation']))) {?>
                <div class="alert alert-warning" role="alert"><?php echo $_smarty_tpl->getValue('LANG')->getModule('detail_empty_documentation');?>
</div>
                <?php } else { ?>
                <?php echo $_smarty_tpl->getValue('DATA')['documentation'];?>

                <?php }?>

            </div>
        </div>
        <div class="tab-pane" id="tab-images" role="tabpanel" aria-labelledby="link-images" tabindex="0">
            <div class="px-4 pt-3">
                <?php if (( !true || empty($_smarty_tpl->getValue('DATA')['image_demo']))) {?>
                <div class="alert alert-warning" role="alert"><?php echo $_smarty_tpl->getValue('LANG')->getModule('detail_empty_images');?>
</div>
                <?php } else { ?>
                <div class="row g-3">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('DATA')['image_demo'], 'image');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('image')->value) {
$foreach0DoElse = false;
?>
                    <div class="col-6 col-sm-4 col-lg-3 col-xxl-2">
                        <a href="<?php echo $_smarty_tpl->getValue('image');?>
" target="_blank"><img alt="<?php echo $_smarty_tpl->getValue('DATA')['title'];?>
" src="<?php echo $_smarty_tpl->getValue('image');?>
" class="img-fluid"></a>
                    </div>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
                <?php }?>
            </div>
        </div>
        <div class="tab-pane" id="tab-files" role="tabpanel" aria-labelledby="link-files" tabindex="0">
            <div class="px-4 pt-3">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-nowrap" style="width: 40%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('file_name');?>
</th>
                                <th class="text-nowrap" style="width: 15%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('file_version');?>
</th>
                                <th class="text-nowrap" style="width: 15%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('price');?>
</th>
                                <th class="text-nowrap" style="width: 15%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('compatible');?>
</th>
                                <th class="text-nowrap text-center" style="width: 15%;"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('function');?>
</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('DATA')['files'], 'file');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('file')->value) {
$foreach1DoElse = false;
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->getValue('file')['title'];?>
</td>
                                <td><?php echo $_smarty_tpl->getValue('file')['ver'];?>
</td>
                                <td>
                                    <?php if (( !true || empty($_smarty_tpl->getValue('file')['price']))) {
echo $_smarty_tpl->getValue('LANG')->getModule('free');
} else { ?>
                                    <?php if ($_smarty_tpl->getValue('file')['currency'] == 'VND') {?>
                                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('dcurrency')($_smarty_tpl->getValue('file')['price'],'vi');?>

                                    <?php } else { ?>
                                    <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('dcurrency')($_smarty_tpl->getValue('file')['price'],'en');?>

                                    <?php }?>
                                    <?php }?>
                                </td>
                                <td>
                                    <div class="fw-bold text-<?php echo ( !true || empty($_smarty_tpl->getValue('file')['compatible'])) ? 'danger' : 'success';?>
">
                                        <?php echo $_smarty_tpl->getValue('LANG')->getModule(( !true || empty($_smarty_tpl->getValue('file')['compatible'])) ? 'incompatible' : 'compatible');?>

                                    </div>
                                </td>
                                <td class="text-center">
                                    <?php if ($_smarty_tpl->getValue('file')['type'] == 1 && !( !true || empty($_smarty_tpl->getValue('file')['compatible'])) && ($_smarty_tpl->getValue('GCONFIG')['extension_setup'] == 2 || $_smarty_tpl->getValue('GCONFIG')['extension_setup'] == 3)) {?>
                                    <a href="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=install&amp;id=<?php echo $_smarty_tpl->getValue('DATA')['id'];?>
&amp;fid=<?php echo $_smarty_tpl->getValue('file')['id'];?>
" class="btn btn-primary btn-sm text-nowrap" title="<?php echo $_smarty_tpl->getValue('LANG')->getModule('install_note');?>
" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-title="<?php echo $_smarty_tpl->getValue('LANG')->getModule('install_note');?>
"><i class="fa-solid fa-cloud-arrow-down"></i> <?php echo $_smarty_tpl->getValue('LANG')->getModule('install');?>
</a>
                                    <?php } else { ?>
                                    <a href="<?php echo $_smarty_tpl->getValue('file')['origin_link'];?>
" class="btn btn-primary btn-sm text-nowrap" target="_blank" title="<?php echo $_smarty_tpl->getValue('LANG')->getModule('download_note');?>
" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-title="<?php echo $_smarty_tpl->getValue('LANG')->getModule('download_note');?>
"><i class="fa-solid fa-file-export"></i> <?php echo $_smarty_tpl->getValue('LANG')->getModule('download');?>
</a>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
}
