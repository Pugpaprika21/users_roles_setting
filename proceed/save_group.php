<?php

include_once __DIR__ . "../../configs/includes.php";

if (!empty($_POST["action"]) && $_POST["action"] == "set_groups") {
    $userId = $_POST["user_id"];
    if (!empty($_POST["user_groups"]["in_group"])) {
        foreach ($_POST["user_groups"]["in_group"] as $groupId) {
            $db->save("users_group_setting", ["group_id" => $groupId, "user_id" => $userId]);
        }
    } 
    
    if (!empty($_POST["user_groups"]["not_in_group"])) {
        foreach ($_POST["user_groups"]["not_in_group"] as $groupId) {
            $db->delete("users_group_setting", "group_id = '{$groupId}' AND user_id = '{$userId}'");
        }
    }

    $db->close();
    echo json_encode([
        "status_bool" => true,
        "self_url" => "../pages/setting_group.php?user_id={$userId}"
    ]);
    exit;
}