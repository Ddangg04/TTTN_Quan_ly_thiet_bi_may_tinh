<?php
/* Smarty version 5.4.3, created on 2026-02-01 18:59:15
  from 'file:checkupdate.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f40133f8e54_57221010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c404d562216e7495fdff7210f8ed3a678243637' => 
    array (
      0 => 'checkupdate.tpl',
      1 => 1769321929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f40133f8e54_57221010 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\webtools';
?><div id="updIf">
    <div id="sysUpd" class="d-none">
    </div>
    <div id="extUpd" class="d-none"></div>
    <div id="upLoader" class="d-none">
        <div class="card mb-3">
            <div class="card-body text-center fa-3x">
                <i class="fa-solid fa-spinner fa-spin-pulse"></i>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end" data-bs-scroll="false" data-bs-backdrop="true" tabindex="-1" id="offcanvasUpExtDetail" aria-labelledby="offcanvasUpExtDetailLabel">
    <div class="offcanvas-header">
        <div class="offcanvas-title fs-5 fw-medium" id="offcanvasUpExtDetailLabel"></div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('close');?>
"></button>
    </div>
    <div class="offcanvas-body"></div>
</div>
<?php }
}
