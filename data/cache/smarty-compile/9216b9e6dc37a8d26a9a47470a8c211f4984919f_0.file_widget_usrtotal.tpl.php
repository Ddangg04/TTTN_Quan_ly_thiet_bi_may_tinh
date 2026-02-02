<?php
/* Smarty version 5.4.3, created on 2026-02-01 20:29:38
  from 'file:widget_usrtotal.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f5542e97844_60110340',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9216b9e6dc37a8d26a9a47470a8c211f4984919f' => 
    array (
      0 => 'widget_usrtotal.tpl',
      1 => 1769321929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f5542e97844_60110340 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\users';
?><div class="card-body flex-grow-1 flex-shrink-1">
    <div class="d-flex justify-content-between">
        <div>
            <h5 class="card-title"><?php echo $_smarty_tpl->getValue('LANG')->getModule('siteinfo_user');?>
</h5>
            <div class="fs-2 fw-semibold">
                <?php echo $_smarty_tpl->getValue('NUM');?>

            </div>
        </div>
        <div>
            <div class="couter-icon">
                <span class="bg-info-subtle rounded-circle fs-2">
                    <i class="fa-regular fa-user text-info"></i>
                </span>
            </div>
        </div>
    </div>
</div>
<?php }
}
