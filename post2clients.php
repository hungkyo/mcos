<?php
session_start();
#
# load our bootstrap
# but wait... dafuq is a bootstrap?
$scanResults = scandir("lib");
foreach (glob("lib/*.php") AS $file) {
	include_once $file;
}
include "config.php";
include "functions.php";
$mysql = getModel('DB');
$mysql->connect($config['db_host'], $config['db_user'], $config['db_pass'], $config['db_name']);

include 'modules/Servers/serverModel.php';
include 'modules/Domains/domainModel.php';

$domain = getModel('domain');
$domainCollection = $domain->addFilter(array('active' => 1))
	->addOrder('posts', 'ASC')
	->setCurPage(1)
	->setPageSize(1)
	->load();
$domain = $domainCollection[0];
$domainName = $domain->getData('name');
$post = getModel('post');
$postCollection = $post->addFilter(array('posted' => 0))
	->setCurPage(1)
	->setPageSize(20)
	->load();
foreach($postCollection AS $post){
	$data[] = array(
		'title' => $post->getData('title'),
		'content' => $post->getData('content'),
		'tag' => explode(',',$post->getData('tag')),
		'cat' => explode(',',$post->getData('cat')),
	);
}

$data = serialize($data);
$data = gzencode($data);
$data = base64_encode($data);

$x = get_curl('http://'.$domainName.'/postapi.php',array(
	'mpost' => true,
	'mpostfield' => array(
		'data' => $data,
		'pingnow' => 1,
	),
));

var_dump($x);