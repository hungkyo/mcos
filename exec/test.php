<?php
$st = microtime(true);
	include "FTP.php";
	$ftp = new FTP();
	$ftp->setData('host','104.131.234.12')
		->setData('user','ftpaccount')
		->setData('pass','Hungkyoho@1')
//		->setData('initPath','test.localhost.com')
		->connect();
	$ftp->uploadDir('/var/www/wp3.9.1','dafuqlol');
var_dump(microtime(true)-$st);