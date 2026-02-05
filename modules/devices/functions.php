<?php
/**
 * NukeViet Content Management System
 * @version 5.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2025 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 */

if (!defined('NV_MAINFILE')) {
    exit('Stop!!!');
}

define('NV_IS_MOD_DEVICES', true);

require_once NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php';

$array_op = [
    'main',
    'category',
    'detail',
    'search',
    'brands',
    'images',
    'devices'
];