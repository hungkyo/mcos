<?php
session_start();
#
# load our bootstrap
# but wait... dafuq is a bootstrap?
$thisDir = dirname(__FILE__). '/';
$scanResults = scandir($thisDir."lib");
for ($i = 2; $i < count($scanResults); $i++) {
	$scanResult = "lib/{$scanResults[$i]}";
	include_once $scanResult;
}
include $thisDir."config.php";
include $thisDir."functions.php";
$mysql = getModel('DB');
$mysql->connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

include $thisDir.'modules/Servers/serverModel.php';
include $thisDir.'modules/Domains/domainModel.php';

$domain = getModel('domain');
$domains = $domain->addFilter(array('active' => 1))
	->addFilter(array('installed' => 0))
	->addOrder('posts', 'ASC')
	->getAll()
	->load();

foreach ($domains AS $domain) {
	$server = getModel('server')->load($domain->getData('server'));
	$install = getModel('installWP');
	$install->setData('domain', $domain->getData('name'));
	$install->setData('server', $server);
	$install->connectDB()
		->connectFTP()
		->mkDB()
		->dumpDB()
		->mkTempDir()
		->mkConfFile()
		->uploadClient()
		->uploadConfFile();
	$domain->setData('installed', 1)
		->save();
	echo $domain->getData('name')."\r\n";
}
