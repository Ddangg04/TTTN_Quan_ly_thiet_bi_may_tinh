<?php
/* Smarty version 5.4.3, created on 2026-02-01 17:42:06
  from 'file:main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f2dfe7c27b8_09368948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba563411bdc77022a2906174635ef520ee2e3349' => 
    array (
      0 => 'main.tpl',
      1 => 1769321932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f2dfe7c27b8_09368948 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\default\\modules\\contact\\smarty';
$_smarty_tpl->getSmarty()->getRuntime('TplFunction')->registerTplFunctions($_smarty_tpl, array (
  'contact_list' => 
  array (
    'compiled_filepath' => 'C:\\xampp\\htdocs\\nukeviet\\data\\cache\\smarty-compile\\ba563411bdc77022a2906174635ef520ee2e3349_0.file_main.tpl.php',
    'uid' => 'ba563411bdc77022a2906174635ef520ee2e3349',
    'call_name' => 'smarty_template_function_contact_list_2028469796697f2dfe0ab761_62564477',
  ),
));
?>

<h1 class="hidden"><?php echo $_smarty_tpl->getValue('THEME_PAGE_TITLE');?>
</h1>
<div class="margin-bottom"><span class="h1"><strong><?php echo $_smarty_tpl->getValue('PAGE_TITLE');?>
</strong></span></div>

<?php if (!( !$_smarty_tpl->hasVariable('BODYTEXT') || empty($_smarty_tpl->getValue('BODYTEXT')))) {?>
<p class="margin-bottom"><?php echo $_smarty_tpl->getValue('BODYTEXT');?>
</p>
<?php }?>

<div class="row">
    <div class="col-sm-12 col-md-15">
<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('DEPARTMENTS'), 'dep');
$foreach9DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('dep')->value) {
$foreach9DoElse = false;
?>
        <div class="panel panel-default">
<?php if ($_smarty_tpl->getValue('IS_HOME')) {?>
            <a href="<?php echo $_smarty_tpl->getValue('dep')['url'];?>
" class="panel-heading" style="display:flex;align-items:center">
                <h2 class="pannel-title" style="flex-grow: 1"><?php echo $_smarty_tpl->getValue('dep')['full_name'];?>
</h2>
                <small class="text-dark"><?php echo $_smarty_tpl->getValue('LANG')->getModule('details');?>
 <i class="fa fa-arrow-right fa-fw"></i></small>
            </a>
<?php } else { ?>
            <div class="panel-heading">
                <h2 class="pannel-title"><?php echo $_smarty_tpl->getValue('LANG')->getModule('contact_info');?>
</h2>
            </div>
<?php }?>
            <ul class="list-group">
<?php if (!( !true || empty($_smarty_tpl->getValue('dep')['image']))) {?>
                <li class="list-group-item">
                    <img src="<?php echo $_smarty_tpl->getValue('dep')['image'];?>
" class="img-thumbnail" alt="<?php echo $_smarty_tpl->getValue('dep')['full_name'];?>
" />
                </li>
<?php }
if (!( !true || empty($_smarty_tpl->getValue('dep')['note']))) {?>
                <li class="list-group-item"><?php echo $_smarty_tpl->getValue('dep')['note'];?>
</li>
<?php }
if (!( !true || empty($_smarty_tpl->getValue('dep')['address']))) {?>
                <li class="list-group-item">
                    <em class="fa fa-map-marker fa-horizon margin-right"></em><?php echo $_smarty_tpl->getValue('LANG')->getModule('address');?>
: <span><?php echo $_smarty_tpl->getValue('dep')['address'];?>
</span>
                </li>
<?php }
$_smarty_tpl->getSmarty()->getRuntime('TplFunction')->callTemplateFunction($_smarty_tpl, 'contact_list', array('data'=>$_smarty_tpl->getValue('dep')['cd'],'is_li'=>true), true);?>

            </ul>
        </div>
<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </div>

    <div class="col-sm-12 col-md-9">
<?php if (!( !$_smarty_tpl->hasVariable('SUPPORTERS') || empty($_smarty_tpl->getValue('SUPPORTERS')))) {?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3><?php echo $_smarty_tpl->getValue('LANG')->getModule('supporters');?>
</h3>
            </div>
            <ul class="list-group">
<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('SUPPORTERS'), 'supporter');
$foreach10DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('supporter')->value) {
$foreach10DoElse = false;
?>
                <li class="list-group-item">
                    <div style="display:flex">
                        <div><img src="<?php echo $_smarty_tpl->getValue('supporter')['image'];?>
" class="supporter-avatar" alt="" /></div>
                        <div style="flex-grow: 1">
                            <p><strong><?php echo $_smarty_tpl->getValue('supporter')['full_name'];?>
</strong></p>
                            <?php $_smarty_tpl->getSmarty()->getRuntime('TplFunction')->callTemplateFunction($_smarty_tpl, 'contact_list', array('data'=>$_smarty_tpl->getValue('supporter')['cd'],'is_li'=>false), true);?>

                        </div>
                    </div>
                </li>
<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
<?php }?>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('feedback');?>
</h3>
            </div>
            <div class="panel-body text-center">
                <p class="margin-bottom-lg"><?php echo $_smarty_tpl->getValue('LANG')->getModule('feedback_form_note');?>
</p>
                <button class="btn btn-primary btn-lg show-feedback-form"><?php echo $_smarty_tpl->getValue('LANG')->getModule('feedback_form');?>
</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="feedback-form" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="modal-title"><?php echo $_smarty_tpl->getValue('LANG')->getModule('feedback_form');?>
</div>
            </div>
            <div method="post" class="modal-body">
                <div class="loadContactForm"><?php echo $_smarty_tpl->getValue('FORM');?>
</div>
            </div>
        </div>
    </div>
</div>
<?php }
/* smarty_template_function_contact_list_2028469796697f2dfe0ab761_62564477 */
if (!function_exists('smarty_template_function_contact_list_2028469796697f2dfe0ab761_62564477')) {
function smarty_template_function_contact_list_2028469796697f2dfe0ab761_62564477(\Smarty\Template $_smarty_tpl,$params) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\default\\modules\\contact\\smarty';
$params = array_merge(array('name'=>'contact_list','is_li'=>true), $params);
foreach ($params as $key => $value) {
$_smarty_tpl->assign($key, $value);
}
?>

<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('data'), 'cd');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cd')->value) {
$foreach2DoElse = false;
?>
        <?php if ($_smarty_tpl->getValue('is_li')) {?><li class="list-group-item"><?php } else { ?><p><?php }
if ($_smarty_tpl->getValue('cd')['type'] == 'phone') {?><em class="fa fa-phone fa-horizon margin-right"></em><?php echo $_smarty_tpl->getValue('LANG')->getModule('phone');?>
:<span><?php $_smarty_tpl->assign('i', 0, false, NULL);
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cd')['value'], 'num');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('num')->value) {
$foreach3DoElse = false;
$_smarty_tpl->assign('i', $_smarty_tpl->getValue('i')+1, false, NULL);
if ($_smarty_tpl->getValue('i') > 1) {?>, <?php }
if ((true && (true && null !== ($_smarty_tpl->getValue('num')[1] ?? null)))) {?><a href="tel:<?php echo $_smarty_tpl->getValue('num')[1];?>
"><?php echo $_smarty_tpl->getValue('num')[0];?>
</a><?php } else {
echo $_smarty_tpl->getValue('num')[0];
}
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?></span><?php } elseif ($_smarty_tpl->getValue('cd')['type'] == 'fax') {?><em class="fa fa-print fa-horizon margin-right"></em><span class="me-2"><?php echo $_smarty_tpl->getValue('LANG')->getModule('fax');?>
:</span><span><?php echo $_smarty_tpl->getValue('cd')['value'];?>
</span><?php } elseif ($_smarty_tpl->getValue('cd')['type'] == 'email') {?><em class="fa fa-envelope-o fa-horizon margin-right"></em><span class="me-2"><?php echo $_smarty_tpl->getValue('LANG')->getModule('email');?>
:</span><span><?php $_smarty_tpl->assign('i', 0, false, NULL);
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cd')['value'], 'email');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('email')->value) {
$foreach4DoElse = false;
$_smarty_tpl->assign('i', $_smarty_tpl->getValue('i')+1, false, NULL);
if ($_smarty_tpl->getValue('i') > 1) {?>, <?php }?><a href="mailto:<?php echo $_smarty_tpl->getSmarty()->getModifierCallback('escape')($_smarty_tpl->getValue('email'), "hex");?>
"><?php echo $_smarty_tpl->getSmarty()->getModifierCallback('escape')($_smarty_tpl->getValue('email'), "hexentity");?>
</a><?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?></span><?php } elseif ($_smarty_tpl->getValue('cd')['type'] == 'skype') {?><em class="fa fa-skype fa-horizon margin-right"></em><span class="me-2">Skype:</span><span><?php $_smarty_tpl->assign('i', 0, false, NULL);
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cd')['value'], 'skype');
$foreach5DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('skype')->value) {
$foreach5DoElse = false;
$_smarty_tpl->assign('i', $_smarty_tpl->getValue('i')+1, false, NULL);
if ($_smarty_tpl->getValue('i') > 1) {?>, <?php }?><a href="skype:<?php echo $_smarty_tpl->getValue('skype');?>
?call"><?php echo $_smarty_tpl->getValue('skype');?>
</a><?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?></span><?php } elseif ($_smarty_tpl->getValue('cd')['type'] == 'viber') {?><em class="icon-viber fa-horizon margin-right"></em><span class="me-2">Viber:</span><span><?php $_smarty_tpl->assign('i', 0, false, NULL);
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cd')['value'], 'viber');
$foreach6DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('viber')->value) {
$foreach6DoElse = false;
$_smarty_tpl->assign('i', $_smarty_tpl->getValue('i')+1, false, NULL);
if ($_smarty_tpl->getValue('i') > 1) {?>, <?php }?><a href="viber://pa?chatURI=<?php echo $_smarty_tpl->getValue('viber');?>
?call"><?php echo $_smarty_tpl->getValue('viber');?>
</a><?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?></span><?php } elseif ($_smarty_tpl->getValue('cd')['type'] == 'whatsapp') {?><em class="fa fa-whatsapp fa-horizon margin-right"></em><span class="me-2">WhatsApp:</span><span><?php $_smarty_tpl->assign('i', 0, false, NULL);
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cd')['value'], 'whatsapp');
$foreach7DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('whatsapp')->value) {
$foreach7DoElse = false;
$_smarty_tpl->assign('i', $_smarty_tpl->getValue('i')+1, false, NULL);
if ($_smarty_tpl->getValue('i') > 1) {?>, <?php }?><a href="https://wa.me/<?php echo $_smarty_tpl->getValue('whatsapp');?>
"><?php echo $_smarty_tpl->getValue('whatsapp');?>
</a><?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?></span><?php } elseif ($_smarty_tpl->getValue('cd')['type'] == 'zalo') {?><em class="icon-zalo fa-horizon margin-right"></em><span class="me-2">Zalo:</span><span><?php $_smarty_tpl->assign('i', 0, false, NULL);
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cd')['value'], 'zalo');
$foreach8DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('zalo')->value) {
$foreach8DoElse = false;
$_smarty_tpl->assign('i', $_smarty_tpl->getValue('i')+1, false, NULL);
if ($_smarty_tpl->getValue('i') > 1) {?>, <?php }?><a href="https://zalo.me/<?php echo $_smarty_tpl->getValue('zalo');?>
"><?php echo $_smarty_tpl->getValue('zalo');?>
</a><?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?></span><?php } else { ?><span><?php echo $_smarty_tpl->getValue('cd')['type'];?>
:</span><span><?php if ($_smarty_tpl->getValue('cd')['value']['is_url']) {?><a href="<?php echo $_smarty_tpl->getValue('cd')['value']['content'];?>
"><?php echo $_smarty_tpl->getValue('cd')['value']['content'];?>
</a><?php } else {
echo $_smarty_tpl->getValue('cd')['value']['content'];
}?></span><?php }
if ($_smarty_tpl->getValue('is_li')) {?></li><?php } else { ?></p><?php }
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
}}
/*/ smarty_template_function_contact_list_2028469796697f2dfe0ab761_62564477 */
}
