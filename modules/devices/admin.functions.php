<?php

/**
 * NukeViet Content Management System
 * @version 5.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2025 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN')) {
    exit('Stop!!!');
}

define('NV_IS_FILE_ADMIN', true);

if (!isset($GLOBALS['lang'])) {
    $GLOBALS['lang'] = NV_LANG_DATA;
}

require_once NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php';

$allow_func=[
    'main',
    'detail',
    'search',
    'category',
    'brand',
    'category/content',
    'category/add',
    'category/edit',
    'category/delete',
    'brands/content',
    'brands/add',
    'brands/edit',
    'brands/delete',
    'devices/content',
    'devices/add',
    'devices/edit',
    'devices/delete',
    'images/content',
    'images/add',
    'images/edit',
    'images/delete'
];
/**S
 * Xây dựng cây danh mục đệ quy
 */
function nv_show_cat_list($parentid, &$array_cat_list, $lev = 0)
{
    global $db, $module_data;
    
    $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . '_device_categories 
            WHERE parent_id=' . (int) $parentid . ' 
            ORDER BY weight ASC, id ASC';
    $result = $db->query($sql);
    
    while ($row = $result->fetch()) {
        $row['lev'] = $lev;
        $array_cat_list[$row['id']] = $row;
        nv_show_cat_list($row['id'], $array_cat_list, $lev + 1);
    }
}

/**
 * Kiểm tra vòng lặp parent_id
 */
function nv_check_category_loop($cat_id, $new_parent_id)
{
    global $db, $module_data;
    
    if ($new_parent_id == 0) {
        return false;
    }
    
    if ($new_parent_id == $cat_id) {
        return true;
    }
    
    $parent = $new_parent_id;
    $depth = 0;
    
    while ($parent > 0 && $depth < 10) {
        if ($parent == $cat_id) {
            return true;
        }
        
        $sql = 'SELECT parent_id FROM ' . NV_PREFIXLANG . '_' . $module_data . '_device_categories WHERE id=' . (int) $parent;
        $parent = $db->query($sql)->fetchColumn();
        $depth++;
    }
    
    return false;
}

/**
 * Fix weight danh mục
 */
function nv_fix_cat_weight($parentid = 0)
{
    global $db, $module_data;
    
    $sql = 'SELECT id FROM ' . NV_PREFIXLANG . '_' . $module_data . '_device_categories 
            WHERE parent_id=' . (int) $parentid . ' ORDER BY weight ASC';
    $result = $db->query($sql);
    
    $weight = 0;
    while ($row = $result->fetch()) {
        $weight++;
        $db->query('UPDATE ' . NV_PREFIXLANG . '_' . $module_data . '_device_categories 
                    SET weight=' . $weight . ' WHERE id=' . $row['id']);
    }
}