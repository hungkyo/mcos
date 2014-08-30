<?php
session_start();
#
# load our bootstrap
# but wait... dafuq is a bootstrap?
$scanResults = scandir("lib");
for($i=2;$i<count($scanResults);$i++) {
	$scanResult = "lib/{$scanResults[$i]}";
	include_once $scanResult;
}
include "config.php";
include "functions.php";
$mysql = getModel('DB');
$mysql->connect($config['db_host'],$config['db_user'],$config['db_pass'],$config['db_name']);

include 'modules/Servers/serverModel.php';
$install = getModel('installWP');
$server = getModel('server');
$server->load(1);
$install->setData('server',$server);
$install->setData('domain','test.localhost.com');
$install->connectDB()
->connectFTP()
->mkDB()
->dumpDB()
->mkTempDir()
->mkConfFile()
->uploadClient()
->uploadConfFile();
//var_dump($install);
