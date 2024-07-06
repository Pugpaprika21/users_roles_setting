<?php

include_once __DIR__ . "../../configs/container.php";
include_once __DIR__ . "../../utils/functions.php";
include_once __DIR__ . "../../classes/querys/DB.php";

$conn = $container->get("db");

$db = new DB($conn);