<?php
session_start();
#
# load our bootstrap
# but wait... dafuq is a bootstrap?
$thisDir = dirname(__FILE__). '/';
foreach (glob($thisDir."lib/*.php") AS $file) {
	include_once $file;
}

include $thisDir."config.php";
include $thisDir."functions.php";
$mysql = getModel('DB');
$mysql->connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

include $thisDir.'modules/Servers/serverModel.php';
include $thisDir.'modules/Domains/domainModel.php';

$domain = getModel('domain');
$domainCollection = $domain->addFilter(array('active' => 1))
	->addFilter(array('installed' => 1))
	->addFilter('posts < 20000')
	->addOrder('posts', 'ASC')
	->setCurPage(1)
	->setPageSize(1)
	->load();
var_dump($domainCollection);
$domain = $domainCollection[0];
$domainName = $domain->getData('name');
$post = getModel('post');
$postCollection = $post->addFilter(array('posted' => 0))
	->setCurPage(1)
	->setPageSize(35)
	->load();
foreach ($postCollection AS $post) {
	$data[] = array(
		'title' => $post->getData('title'),
		'content' => $post->getData('content'),
		'tag' => explode(',', $post->getData('tag')),
		'cat' => explode(',', $post->getData('cat')),
	);
	$post->setData('posted', 1)
		->save();
}

$data = serialize($data);
$data = gzencode($data);
$data = base64_encode($data);

$x = get_curl('http://' . $domainName . '/postapi.php', array(
	'mpost' => true,
	'mpostfield' => array(
		'data' => $data,
		'pingnow' => 1,
	),
));

$curPost = $domain->getData('posts');
$domain->setData('posts', $curPost + count($postCollection))
	->save();