<?php
session_start();
# check login status
if(!$_SESSION['_login']){
	header("Location: login.php");
	die('');
}
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
$coreSession = getSingleton("Core_Session_Message");
if($redirectURL = $coreSession->getRedirect()){
	header("Location: $redirectURL");
	exit;
}
$mysql = getSingleton('DB');
$mysql->connect($config['db_host'],$config['db_user'],$config['db_pass'],$config['db_name']);

#catch the current module
$curModuleName = $_GET['module'];
$curAction = $_GET['action'];
if(!$curModuleName) $curModuleName = "Home";
if(!$curAction) $curAction = "index";

# scan for modules
$menus = array();
$menusTemp = array();
$modules = array();
$scanResults = scandir("modules");
$j = 0;
for($i=2;$i<count($scanResults);$i++) {
	$scanResult = "modules/{$scanResults[$i]}";
	if (is_dir($scanResult)){
		if (file_exists($scanResult.'/menu.php')){
			include_once $scanResult.'/menu.php';
			$menusTemp[$j] = $menu;
			$menusOrder[$j] = $menu['order'];
			if($scanResults[$i] == $curModuleName){
				$curMenu = $menu;
			}
		}
		if(file_exists("$scanResult/{$scanResults[$i]}.php")){
			include_once "{$scanResult}/{$scanResults[$i]}.php";
			$modules[$scanResults[$i]] = $moduleConfig;
		}
		$j++;
	}
}
asort($menusOrder);
foreach($menusOrder AS $j => $menuOrder){
	$menus[] = $menusTemp[$j];
}

foreach($modules AS $module){
	foreach($module['model'] AS $model){
		require_once $model['file'];
	}
}

# current module name
$curModule = $modules[$curModuleName];

# we are ok now, lets include the skin.
include "skin/index.php";