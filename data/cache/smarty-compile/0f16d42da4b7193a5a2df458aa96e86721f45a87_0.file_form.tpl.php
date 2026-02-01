<?php
/* Smarty version 5.4.3, created on 2026-02-01 17:42:05
  from 'file:form.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f2dfd78bfc1_13076675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f16d42da4b7193a5a2df458aa96e86721f45a87' => 
    array (
      0 => 'form.tpl',
      1 => 1769321932,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f2dfd78bfc1_13076675 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\default\\modules\\contact\\smarty';
?><div class="nv-fullbg">
    <form method="post" action="<?php echo $_smarty_tpl->getValue('ACTION_FILE');?>
" data-toggle="feedback" data-precheck="feedback_precheck" novalidate<?php if ($_smarty_tpl->getValue('CAPTCHA') == 'captcha') {?> data-captcha="fcode"<?php } elseif ($_smarty_tpl->getValue('CAPTCHA') == 'recaptcha') {?> data-recaptcha2="1"<?php } elseif ($_smarty_tpl->getValue('CAPTCHA') == 'recaptcha3') {?> data-recaptcha3="1"<?php } elseif ($_smarty_tpl->getValue('CAPTCHA') == 'turnstile') {?> data-turnstile="1"<?php }?>>
<?php if (!( !$_smarty_tpl->hasVariable('CATS') || empty($_smarty_tpl->getValue('CATS')))) {
$_smarty_tpl->assign('count', $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('CATS')), false, NULL);?>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><em class="fa fa-folder-open fa-lg fa-fw"></em></span>
                <select class="form-control" name="fcat">
                    <option value=""><?php echo $_smarty_tpl->getValue('LANG')->getModule('selectCat');?>
</option>
<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('CATS'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
if ($_smarty_tpl->getValue('count') > 1) {?>
                    <optgroup label="<?php echo $_smarty_tpl->getValue('cat')['name'];?>
">
<?php }
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cat')['items'], 'item');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('item')->value) {
$foreach1DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('item')['val'];?>
">
                            <?php echo $_smarty_tpl->getValue('item')['name'];?>

                        </option>
<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);
if ($_smarty_tpl->getValue('count') > 1) {?>
                    </optgroup>
<?php }
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </select>
            </div>
        </div>
<?php }?>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><em class="fa fa-file-text fa-lg fa-fw"></em></span>
                <input type="text" maxlength="255" class="form-control required" value="" name="ftitle" placeholder="<?php echo $_smarty_tpl->getValue('LANG')->getModule('title');?>
" data-pattern="/^(.){3,}$/" data-toggle="fb_validErrorHidden" data-mess="<?php echo $_smarty_tpl->getValue('LANG')->getModule('error_title');?>
" />
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><em class="fa fa-user fa-lg fa-fw"></em></span>
                <input type="text" maxlength="100"<?php if ((defined('NV_IS_USER') ? constant('NV_IS_USER') : null)) {?> value="<?php echo $_smarty_tpl->getValue('CONTENT')['fname'];?>
"<?php } else { ?> value=""<?php }?> name="fname" class="form-control required<?php if ((defined('NV_IS_USER') ? constant('NV_IS_USER') : null)) {?> disabled<?php }?>"<?php if ((defined('NV_IS_USER') ? constant('NV_IS_USER') : null)) {?> disabled="disabled"<?php }?> placeholder="<?php echo $_smarty_tpl->getValue('LANG')->getModule('fullname');?>
" data-toggle="fb_validErrorHidden" data-mess="<?php echo $_smarty_tpl->getValue('LANG')->getModule('error_fullname');?>
" data-callback="nv_uname_check" />
                <?php if (!(defined('NV_IS_USER') ? constant('NV_IS_USER') : null)) {?><span class="input-group-addon pointer" title="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('loginsubmit');?>
" data-toggle="loginForm"><em class="fa fa-sign-in fa-lg"></em></span><?php }?>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><em class="fa fa-envelope fa-lg fa-fw"></em></span>
                <input type="email" maxlength="60"<?php if ((defined('NV_IS_USER') ? constant('NV_IS_USER') : null)) {?> value="<?php echo $_smarty_tpl->getValue('CONTENT')['femail'];?>
"<?php } else { ?> value=""<?php }?> name="femail" class="form-control required<?php if ((defined('NV_IS_USER') ? constant('NV_IS_USER') : null)) {?> disabled<?php }?>"<?php if ((defined('NV_IS_USER') ? constant('NV_IS_USER') : null)) {?> disabled="disabled"<?php }?> placeholder="<?php echo $_smarty_tpl->getValue('LANG')->getModule('email');?>
" data-toggle="fb_validErrorHidden" data-mess="<?php echo $_smarty_tpl->getValue('LANG')->getModule('error_email');?>
" />
            </div>
        </div>
<?php if ($_smarty_tpl->getValue('FEEDBACK_PHONE')) {?>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><em class="fa fa-phone fa-lg fa-fw"></em></span>
                <input type="text" maxlength="60" value="<?php echo $_smarty_tpl->getValue('CONTENT')['fphone'];?>
" name="fphone" class="form-control<?php echo $_smarty_tpl->getValue('CONTENT')['phone_required'];?>
" placeholder="<?php echo $_smarty_tpl->getValue('LANG')->getModule('phone');?>
" data-pattern="/^(.){3,}$/" data-toggle="fb_validErrorHidden" data-mess="<?php echo $_smarty_tpl->getValue('LANG')->getModule('phone_error');?>
" />
            </div>
        </div>
<?php }
if ($_smarty_tpl->getValue('FEEDBACK_ADDRESS')) {?>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><em class="fa fa-home fa-lg fa-fw"></em></span>
                <input type="text" maxlength="60" value="<?php echo $_smarty_tpl->getValue('CONTENT')['faddress'];?>
" name="faddress" class="form-control<?php echo $_smarty_tpl->getValue('CONTENT')['address_required'];?>
" placeholder="<?php echo $_smarty_tpl->getValue('LANG')->getModule('address');?>
" data-pattern="/^(.){3,}$/" data-toggle="fb_validErrorHidden" data-mess="<?php echo $_smarty_tpl->getValue('LANG')->getModule('address_error');?>
" />
            </div>
        </div>
<?php }?>
        <div class="form-group">
            <div>
                <textarea name="fcon" class="form-control required" style="height:130px" maxlength="1000" placeholder="<?php echo $_smarty_tpl->getValue('LANG')->getModule('content');?>
" data-toggle="fb_validErrorHidden" data-mess="<?php echo $_smarty_tpl->getValue('LANG')->getModule('error_content');?>
"></textarea>
            </div>
        </div>
<?php if ($_smarty_tpl->getValue('CONTENT')['sendcopy']) {?>
        <div class="checkbox">
            <label><input type="checkbox" class="form-control" style="margin-top:2px" name="sendcopy" value="1" checked="checked" /><span><?php echo $_smarty_tpl->getValue('LANG')->getModule('sendcopy');?>
</span></label>
        </div>
<?php }
if ($_smarty_tpl->getValue('DATA_WARNING')['active'] || $_smarty_tpl->getValue('ANTISPAM_WARNING')['active']) {?>
        <div class="alert alert-info confirm" style="padding:0 10px">
<?php if ($_smarty_tpl->getValue('DATA_WARNING')['active']) {?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="form-control required" style="margin-top:2px" name="data_permission_confirm" value="1" data-mess="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('data_warning_error');?>
" data-toggle="fb_errorHidden"> <small><?php echo $_smarty_tpl->getValue('DATA_WARNING')['mess'];?>
</small>
                </label>
            </div>
<?php }?>

<?php if ($_smarty_tpl->getValue('ANTISPAM_WARNING')['active']) {?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="form-control required" style="margin-top:2px" name="antispam_confirm" value="1" data-mess="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('antispam_warning_error');?>
" data-toggle="fb_errorHidden"> <small><?php echo $_smarty_tpl->getValue('ANTISPAM_WARNING')['mess'];?>
</small>
                </label>
            </div>
<?php }?>
        </div>
<?php }?>
        <div class="text-center form-group">
            <input type="hidden" name="checkss" value="<?php echo $_smarty_tpl->getValue('CHECKSS');?>
" />
            <input type="button" value="<?php echo $_smarty_tpl->getValue('LANG')->getModule('reset');?>
" class="btn btn-default" data-toggle="fb_validReset" />
            <input type="submit" value="<?php echo $_smarty_tpl->getValue('LANG')->getModule('sendcontact');?>
" class="btn btn-primary" />
        </div>
    </form>
    <div class="contact-result alert"></div>
</div>
<?php }
}
