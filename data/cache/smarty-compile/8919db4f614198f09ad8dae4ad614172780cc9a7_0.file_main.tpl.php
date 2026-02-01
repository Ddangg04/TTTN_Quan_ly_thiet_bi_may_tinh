<?php
/* Smarty version 5.4.3, created on 2026-02-01 17:14:41
  from 'file:main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f27912db760_36548767',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8919db4f614198f09ad8dae4ad614172780cc9a7' => 
    array (
      0 => 'main.tpl',
      1 => 1769321929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f27912db760_36548767 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\themes';
echo '<script'; ?>
 type="text/javascript" src="<?php echo (defined('ASSETS_STATIC_URL') ? constant('ASSETS_STATIC_URL') : null);?>
/js/clipboard/clipboard.min.js"><?php echo '</script'; ?>
>
<?php if (!( !$_smarty_tpl->hasVariable('ERRORCONFIG') || empty($_smarty_tpl->getValue('ERRORCONFIG')))) {?>
<div class="alert alert-danger" role="alert">ERROR! CONFIG FILE:<br /><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('join')($_smarty_tpl->getValue('ERRORCONFIG'),'<br />');?>
</div>
<?php }?>
<div class="row g-3" id="mainthemes">
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('ARRAY'), 'theme');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('theme')->value) {
$foreach0DoElse = false;
?>
    <div class="col-sm-6 col-lg-4 col-xl-3 col-xxl-2">
        <div class="card<?php if ($_smarty_tpl->getValue('GCONFIG')['site_theme'] == $_smarty_tpl->getValue('theme')['value']) {?> text-bg-primary<?php }?> item theme-item">
            <div class="themelist-thumb">
                <div class="themelist">
                    <img alt="<?php echo $_smarty_tpl->getValue('theme')['name'];?>
" src="<?php echo (defined('NV_BASE_SITEURL') ? constant('NV_BASE_SITEURL') : null);?>
themes/<?php echo $_smarty_tpl->getValue('theme')['value'];?>
/<?php echo $_smarty_tpl->getValue('theme')['thumbnail'];?>
">
                </div>
                <?php if ($_smarty_tpl->getValue('theme')['allowed_delete'] || $_smarty_tpl->getValue('theme')['allowed_active'] || $_smarty_tpl->getValue('theme')['allowed_setting']) {?>
                <div class="theme-btns flex-wrap">
                    <?php if ($_smarty_tpl->getValue('theme')['allowed_setting']) {?>
                    <button type="button" class="btn btn-dark w-100 text-truncate activate" data-theme="<?php echo $_smarty_tpl->getValue('theme')['value'];?>
" data-checkss="<?php echo $_smarty_tpl->getValue('theme')['checkss'];?>
"><i class="fa-solid fa-sun fa-fw" data-icon="fa-sun"></i> <?php echo $_smarty_tpl->getValue('LANG')->getModule('theme_created_setting');?>
</button>
                    <?php }?>
                    <?php if ($_smarty_tpl->getValue('theme')['allowed_active']) {?>
                    <button type="button" class="btn btn-dark w-100 text-truncate activate" data-theme="<?php echo $_smarty_tpl->getValue('theme')['value'];?>
" data-checkss="<?php echo $_smarty_tpl->getValue('theme')['checkss'];?>
"><i class="fa-solid fa-sun fa-fw" data-icon="fa-sun"></i> <?php echo $_smarty_tpl->getValue('LANG')->getModule('theme_created_activate');?>
</button>
                    <?php }?>
                    <?php if ($_smarty_tpl->getValue('theme')['allowed_delete']) {?>
                    <button type="button" class="btn btn-danger w-100 text-truncate delete" data-theme="<?php echo $_smarty_tpl->getValue('theme')['value'];?>
" data-checkss="<?php echo $_smarty_tpl->getValue('theme')['checkss'];?>
" data-confirm="<?php echo $_smarty_tpl->getValue('LANG')->getModule('theme_delete_confirm');?>
"><i class="fa-solid fa-trash fa-fw" data-icon="fa-trash"></i> <?php echo $_smarty_tpl->getValue('LANG')->getModule('theme_delete');?>
</button>
                    <?php }?>
                </div>
                <?php }?>
            </div>
            <div class="card-body p-2">
                <div class="d-flex gap-2 align-items-center justify-content-between">
                    <h2 class="text-truncate fs-5 mw-100 mb-0" title="<?php echo $_smarty_tpl->getValue('theme')['name'];?>
"><?php echo $_smarty_tpl->getValue('theme')['name'];?>
</h2>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#theme-detail-<?php echo $_smarty_tpl->getValue('theme')['value'];?>
" class="flex-shrink-0 btn btn-sm btn-<?php echo $_smarty_tpl->getValue('GCONFIG')['site_theme'] == $_smarty_tpl->getValue('theme')['value'] ? 'secondary' : 'primary';?>
"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('detail');?>
</button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="theme-detail-<?php echo $_smarty_tpl->getValue('theme')['value'];?>
" tabindex="-1" aria-labelledby="theme-detail-<?php echo $_smarty_tpl->getValue('theme')['value'];?>
-lbl" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="nv-theme-detail">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title fs-5 fw-medium" id="theme-detail-<?php echo $_smarty_tpl->getValue('theme')['value'];?>
-lbl"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('detail');?>
: <?php echo $_smarty_tpl->getValue('theme')['value'];?>
</div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('close');?>
"></button>
                        </div>
                        <div class="modal-body">
                            <?php if ($_smarty_tpl->getValue('theme')['allowed_preview']) {?>
                            <div class="mb-3 d-flex align-items-center justify-content-<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('in_array')($_smarty_tpl->getValue('theme')['value'],$_smarty_tpl->getValue('ARRAY_ALLOW_PREVIEW'),true) ? 'between' : 'end';?>
 gap-2">
                                <div class="preview-label<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('in_array')($_smarty_tpl->getValue('theme')['value'],$_smarty_tpl->getValue('ARRAY_ALLOW_PREVIEW'),true) ? '' : ' d-none';?>
"><?php echo $_smarty_tpl->getValue('LANG')->getModule('preview_theme_link');?>
:</div>
                                <button type="button" class="btn btn-primary" data-toggle="previewtheme" data-value="<?php echo $_smarty_tpl->getValue('theme')['value'];?>
"><i class="fa-solid fa-spinner fa-spin-pulse d-none"></i> <span><?php echo $_smarty_tpl->getValue('LANG')->getModule($_smarty_tpl->getSmarty()->getModifierCallback('in_array')($_smarty_tpl->getValue('theme')['value'],$_smarty_tpl->getValue('ARRAY_ALLOW_PREVIEW'),true) ? 'preview_theme_off' : 'preview_theme_on');?>
</span></button>
                            </div>
                            <div class="preview-link mb-3<?php if (!$_smarty_tpl->getSmarty()->getModifierCallback('in_array')($_smarty_tpl->getValue('theme')['value'],$_smarty_tpl->getValue('ARRAY_ALLOW_PREVIEW'),true)) {?> d-none<?php }?>">
                                <div class="input-group">
                                    <input type="text" class="form-control selectedfocus" value="<?php echo $_smarty_tpl->getValue('theme')['link_preview'];?>
" name="preview_link" id="preview_link_<?php echo $_smarty_tpl->getValue('theme')['value'];?>
">
                                    <button type="button" class="btn btn-secondary preview-link-btn" data-clipboard-target="#preview_link_<?php echo $_smarty_tpl->getValue('theme')['value'];?>
" data-success="<?php echo $_smarty_tpl->getValue('LANG')->getModule('preview_theme_link_copied');?>
" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('copy');?>
"><i class="fa-solid fa-copy"></i></button>
                                </div>
                            </div>
                            <?php }?>
                            <div class="text-center mb-3">
                                <img alt="<?php echo $_smarty_tpl->getValue('theme')['name'];?>
" class="img-fluid" src="<?php echo (defined('NV_BASE_SITEURL') ? constant('NV_BASE_SITEURL') : null);?>
themes/<?php echo $_smarty_tpl->getValue('theme')['value'];?>
/<?php echo $_smarty_tpl->getValue('theme')['thumbnail'];?>
"/>
                            </div>
                            <div class="fw-medium fs-1"><?php echo $_smarty_tpl->getValue('theme')['name'];?>
</div>
                            <p class="author"><?php echo $_smarty_tpl->getValue('LANG')->getModule('theme_created_by');?>
: <a href="<?php echo $_smarty_tpl->getValue('theme')['website'];?>
" title="<?php echo $_smarty_tpl->getValue('LANG')->getModule('theme_created_website');?>
" target="_blank"><strong><?php echo $_smarty_tpl->getValue('theme')['author'];?>
</strong></a></p>
                            <p class="tinfo"><?php echo $_smarty_tpl->getValue('theme')['description'];?>
</p>
                            <p class="tdir"><?php echo $_smarty_tpl->getValue('LANG')->getModule('theme_created_folder');?>
 <code>/themes/<?php echo $_smarty_tpl->getValue('theme')['value'];?>
/</code></p>
                            <p class="tpos"><?php echo $_smarty_tpl->getValue('LANG')->getModule('theme_created_position');?>
 <code><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('join')($_smarty_tpl->getValue('theme')['pos'],"</code>, <code>");?>
</code></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
</div>
<?php }
}
