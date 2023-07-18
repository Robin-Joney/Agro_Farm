<?php

$host = 'localhost:3308';
$mysql_username = 'root';
$mysql_password = '';
$mysql_db = 'agro';
// connect to database
$conn = mysqli_connect($host, $mysql_username, $mysql_password);
mysqli_select_db($conn, $mysql_db);

?>