<?php

/**
 * NukeViet Content Management System
 * @version 5.x
 */

if (!defined('NV_ADMIN')) {
    exit('Stop!!!');
}

// Menu admin của module
$submenu['main'] = $nv_Lang->getModule('dashboard');
$submenu['categories'] = $nv_Lang->getModule('categories_manager');
$submenu['brands'] = $nv_Lang->getModule('brands_manager');
$submenu['devices'] = $nv_Lang->getModule('devices_manager');
$submenu['config'] = $nv_Lang->getGlobal('mod_config');