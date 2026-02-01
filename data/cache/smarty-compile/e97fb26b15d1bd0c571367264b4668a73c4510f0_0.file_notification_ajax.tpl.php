<?php
/* Smarty version 5.4.3, created on 2026-02-01 17:14:56
  from 'file:notification_ajax.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f27a0197086_88827425',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e97fb26b15d1bd0c571367264b4668a73c4510f0' => 
    array (
      0 => 'notification_ajax.tpl',
      1 => 1769321929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f27a0197086_88827425 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\siteinfo';
if (( !$_smarty_tpl->hasVariable('DATA') || empty($_smarty_tpl->getValue('DATA')))) {
if ($_smarty_tpl->getValue('LAST_ID') <= 0) {?>
<div class="pt-3 px-2 text-center">
    <?php echo $_smarty_tpl->getValue('LANG')->getModule('notification_empty');?>

</div>
<?php }
} else { ?>
<ul class="list-unstyled">
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('DATA'), 'row');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('row')->value) {
$foreach0DoElse = false;
?>
    <li class="notification border-bottom position-relative<?php if (!$_smarty_tpl->getValue('row')['view']) {?> notification-unread<?php }?>" data-id="<?php echo $_smarty_tpl->getValue('row')['id'];?>
">
        <div class="tools d-flex align-items-center">
            <a class="noti-toggle rounded-circle text-center" href="#" title="<?php if ($_smarty_tpl->getValue('row')['view']) {
echo $_smarty_tpl->getValue('LANG')->getModule('notification_make_unread');
} else {
echo $_smarty_tpl->getValue('LANG')->getModule('notification_make_read');
}?>" data-msg-read="<?php echo $_smarty_tpl->getValue('LANG')->getModule('notification_make_read');?>
" data-msg-unread="<?php echo $_smarty_tpl->getValue('LANG')->getModule('notification_make_unread');?>
">
                <?php if ($_smarty_tpl->getValue('row')['view']) {?>
                <i class="fa-solid fa-eye-slash"></i>
                <?php } else { ?>
                <i class="fa-solid fa-eye"></i>
                <?php }?>
            </a>
            <a class="noti-delete rounded-circle ms-2 text-center" href="#" title="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('delete');?>
">
                <i class="fa-solid fa-trash text-danger"></i>
            </a>
        </div>
        <a class="noti-item d-flex p-3 fw-medium" href="<?php echo $_smarty_tpl->getValue('row')['link'];?>
">
            <div class="image me-2 rounded-circle overflow-hidden flex-shrink-0">
                <?php if ($_smarty_tpl->getValue('row')['send_from_id'] > 0) {?>
                <?php if (!( !true || empty($_smarty_tpl->getValue('row')['photo']))) {?>
                <img class="d-block" src="<?php echo $_smarty_tpl->getValue('row')['photo'];?>
" alt="<?php echo $_smarty_tpl->getValue('row')['send_from'];?>
">
                <?php } else { ?>
                <span class="d-block position-relative w-100 h-100"><i class="fa-solid fa-circle-user ico-vc"></i></span>
                <?php }?>
                <?php } else { ?>
                <span class="d-block position-relative w-100 h-100"><i class="fa-solid fa-gear ico-vc"></i></span>
                <?php }?>
            </div>
            <div class="notification-info">
                <div class="text lh-sm"><span class="user-name"><?php echo $_smarty_tpl->getValue('row')['send_from'];?>
</span> <?php echo $_smarty_tpl->getValue('row')['title'];?>
</div>
                <div class="date text-uppercase mt-1 lh-1" title="<?php echo $_smarty_tpl->getValue('row')['add_time_iso'];?>
"><?php echo $_smarty_tpl->getValue('row')['add_time'];?>
</div>
            </div>
        </a>
    </li>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
</ul>
<?php }
}
}
