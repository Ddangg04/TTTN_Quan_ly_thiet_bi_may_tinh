<?php
/* Smarty version 5.4.3, created on 2026-02-01 20:16:20
  from 'file:statistics.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f52240772d8_52830682',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c28bf57e9d1954fb5a52c1351590a7839966b1f' => 
    array (
      0 => 'statistics.tpl',
      1 => 1769321929,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f52240772d8_52830682 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\webtools';
echo '<script'; ?>
 src="<?php echo (defined('ASSETS_STATIC_URL') ? constant('ASSETS_STATIC_URL') : null);?>
/js/select2/select2.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo (defined('ASSETS_STATIC_URL') ? constant('ASSETS_STATIC_URL') : null);?>
/js/select2/i18n/<?php echo (defined('NV_LANG_INTERFACE') ? constant('NV_LANG_INTERFACE') : null);?>
.js"><?php echo '</script'; ?>
>
<div class="card border-primary border-3 border-bottom-0 border-start-0 border-end-0">
    <div class="card-body pt-4">
        <form method="post" class="ajax-submit" action="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('OP');?>
" novalidate>
            <div class="row mb-3">
                <label for="element_statistics_timezone" class="col-sm-3 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('statistics_timezone');?>
</label>
                <div class="col-sm-4 col-lg-6 col-xxl-5">
                    <select class="form-select select2" id="element_statistics_timezone" name="statistics_timezone">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('TIMEZONE_ARRAY'), 'timezone');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('timezone')->value) {
$foreach0DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('timezone');?>
"<?php if ($_smarty_tpl->getValue('timezone') == $_smarty_tpl->getValue('GCONFIG')['statistics_timezone']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('timezone');?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-8 col-lg-6 col-xxl-5 offset-sm-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="online_upd" value="1"<?php if (!( !true || empty($_smarty_tpl->getValue('GCONFIG')['online_upd']))) {?> checked<?php }?> role="switch" id="element_online_upd">
                        <label class="form-check-label" for="element_online_upd"><?php echo $_smarty_tpl->getValue('LANG')->getModule('online_upd');?>
</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-8 col-lg-6 col-xxl-5 offset-sm-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="statistic" value="1"<?php if (!( !true || empty($_smarty_tpl->getValue('GCONFIG')['statistic']))) {?> checked<?php }?> role="switch" id="element_statistic">
                        <label class="form-check-label" for="element_statistic"><?php echo $_smarty_tpl->getValue('LANG')->getModule('statistic');?>
</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-8 col-lg-6 col-xxl-5 offset-sm-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="stat_excl_bot" value="1"<?php if (!( !true || empty($_smarty_tpl->getValue('GCONFIG')['stat_excl_bot']))) {?> checked<?php }?> role="switch" id="element_stat_excl_bot">
                        <label class="form-check-label" for="element_stat_excl_bot"><?php echo $_smarty_tpl->getValue('LANG')->getModule('stat_excl_bot');?>
</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-8 col-lg-6 col-xxl-5 offset-sm-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="referer_blocker" value="1"<?php if (!( !true || empty($_smarty_tpl->getValue('GCONFIG')['referer_blocker']))) {?> checked<?php }?> role="switch" id="element_referer_blocker">
                        <label class="form-check-label" for="element_referer_blocker"><?php echo $_smarty_tpl->getValue('LANG')->getModule('referer_blocker');?>
</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="element_googleAnalytics4ID" class="col-sm-3 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('googleAnalytics4ID');?>
</label>
                <div class="col-sm-8 col-lg-6 col-xxl-5">
                    <input type="text" class="form-control" id="element_googleAnalytics4ID" name="googleAnalytics4ID" value="<?php echo $_smarty_tpl->getValue('GCONFIG')['googleAnalytics4ID'];?>
" maxlength="20">
                    <div class="form-text"><?php echo $_smarty_tpl->getValue('LANG')->getModule('googleAnalytics4ID_help');?>
</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="element_googleAnalyticsID" class="col-sm-3 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('googleAnalyticsID');?>
</label>
                <div class="col-sm-8 col-lg-6 col-xxl-5">
                    <input type="text" class="form-control" id="element_googleAnalyticsID" name="googleAnalyticsID" value="<?php echo $_smarty_tpl->getValue('GCONFIG')['googleAnalyticsID'];?>
" maxlength="20">
                    <div class="form-text"><?php echo $_smarty_tpl->getValue('LANG')->getModule('googleAnalyticsID_help');?>
</div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="element_google_tag_manager" class="col-sm-3 col-form-label text-sm-end"><?php echo $_smarty_tpl->getValue('LANG')->getModule('google_tag_manager');?>
</label>
                <div class="col-sm-8 col-lg-6 col-xxl-5">
                    <input type="text" class="form-control" id="element_google_tag_manager" name="google_tag_manager" value="<?php echo $_smarty_tpl->getValue('GCONFIG')['google_tag_manager'];?>
" maxlength="20">
                    <div class="form-text"><?php echo $_smarty_tpl->getValue('LANG')->getModule('google_tag_manager_help');?>
</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-8 col-lg-6 col-xxl-5 offset-sm-3">
                    <input type="hidden" name="checkss" value="<?php echo $_smarty_tpl->getValue('CHECKSS');?>
">
                    <button type="submit" class="btn btn-primary"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('submit');?>
</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php }
}
