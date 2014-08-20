<?php
require "dbconnect.php";
$config['db_host']	= 'localhost';
$config['db_name'] 	= 'mcos';
$config['db_user']	= 'root';
$config['db_pass']	= '1';

$mysql = new mysql;
$mysql->connect($config['db_host'],$config['db_user'],$config['db_pass'],$config['db_name']);
?>
