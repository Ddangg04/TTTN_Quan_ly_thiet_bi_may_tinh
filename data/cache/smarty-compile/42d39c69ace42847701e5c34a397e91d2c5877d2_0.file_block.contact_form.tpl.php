<?php
/* Smarty version 5.4.3, created on 2026-02-01 20:29:13
  from 'file:block.contact_form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f55291ac820_60809986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42d39c69ace42847701e5c34a397e91d2c5877d2' => 
    array (
      0 => 'block.contact_form.tpl',
      1 => 1769321932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f55291ac820_60809986 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\default\\modules\\contact\\smarty';
?><link rel="StyleSheet" href="<?php echo $_smarty_tpl->getValue('CSS');?>
">
<!-- START FORFOOTER -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('JS');?>
"><?php echo '</script'; ?>
>
<div id="contactButton" class="box-shadow">
    <button type="button" class="ctb btn btn-primary btn-sm" data-module="<?php echo $_smarty_tpl->getValue('MODULE');?>
"><em class="fa fa-pencil-square-o"></em><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('feedback');?>
</button>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <button type="button" class="close">&times;</button>
            <?php echo $_smarty_tpl->getValue('LANG')->getGlobal('feedback');?>

        </div>
        <div class="panel-body" data-cs="<?php echo (defined('NV_CHECK_SESSION') ? constant('NV_CHECK_SESSION') : null);?>
"></div>
    </div>
</div>
<!-- END FORFOOTER -->
<?php }
}
