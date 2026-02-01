<?php
/* Smarty version 5.4.3, created on 2026-02-01 17:06:37
  from 'file:sampledata.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f25adb65c12_31301288',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf7fcab5fe93ac7d24da5a2837868787bcb15668' => 
    array (
      0 => 'sampledata.tpl',
      1 => 1769321928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f25adb65c12_31301288 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\database';
?><div class="alert alert-info" role="alert"><?php echo $_smarty_tpl->getValue('LANG')->getModule('sampledata_note');?>
</div>
<div class="row g-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header fs-5 fw-medium">
                <?php echo $_smarty_tpl->getValue('LANG')->getModule('sampledata_creat');?>

            </div>
            <div class="card-body" id="sampledataarea" data-errsys="<?php echo $_smarty_tpl->getValue('LANG')->getModule('sampledata_error_sys');?>
" data-init="<?php echo $_smarty_tpl->getValue('LANG')->getModule('sampledata_dat_init');?>
">
                <form method="post">
                    <input type="hidden" name="delifexists" value="0">
                    <div class="row mb-3">
                        <label class="col-12 col-sm-4 col-form-label text-sm-end" for="element_sample_name"><?php echo $_smarty_tpl->getValue('LANG')->getModule('sampledata_name');?>
 <span class="text-danger">(*)</span></label>
                        <div class="col-12 col-sm-8">
                            <input type="text" name="sample_name" id="element_sample_name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-4">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-play" data-icon="fa-play"></i> <?php echo $_smarty_tpl->getValue('LANG')->getModule('sampledata_start');?>
</button>
                        </div>
                    </div>
                </form>
                <div id="spdresult" class="d-none pt-3">
                    <div id="spdresulttop" class="d-none"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header fs-5 fw-medium">
                <?php echo $_smarty_tpl->getValue('LANG')->getModule('sampledata_list');?>

            </div>
            <?php if (!( !$_smarty_tpl->hasVariable('DATA') || empty($_smarty_tpl->getValue('DATA')))) {?>
            <div class="card-body p-0 pb-1">
                <ul class="list-group list-group-flush">
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('DATA'), 'row');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('row')->value) {
$foreach0DoElse = false;
?>
                    <li class="list-group-item">
                        <div class="row g-2">
                            <div class="col-6 fw-medium text-break"><?php echo $_smarty_tpl->getValue('row')['title'];?>
</div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-2"><?php echo $_smarty_tpl->getValue('row')['creattime'];?>
</div>
                                    <div>
                                        <a href="#" data-toggle="sampDel" data-sname="<?php echo $_smarty_tpl->getValue('row')['title'];?>
" data-checkss="<?php echo $_smarty_tpl->getValue('row')['checkss'];?>
" class="text-danger" data-bs-toggle="tooltip" data-bs-title="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('delete');?>
" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('delete');?>
" data-bs-trigger="hover"><i class="fa-solid fa-trash" data-icon="fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </ul>
            </div>
            <?php } else { ?>
            <div class="card-body">
                <div class="alert alert-info mb-0" role="alert"><?php echo $_smarty_tpl->getValue('LANG')->getModule('sampledata_empty');?>
</div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<?php }
}
