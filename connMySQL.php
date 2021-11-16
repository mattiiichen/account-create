<?php

$db_host = '127.0.0.1';
$db_userName = 'root';
$db_password = ''; 
$db_name = 'test';

$db_link = @mysqli_connect($db_host, $db_userName, $db_password, $db_name);
if (!$db_link) {
    die('db connection fail!');
} else {
   echo 'db connection successfully';
}

mysqli_query($db_link, "SET NAMES 'utf8'");  

?>