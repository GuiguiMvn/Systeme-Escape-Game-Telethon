<?php

try{
    $DB = new PDO("mysql:host=localhost;dbname=projet_telethon","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
} catch (Exception $ex) {
echo 'base de donnée en vacance';
exit();
}

?>