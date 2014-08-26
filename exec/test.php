<?php
	include "FTP.php";
	$ftp = new FTP();
	$ftp->setData('host','sanphamtot.vn')
		->setData('user','sanphamtot')
		->setData('pass','hung123')
		->setData('initPath','public_html')
		->connect();
