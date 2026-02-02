<?php
if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN'))
    die('Stop!!!');

define('NV_IS_DEVICES_ADMIN', true);
$allow_func=[
    'main',
    'detail',
    'search',
    'category',
];
