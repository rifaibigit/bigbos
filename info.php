<?php
$host = "127.0.0.1";
$dbname = "";
$dbuser = "root";
$dbpass = "semangat pagi";
$opts = [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ];
$dsn = "mysql:host=$host;charset=utf8;dbname=$dbname;";
$db = new PDO($dsn, $dbuser, $dbpass, $opts);

$dbres = $db->query('SHOW DATABASES');
$res = $dbres->fetchAll();

echo "<pre>";
print_r($res);
echo "</pre>";
phpinfo();

?>
