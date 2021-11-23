<?php

echo "HOSTNAME: ".gethostname()."\n";


$host = $_ENV["DB_HOST"];
$db   = $_ENV["DB_NAME"];
$user = $_ENV["DB_USER"];
$pass = $_ENV["DB_PASSWORD"];

$dsn = "mysql:host=$host;dbname=$db";


$db = new PDO($dsn, $user, $pass);

$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling

echo "Creating table...";
$db->exec("
CREATE TABLE IF NOT EXISTS `testtable_users` (
  `id` int(11) KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NULL
); ");
echo " done\n";

echo "Inserting data...";
$query = ("INSERT INTO testtable_users (name) VALUES (?)");
$db->prepare($query)->execute(["David"]);
$db->prepare($query)->execute(["John"]);
$db->prepare($query)->execute(["Nick"]);
$db->prepare($query)->execute(["Annie"]);
echo " done\n";

echo "Reading data...\n";
$query = "SELECT * FROM `testtable_users`";
foreach ($db->query($query) as $key => $row) {
  echo $row['id']."\t";
  echo $row['name']."\n";
}
echo " done\n";

echo "Deleting table...";
$db->exec("DROP TABLE `testtable_users`;");
echo " done\n";
