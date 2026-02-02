<?php
/* Smarty version 5.4.3, created on 2026-02-01 20:29:08
  from 'file:global.copyright.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f55247784a0_79903817',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25b23979b2331be40f99f5f04ba17d60aac99823' => 
    array (
      0 => 'global.copyright.tpl',
      1 => 1769321930,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f55247784a0_79903817 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\default\\blocks\\smarty';
?><div class="copyright">
    <span>&copy;&nbsp;<?php echo $_smarty_tpl->getValue('LANG')->get('copyright_by');?>
 <a href="<?php echo $_smarty_tpl->getValue('DATA')['copyright_url'];?>
"><?php echo $_smarty_tpl->getValue('DATA')['copyright_by'];?>
</a>.&nbsp; </span>
    <span><?php echo $_smarty_tpl->getValue('LANG')->get('powered_by');?>
 <a href="https://nukeviet.vn/" target="_blank" rel="dofollow">NukeViet CMS</a>.&nbsp; </span>
<?php if (!( !true || empty($_smarty_tpl->getValue('DATA')['design_by']))) {?>
    <span><?php echo $_smarty_tpl->getValue('LANG')->get('design_by');?>
 <?php if (!( !true || empty($_smarty_tpl->getValue('DATA')['design_url']))) {?><a href="<?php echo $_smarty_tpl->getValue('DATA')['design_url'];?>
" target="_blank" rel="dofollow"><?php }
echo $_smarty_tpl->getValue('DATA')['design_by'];
if (!( !true || empty($_smarty_tpl->getValue('DATA')['design_url']))) {?></a><?php }?>.&nbsp; </span>
<?php }
if (!( !true || empty($_smarty_tpl->getValue('DATA')['siteterms_url']))) {?>
    <span>&nbsp;|&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->getValue('DATA')['siteterms_url'];?>
"><?php echo $_smarty_tpl->getValue('LANG')->get('siteterms');?>
</a></span>
<?php }
if ((defined('NV_IS_SPADMIN') ? constant('NV_IS_SPADMIN') : null)) {?>
    <span>&nbsp;|&nbsp;&nbsp;<?php echo $_smarty_tpl->getValue('LANG')->get('for_admin');?>
: [MEMORY_TIME_USAGE]</span>
<?php }?>
</div>
<?php }
}
