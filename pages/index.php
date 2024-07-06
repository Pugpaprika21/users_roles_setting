<?php

include_once __DIR__ . "../../configs/includes.php";

// $users = $db->seleteAll("SELECT * FROM users");

// dd($users);

//$user = $db->seleteRow("SELECT * FROM users WHERE id = ?", [1]);

// $id = $db->save("users", [
//     'username' => 'john_doe',
//     'email' => 'john@example.com',
//     'password_hash' => password_hash('password123', PASSWORD_BCRYPT),
//     'first_name' => 'John',
//     'last_name' => 'Doe',
//     'date_of_birth' => '1990-01-01',
//     'address' => '123 Main St',
//     'phone_number' => '1234567890'
// ]);


// $fields = [
//     'username' => 'john_doe',
//     'email' => 'john@example.com',
//     'password_hash' => password_hash('password123', PASSWORD_BCRYPT),
//     'first_name' => 'John',
//     'last_name' => 'Doe',
//     'date_of_birth' => '1990-01-01',
//     'address' => '123 Main St',
//     'phone_number' => '1234567890'
// ];

// $where = [
//     'id' => 1
// ];

// $rowsUpdated = $db->update('users', $fields, $where);

// $db->delete("users", "id = '1'");

$users = $db->save("users_group", [
    'group_name' => "ผู้อำนวยการ",
]);

dd($users);


