<?php
/* Smarty version 5.4.3, created on 2026-02-01 06:59:48
  from 'file:widget_arttotal.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697e97748ca0c7_59610761',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cffa3665c7cda62c0d987bf9dff3b4ca5fb4cb8' => 
    array (
      0 => 'widget_arttotal.tpl',
      1 => 1769321928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697e97748ca0c7_59610761 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\news';
?><div class="card-body flex-grow-1 flex-shrink-1">
    <div class="d-flex justify-content-between">
        <div>
            <h5 class="card-title"><?php echo $_smarty_tpl->getValue('LANG')->getModule('siteinfo_totalpost');?>
</h5>
            <div class="fs-2 fw-semibold">
                <?php echo $_smarty_tpl->getValue('NUM');?>

            </div>
        </div>
        <div>
            <div class="couter-icon">
                <span class="bg-info-subtle rounded-circle fs-2">
                    <i class="fa-regular fa-newspaper text-info"></i>
                </span>
            </div>
        </div>
    </div>
</div>
<?php }
}
