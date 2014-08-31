<?php
session_start();
#
# load our bootstrap
# but wait... dafuq is a bootstrap?
$scanResults = scandir("lib");
for ($i = 2; $i < count($scanResults); $i++) {
	$scanResult = "lib/{$scanResults[$i]}";
	include_once $scanResult;
}
include "config.php";
include "functions.php";
$mysql = getModel('DB');
$mysql->connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

include 'modules/Servers/serverModel.php';
include 'modules/Domains/domainModel.php';

$domain = getModel('domain');
$domains = $domain->addFilter(array('active' => 1))
	->addFilter(array('installed' => 0))
	->addOrder('posts', 'ASC')
	->getAll()
	->load();

foreach ($domains AS $domain) {
	var_dump($domain->getData('name'));
	var_dump($domain->getData('server'));
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
}
