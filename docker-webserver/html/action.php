<?php
$db = require_once('./db.php');

switch($_POST['action']){
  case "add":
    $sql = ("INSERT INTO todo (task) VALUES (?)");
    $db->prepare($sql)->execute([ $_POST["task"] ]);
    break;
  case 'complate':
    $sql = "UPDATE todo SET complate = NOT complate WHERE id=?";
    $db->prepare($sql)->execute([ $_POST["id"] ]);
    break;
  case 'delete':
    $sql = "DELETE FROM todo WHERE id=?";
    $db->prepare($sql)->execute([ $_POST["id"] ]);
    break;
}

header("Location: /");
