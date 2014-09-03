<?php
session_start();
#
# load our bootstrap
# but wait... dafuq is a bootstrap?
$thisDir = dirname(__FILE__). '/';
define('thisDir',$thisDir);
foreach (glob(thisDir."lib/*.php") AS $file) {
	include_once $file;
}
include $thisDir."config.php";
include $thisDir."functions.php";
$mysql = getModel('DB');
$mysql->connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

include $thisDir.'modules/Servers/serverModel.php';
include $thisDir.'modules/Domains/domainModel.php';

$domain = getModel('domain');
$domains = $domain
	->getAll()
	->load();

foreach ($domains AS $domain) {
	$server = getModel('server')->load($domain->getData('server'));
	$install = getModel('installWP');
	$install->setData('domain', $domain->getData('name'));
	$install->setData('server', $server);
	$install->connectDB()
//		->connectFTP()
//		->mkDB()
//		->addZone()
//		->makeZoneFile();
		//->dumpDB()
//		->mkTempDir('origin/replacehtaccess')
//		->mkConfFile()
//		->uploadClient()
		->cleanUp();
//		->uploadConfFile();
//	$domain->setData('installed', 1)
//		->save();
	echo $domain->getData('name')."\r\n";
}
