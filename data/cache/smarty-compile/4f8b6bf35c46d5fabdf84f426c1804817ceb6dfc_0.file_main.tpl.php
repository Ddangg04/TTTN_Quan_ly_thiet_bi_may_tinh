<?php
/* Smarty version 5.4.3, created on 2026-02-01 17:05:38
  from 'file:main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f257246aad7_79486347',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f8b6bf35c46d5fabdf84f426c1804817ceb6dfc' => 
    array (
      0 => 'main.tpl',
      1 => 1769321928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f257246aad7_79486347 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\database';
?><div class="card bg-body-tertiary mb-4">
    <div class="card-header fs-5 fw-medium">
        <?php echo $_smarty_tpl->getValue('LANG')->getModule('database_info',$_smarty_tpl->getValue('DB')['db_dbname']);?>

    </div>
    <div class="card-body p-0 pb-1">
        <ul class="list-group list-group-flush">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('DB'), 'value', false, 'key');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('value')->value) {
$foreach0DoElse = false;
?>
            <li class="list-group-item">
                <div class="row g-2">
                    <div class="col-5 fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule($_smarty_tpl->getValue('key'));?>
</div>
                    <div class="col-7"><?php echo $_smarty_tpl->getValue('value');?>
</div>
                </div>
            </li>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    </div>
</div>
<div id="show_db_tables">
    <div class="text-center">
        <i class="fa-solid fa-2x fa-spinner fa-spin-pulse"></i>
        <div><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('wait_page_load');?>
</div>
    </div>
</div>
<?php }
}
