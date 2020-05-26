<?php
$dsn = "mysql:host=127.0.0.1;dbname=stylfjhq_PPE";
$username = "stylfjhq";
$password = "QyaEb2F6VSJemd";
 
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
);
?>