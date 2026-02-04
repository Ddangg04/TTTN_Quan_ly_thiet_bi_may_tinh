<?php
/* Smarty version 5.4.3, created on 2026-02-03 20:49:47
  from 'file:content.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_6981fcfb4be7e6_72362550',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb72e3dbd51dfb3ba0fab024342c877c1fc9568d' => 
    array (
      0 => 'content.tpl',
      1 => 1769321928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6981fcfb4be7e6_72362550 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\page';
?><form id="form-page-content" method="post" action="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('OP');
if (!( !$_smarty_tpl->hasVariable('ID') || empty($_smarty_tpl->getValue('ID')))) {?>&amp;id=<?php echo $_smarty_tpl->getValue('ID');
}?>" novalidate class="ajax-submit">
    <div class="row g-3">
        <div class="col-lg-8 col-xxl-9">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="idtitle" class="form-label"><?php echo $_smarty_tpl->getValue('LANG')->getModule('title');?>
 <span class="text-danger">(*)</span>:</label>
                        <div class="position-relative">
                            <input type="text" class="form-control required" id="idtitle" name="title" value="<?php echo $_smarty_tpl->getValue('DATA')['title'];?>
" maxlength="250">
                            <div class="invalid-tooltip"><?php echo $_smarty_tpl->getValue('LANG')->getModule('empty_title');?>
</div>
                        </div>
                        <div class="form-text"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('length_characters');?>
: <span id="titlelength" class="fw-bold text-danger">0</span>. <?php echo $_smarty_tpl->getValue('LANG')->getGlobal('title_suggest_max');?>
.</div>
                    </div>
                    <div class="mb-3">
                        <label for="idalias" class="form-label"><?php echo $_smarty_tpl->getValue('LANG')->getModule('alias');?>
:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="idalias" name="alias" value="<?php echo $_smarty_tpl->getValue('DATA')['alias'];?>
" maxlength="250">
                            <button class="btn btn-secondary" type="button" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getModule('alias');?>
" data-toggle="getaliaspage" data-auto-alias="<?php echo ( !true || empty($_smarty_tpl->getValue('DATA')['alias'])) ? '1' : '0';?>
" data-checkss="<?php echo $_smarty_tpl->getValue('CHECKSS');?>
" data-id="<?php echo $_smarty_tpl->getValue('ID');?>
" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-title="<?php echo $_smarty_tpl->getValue('LANG')->getModule('alias');?>
"><i class="fa-solid fa-rotate"></i></button>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-7">
                            <div class="mb-3">
                                <label for="image" class="form-label"><?php echo $_smarty_tpl->getValue('LANG')->getModule('image');?>
:</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="image" id="image" value="<?php echo $_smarty_tpl->getValue('DATA')['image'];?>
">
                                    <button type="button" class="btn btn-secondary" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('browse_image');?>
" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-title="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('browse_image');?>
" data-toggle="selectfile" data-target="image" data-path="<?php echo $_smarty_tpl->getValue('UPLOADS_DIR_USER');?>
" data-type="image" data-alt="imagealt"><i class="fa-solid fa-file-image"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="imageposition" class="form-label"><?php echo $_smarty_tpl->getValue('LANG')->getModule('imgposition');?>
:</label>
                                <select class="form-select" name="imageposition" id="imageposition">
                                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('ARRAY_IMGPOSITION'), 'value', false, 'key');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('value')->value) {
$foreach0DoElse = false;
?>
                                    <option value="<?php echo $_smarty_tpl->getValue('key');?>
"<?php if ($_smarty_tpl->getValue('key') == $_smarty_tpl->getValue('DATA')['imageposition']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('value');?>
</option>
                                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="imagealt" class="form-label"><?php echo $_smarty_tpl->getValue('LANG')->getModule('imagealt');?>
:</label>
                        <input type="text" class="form-control" id="imagealt" name="imagealt" value="<?php echo $_smarty_tpl->getValue('DATA')['imagealt'];?>
">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label"><?php echo $_smarty_tpl->getValue('LANG')->getModule('description');?>
:</label>
                        <textarea class="form-control" id="description" name="description" rows="5"><?php echo $_smarty_tpl->getValue('DATA')['description'];?>
</textarea>
                        <div class="form-text"><?php echo $_smarty_tpl->getValue('LANG')->getGlobal('length_characters');?>
: <span id="descriptionlength" class="fw-bold text-danger">0</span>. <?php echo $_smarty_tpl->getValue('LANG')->getGlobal('description_suggest_max');?>
.</div>
                    </div>
                    <div class="mb-0">
                        <label for="<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
_bodytext" class="form-label"><?php echo $_smarty_tpl->getValue('LANG')->getModule('bodytext');?>
 <span class="text-danger">(*)</span>:</label>
                        <div class="position-relative">
                            <div data-toggle="container-bodytext">
                                <?php echo $_smarty_tpl->getValue('DATA')['bodytext'];?>

                            </div>
                            <div class="invalid-tooltip"><?php echo $_smarty_tpl->getValue('LANG')->getModule('empty_bodytext');?>
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xxl-3">
            <div class="card mb-3">
                <div class="card-header fw-medium fs-5">
                    <?php echo $_smarty_tpl->getValue('LANG')->getModule('group_post');?>

                </div>
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="hot_post" value="1" id="hot_post"<?php if (!( !true || empty($_smarty_tpl->getValue('DATA')['hot_post']))) {?> checked<?php }?>>
                        <label class="form-check-label" for="hot_post"><?php echo $_smarty_tpl->getValue('LANG')->getModule('hot_post');?>
</label>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header fw-medium fs-5">
                    <?php echo $_smarty_tpl->getValue('LANG')->getModule('keywords');?>

                </div>
                <div class="card-body">
                    <input type="text" class="form-control" name="keywords" id="keywords" value="<?php echo $_smarty_tpl->getValue('DATA')['keywords'];?>
">
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header fw-medium fs-5">
                    <?php echo $_smarty_tpl->getValue('LANG')->getModule('socialbutton');?>

                </div>
                <div class="card-body">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="socialbutton" value="1" id="socialbutton"<?php if (!( !true || empty($_smarty_tpl->getValue('DATA')['socialbutton']))) {?> checked<?php }?>>
                        <label class="form-check-label" for="socialbutton"><?php echo $_smarty_tpl->getValue('LANG')->getModule('socialbuttonnote');?>
</label>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header fw-medium fs-5">
                    <?php echo $_smarty_tpl->getValue('LANG')->getModule('layout_func');?>

                </div>
                <div class="card-body">
                    <select name="layout_func" id="layout_func" class="form-select">
                        <option value=""><?php echo $_smarty_tpl->getValue('LANG')->getModule('layout_default');?>
</option>
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('LAYOUT_ARRAY'), 'layout');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('layout')->value) {
$foreach1DoElse = false;
?>
                        <option value="<?php echo $_smarty_tpl->getValue('layout');?>
"<?php if ($_smarty_tpl->getValue('layout') == $_smarty_tpl->getValue('DATA')['layout_func']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('layout');?>
</option>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </select>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header fw-medium fs-5">
                    <?php echo $_smarty_tpl->getValue('LANG')->getModule('activecomm');?>

                </div>
                <div class="card-body">
                    <div class="position-relative maxh-250 overflow-hidden" data-nv-toggle="scroll">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('GROUPS_LIST'), 'value', false, 'key');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('value')->value) {
$foreach2DoElse = false;
?>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" value="<?php echo $_smarty_tpl->getValue('key');?>
" name="activecomm[]" id="activecomm_<?php echo $_smarty_tpl->getValue('key');?>
"<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')($_smarty_tpl->getValue('key'),$_smarty_tpl->getValue('ACTIVECOMM'))) {?> checked<?php }?>>
                            <label class="form-check-label" for="activecomm_<?php echo $_smarty_tpl->getValue('key');?>
"><?php echo $_smarty_tpl->getValue('value');?>
</label>
                        </div>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header fw-medium fs-5">
                    <?php echo $_smarty_tpl->getValue('LANG')->getModule('schema_type');?>

                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <select class="form-select" name="schema_type" id="content_schema_type">
                            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('SCHEMA_TYPES'), 'value', false, 'key');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('value')->value) {
$foreach3DoElse = false;
?>
                            <option value="<?php echo $_smarty_tpl->getValue('key');?>
"<?php if ($_smarty_tpl->getValue('key') == $_smarty_tpl->getValue('DATA')['schema_type']) {?> selected<?php }?>><?php echo $_smarty_tpl->getValue('value');?>
</option>
                            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                    <div class="mb-0<?php if ($_smarty_tpl->getValue('DATA')['schema_type'] != 'webpage') {?> d-none<?php }?>" id="schema_about_container">
                        <label for="schema_about" class="form-label"><?php echo $_smarty_tpl->getValue('LANG')->getModule('schema_about');?>
:</label>
                        <input class="form-control" type="text" value="<?php echo $_smarty_tpl->getValue('DATA')['schema_about'];?>
" name="schema_about" id="schema_about" maxlength="50">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="1" name="save">
    <input type="hidden" value="<?php echo $_smarty_tpl->getValue('ISCOPY');?>
" name="copy">
    <input type="hidden" name="checkss" value="<?php echo $_smarty_tpl->getValue('CHECKSS');?>
">
    <div class="hstack gap-2 flex-wrap justify-content-center mt-3">
        <button class="btn btn-primary" type="submit"><?php echo $_smarty_tpl->getValue('LANG')->getModule('save');?>
</button>
    </div>
</form>
<?php }
}
