<?php
/* Smarty version 5.4.3, created on 2026-02-01 17:05:38
  from 'file:tables.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_697f2572d18ed4_34261005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14854d7aaf6fb34cc75920ae36be72b8966128e3' => 
    array (
      0 => 'tables.tpl',
      1 => 1769321928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_697f2572d18ed4_34261005 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\nukeviet\\themes\\admin_future\\modules\\database';
?><div class="card bg-body-tertiary">
    <div class="card-header fs-5 fw-medium">
        <?php echo $_smarty_tpl->getValue('LANG')->getModule('tables_info',$_smarty_tpl->getValue('DBNAME'));?>

    </div>
    <div class="card-body">
        <div class="table-responsive-xl table-card">
            <table class="table table-striped align-middle table-sticky table-db-sticky mb-0">
                <thead class="text-muted">
                    <tr>
                        <th class="text-nowrap" style="width: 1%;">
                            <input type="checkbox" data-toggle="checkAll" class="form-check-input m-0 align-middle" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('toggle_checkall');?>
">
                        </th>
                        <th class="text-nowrap" style="width: 19%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('table_name');?>
</th>
                        <th class="text-nowrap" style="width: 8.57%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('table_size');?>
</th>
                        <th class="text-nowrap" style="width: 8.57%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('table_max_size');?>
</th>
                        <th class="text-nowrap" style="width: 8.57%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('table_datafree');?>
</th>
                        <th class="text-nowrap" style="width: 8.57%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('table_numrow');?>
</th>
                        <th class="text-nowrap" style="width: 8.57%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('table_charset');?>
</th>
                        <th class="text-nowrap" style="width: 8.57%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('table_type');?>
</th>
                        <th class="text-nowrap" style="width: 8.57%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('table_auto_increment');?>
</th>
                        <th class="text-nowrap" style="width: 10%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('table_create_time');?>
</th>
                        <th class="text-nowrap" style="width: 10%;"><?php echo $_smarty_tpl->getValue('LANG')->getModule('table_update_time');?>
</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('TABLES'), 'table', false, 'key');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('key')->value => $_smarty_tpl->getVariable('table')->value) {
$foreach0DoElse = false;
?>
                    <tr>
                        <td>
                            <input type="checkbox" data-toggle="checkSingle" value="<?php echo $_smarty_tpl->getValue('key');?>
" class="form-check-input m-0 align-middle" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('toggle_checksingle');?>
">
                        </td>
                        <td class="text-break">
                            <a href="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
&amp;tab=<?php echo $_smarty_tpl->getValue('key');?>
"><?php echo $_smarty_tpl->getValue('key');?>
</a>
                        </td>
                        <td><?php echo $_smarty_tpl->getValue('table')['table_size'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('table')['table_max_size'] ?: 'n/a';?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('table')['table_datafree'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('table')['table_numrow'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('table')['table_charset'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('table')['table_type'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('table')['table_auto_increment'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('table')['table_create_time'];?>
</td>
                        <td><?php echo $_smarty_tpl->getValue('table')['table_update_time'];?>
</td>
                    </tr>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                    <tr>
                        <td>
                            <input type="checkbox" data-toggle="checkAll" class="form-check-input m-0 align-middle" aria-label="<?php echo $_smarty_tpl->getValue('LANG')->getGlobal('toggle_checkall');?>
">
                        </td>
                        <td colspan="10">
                            <span class="text-primary fw-medium"><?php echo $_smarty_tpl->getValue('LANG')->getModule('third',$_smarty_tpl->getValue('DB_TABLES_COUNT'),$_smarty_tpl->getValue('DB_SIZE'),$_smarty_tpl->getValue('DB_TOTALFREE'));?>
</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer border-top">
        <form method="post" action="<?php echo (defined('NV_BASE_ADMINURL') ? constant('NV_BASE_ADMINURL') : null);?>
index.php?<?php echo (defined('NV_LANG_VARIABLE') ? constant('NV_LANG_VARIABLE') : null);?>
=<?php echo (defined('NV_LANG_DATA') ? constant('NV_LANG_DATA') : null);?>
&amp;<?php echo (defined('NV_NAME_VARIABLE') ? constant('NV_NAME_VARIABLE') : null);?>
=<?php echo $_smarty_tpl->getValue('MODULE_NAME');?>
" data-toggle="formDbTbls">
            <div class="row g-2">
                <div class="col-6 col-lg-3 col-xl-2">
                    <select class="form-select" name="<?php echo (defined('NV_OP_VARIABLE') ? constant('NV_OP_VARIABLE') : null);?>
" data-toggle="acOp">
                        <option value="download"><?php echo $_smarty_tpl->getValue('LANG')->getModule('download');?>
</option>
                        <option value="savefile"><?php echo $_smarty_tpl->getValue('LANG')->getModule('savefile');?>
</option>
                        <option value="optimize"><?php echo $_smarty_tpl->getValue('LANG')->getModule('optimize');?>
</option>
                    </select>
                </div>
                <div class="col-6 col-lg-3 col-xl-2">
                    <select class="form-select" name="type" data-toggle="acType">
                        <option value="all"><?php echo $_smarty_tpl->getValue('LANG')->getModule('download_all');?>
</option>
                        <option value="str"><?php echo $_smarty_tpl->getValue('LANG')->getModule('download_str');?>
</option>
                    </select>
                </div>
                <div class="col-6 col-lg-3 col-xl-2">
                    <select class="form-select" name="ext" data-toggle="acExt">
                        <option value="sql"><?php echo $_smarty_tpl->getValue('LANG')->getModule('ext_sql');?>
</option>
                        <option value="gz"><?php echo $_smarty_tpl->getValue('LANG')->getModule('ext_gz');?>
</option>
                    </select>
                </div>
                <div class="col-6 col-lg-3 col-xl-6">
                    <input type="hidden" name="checkss" value="<?php echo (defined('NV_CHECK_SESSION') ? constant('NV_CHECK_SESSION') : null);?>
">
                    <button data-toggle="actionDbTbls" type="submit" class="btn btn-primary"><i class="fa-solid fa-play" data-icon="fa-play"></i> <?php echo $_smarty_tpl->getValue('LANG')->getModule('submit');?>
</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php }
}
