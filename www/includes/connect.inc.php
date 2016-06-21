<?php
session_start();
$mysql_host ="localhost";
$mysql_user ="root";
$mysql_pass ="";
$mysql_db ="movielist";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
if(!mysql_connect($mysql_host, $mysql_user, $mysql_pass)||!mysql_select_db($mysql_db))
{

    die('E01 ERROR with the database');
}

?>
