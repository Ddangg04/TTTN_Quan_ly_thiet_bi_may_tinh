<?php
/* Smarty version 5.4.3, created on 2026-02-03 20:49:51
  from 'file:upload_queue_item.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_6981fcff5312a4_75151956',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb02b2d1101c194bc0486ca5389552fd30185d84' => 
    array (
      0 => 'upload_queue_item.tpl',
      1 => 1769321929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6981fcff5312a4_75151956 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\upload';
?><div class="queue-files-item" data-toggle="qitem" data-id="">
    <div class="queue-col-name" data-toggle="qitem-name"></div>
    <div class="queue-col-alt">
        <div<?php if ($_smarty_tpl->getValue('UPLOAD_ALT_REQUIRE') == 'true') {?> class="form-control-required"<?php }?>>
            <input name="queue_item_alt" data-toggle="qitem-alt" class="form-control form-control-sm" type="text" value="" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getModule('altimage');?>
">
        </div>
    </div>
    <div class="queue-col-size" data-toggle="qitem-size"></div>
    <div class="queue-col-status" data-toggle="qitem-status">0%</div>
    <div class="queue-col-tool" data-toggle="qitem-actions">
        <a href="#" class="link-danger" data-toggle="qitem-del" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getModule('upload_delfile');?>
" title="<?php echo $_smarty_tpl->getValue('LANG')->getModule('upload_delfile');?>
"><i class="fa-solid fa-ban"></i></a>
        <i data-toggle="qitem-uploading" class="d-none fa-solid fa-spinner fa-spin-pulse text-primary"></i>
        <i data-toggle="qitem-success" class="d-none fa-solid fa-circle-check text-success"></i>
        <i data-toggle="qitem-error" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-title="error" title="error" class="d-none fa-solid fa-triangle-exclamation text-danger"></i>
    </div>
</div>
<?php }
}
