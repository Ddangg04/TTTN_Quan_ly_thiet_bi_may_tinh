<?php
/* Smarty version 5.4.3, created on 2026-02-01 06:59:49
  from 'file:widget_cmttotal.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697e9775922981_08554781',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '77a9bb8b5548f6272ee34405322377504c5a8e89' => 
    array (
      0 => 'widget_cmttotal.tpl',
      1 => 1769321928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697e9775922981_08554781 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\comment';
?><div class="card-body flex-grow-1 flex-shrink-1">
    <div class="d-flex justify-content-between">
        <div>
            <h5 class="card-title"><?php echo $_smarty_tpl->getValue('LANG')->getModule('siteinfo_total_comments');?>
</h5>
            <div class="fs-2 fw-semibold">
                <?php echo $_smarty_tpl->getValue('NUM');?>

            </div>
        </div>
        <div>
            <div class="couter-icon">
                <span class="bg-info-subtle rounded-circle fs-2">
                    <i class="fa-regular fa-comments text-info"></i>
                </span>
            </div>
        </div>
    </div>
</div>
<?php }
}
