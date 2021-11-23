<?php

$host = $_ENV["DB_HOST"];
$db   = $_ENV["DB_NAME"];
$user = $_ENV["DB_USER"];
$pass = $_ENV["DB_PASSWORD"];

$dsn = "mysql:host=$host;dbname=$db";


$db = new PDO($dsn, $user, $pass);
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

return $db;
