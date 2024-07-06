<?php

include_once __DIR__ . "../../classes/di/Container.php";

$container = new Container();

$container->set("configs", function () {
    return [
        "db" => [
            "driver" => "mysql",
            "host" => "localhost",
            "username" => "root",
            "password" => "",
            "name" => "users_roles_setting_db",
        ],
    ];
});

$container->set("db", function () {
    try {
        $configs = $this->get("configs");

        $mysqli = new mysqli(
            $configs["db"]["host"],
            $configs["db"]["username"],
            $configs["db"]["password"],
            $configs["db"]["name"]
        );

        if ($mysqli->connect_error) {
            throw new Exception("connection failed: " . $mysqli->connect_error);
        }

        return $mysqli;
    } catch (Exception $e) {
        exit($e->getMessage());
    }
});