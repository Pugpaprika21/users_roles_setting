<?php

enum Status: string
{
    const IS_ACTIVE = "is_active";
}

/**
 * @param mysqli|null $mysqli
 * @param integer $userId
 * @return array|null
 */
function find_group_user(?mysqli $mysqli, int $userId): ?array {
    try {
        $stmt = "
            SELECT COUNT(1) AS has_group 
            FROM users_group_setting 
            WHERE group_id IN(1, 2) 
                AND active = ? 
                AND user_id = ?
        ";

        $user = $mysqli->execute_query($stmt, [Status::IS_ACTIVE, $userId])->fetch_assoc();
        return $user;
    } catch (Throwable $th) {
      error_log($th->getMessage());
      exit;
    }
}
