<?php
header('Content-type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/6/14
 * Time: 12:39 AM
 */
include_once "lib/Core_Resource_Model.php";
include_once "lib/DB.php";
include_once "lib/post.php";
include_once "modules/Domains/domainModel.php";
include_once "config.php";

$mysql = getModel('DB');
$mysql->connect($config['db_host'],$config['db_user'],$config['db_pass'],$config['db_name']);

$you = $_GET['you'];
$domain = getModel('domain')->load($you,'name');
$youId = $domain->getId();
$domains = getModel('domain')
	->addFilter('entity_id > '.$youId)
	->addSelect('name')
	->addFilter('active = 1')
	->addFilter('installed = 1')
	->setCurPage(1)
	->setPageSize(1)
	->addOrder('entity_id','ASC')
	->load();
if(count($domains) < 1){
	$domains = getModel('domain')
		->addSelect('name')
		->addFilter('active = 1')
		->addFilter('installed = 1')
		->setCurPage(1)
		->setPageSize(1)
		->addOrder('entity_id','ASC')
		->load();
}
if(count($domains)){
	$domain = $domains[0];
?>
<a href="http://<?php echo $domain->getData('name')?>/" rel="dofollow"><?php echo $domain->getData('name')?></a>
<?php
}