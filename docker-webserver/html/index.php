<?php

$db = require_once("./db.php");

$db->exec("
CREATE TABLE IF NOT EXISTS `todo` (
  `id` int(11) KEY NOT NULL AUTO_INCREMENT,
  `task` varchar(255) NULL,
  `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `complate` BOOLEAN DEFAULT FALSE) ");

$sql_getTodo = "SELECT * FROM `todo`";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Todo list</title>
    <style media="screen">
      .complate{
        text-decoration: line-through;
      }
    </style>
  </head>
  <body>
    <h1>Todo list</h1>
    <form class="" action="action.php" method="post">
      <input type="hidden" name="action" value="add">
      <input type="text" name="task" value="">
      <input type="submit" name="" value="ADD">
    </form>
    <?php foreach($db->query($sql_getTodo) as $todo): ?>
    <div>
      <label>
        <input type="checkbox" onchange="onaction('complate', <?=$todo["id"]?>)" <?=$todo["complate"] ? "checked" : "" ?> name="complate">
        <span class="<?=$todo["complate"]? "complate" : "" ?>"><?=$todo["task"]?></span>
      </label>
      <button type="button" onclick="onaction('delete', <?=$todo["id"]?>)">Del</button>
    </div>
    <?php endforeach; ?>
    <form class="" id="actionForm" action="action.php" method="post">
      <input type="hidden" id="index" name="id" value="">
      <input type="hidden" id="action" name="action" value="">
    </form>
    <script type="text/javascript">
      function onaction(action, id){
        document.querySelector('#action').value = action
        document.querySelector('#index').value = id
        document.querySelector('#actionForm').submit()
      }
    </script>
  </body>
</html>
