<?php

/**
 * @Project NUKEVIET 5.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2025 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Description Xử lý xóa và thay đổi trạng thái thiết bị
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

global $db, $db_config, $lang, $module_data, $module_upload;

$id = $nv_Request->get_int('id', 'post', 0);
$listid = $nv_Request->get_string('listid', 'post,get', '');
$checkss = $nv_Request->get_string('checkss', 'post,get', '');
$action = $nv_Request->get_title('action', 'get', '');
$contents = 'NO_' . $id;

if (($action == 'active' || $action == 'deactive') && $listid != '' && NV_CHECK_SESSION == $checkss) {
    $array_id = array_map('intval', explode(',', $listid));
    $array_id = array_filter($array_id);

    if (!empty($array_id)) {
        $new_status = ($action == 'active') ? 1 : 0;
        $action_text = ($action == 'active') ? 'Kích hoạt' : 'Ngưng bán';
        $ids_str = implode(',', $array_id);

        $artitle = [];
        $result = $db->query("SELECT title FROM " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices WHERE id IN (" . $ids_str . ")");
        while ($row = $result->fetch()) {
            $artitle[] = $row['title'];
        }

        $db->query("UPDATE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_devices SET status = " . $new_status . " WHERE id IN (" . $ids_str . ")");
        $success_count = count($artitle);

        if ($success_count > 0) {
            nv_insert_logs(NV_LANG_DATA, $module_name, $action_text . ' thiết bị', implode(', ', $artitle), $admin_info['userid']);
            $nv_Cache->delMod($module_name);
            $_SESSION['bulk_result'] = sprintf("Đã %s thành công %d thiết bị", strtolower($action_text), $success_count);
        }
    }

    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
}

if ($listid != '' and NV_CHECK_SESSION == $checkss and $nv_Request->isset_request('listid', 'post')) {
    $del_array = array_map('intval', explode(',', $listid));
    $success_count = 0;
    $error_count = 0;
    $artitle = [];

    foreach ($del_array as $device_id) {
        if ($device_id <= 0) {
            continue;
        }

        $device = getDeviceById($device_id);
        if (!empty($device)) {
            if (deleteDevice($device_id)) {
                $artitle[] = $device['title'];
                $success_count++;
            } else {
                $error_count++;
            }
        }
    }

    if ($success_count > 0) {
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Xóa thiết bị', implode(', ', $artitle), $admin_info['userid']);
        $nv_Cache->delMod($module_name);
        echo 'OK_Đã xóa thành công ' . $success_count . ' thiết bị';
    } else {
        echo 'ERR_Không thể xóa';
    }
    exit();
}

if ($id > 0 and md5($id . NV_CHECK_SESSION) == $checkss) {
    $device = getDeviceById($id);

    if (empty($device)) {
        echo "ERR_Thiết bị không tồn tại";
        exit();
    }

    if (deleteDevice($id)) {
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Xóa thiết bị', $device['title'], $admin_info['userid']);
        $nv_Cache->delMod($module_name);
        echo "OK_Xóa thành công";
    } else {
        echo "ERR_Không thể xóa thiết bị";
    }
    exit();
}

nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
