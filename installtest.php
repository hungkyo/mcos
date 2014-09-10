<?php
session_start();
#
# load our bootstrap
# but wait... dafuq is a bootstrap?
$thisDir = dirname(__FILE__) . '/';
define('thisDir', $thisDir);
foreach (glob(thisDir . "lib/*.php") AS $file) {
	include_once $file;
}
include $thisDir . "config.php";
include $thisDir . "functions.php";
$mysql = getModel('DB');
$mysql->connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

//include $thisDir . 'modules/Servers/serverModel.php';
//include $thisDir . 'modules/Domains/domainModel.php';

/*$domain = getModel('domain');
$domain = $domain->load(53);

$server = getModel('server')->load($domain->getData('server'));
$install = getModel('installWP');
$install->setData('domain', $domain->getData('name'));
$install->setData('server', $server);
$install->connectDB()
	->connectFTP()
	->mkDB()
//		->addZone()
//		->makeZoneFile()
	->dumpDB()
	->mkTempDir()
	->mkConfFile()
	->uploadClient()->uploadConfFile()
	->cleanUp();
//	$domain->setData('installed', 1)->setData('active',1)->save();
echo $domain->getData('name') . "\r\n";*/
for($i=1;$i<=400;$i++){
	$postCollection = $post->addFilter(array('posted' => 0))
		->setCurPage($i)
		->setPageSize(50)
		->load();
	$data = array();
	foreach ($postCollection AS $post) {
		$data[] = array(
			'title' => $post->getData('title'),
			'content' => $post->getData('content'),
			'tag' => explode(',', $post->getData('tag')),
			'cat' => explode(',', $post->getData('cat')),
		);
	}
	$postfield = array();
	if(count($data)) {
		$data = serialize($data);
		$data = gzencode($data);
		$data = base64_encode($data);
		$postfield['data'] = $data;;
	}
	$x = get_curl('http://ebola.wordpress-plugins.info/postapi.php', array(
		'mpost' => true,
		'mpostfield' => $postfield,
	));
}
