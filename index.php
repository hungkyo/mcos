<?
include "config.php";
include "functions.php";
session_start();
if($_SESSION['login_'] <> 'yes'){
//	header("Location: login.php");
//	die();
}
# scan for modules
$menus = array();
$modules = array();
$scanResults = scandir("modules/");
foreach($scanResults AS $scanResult) {
	if (is_dir($scanResult)){
		if (file_exists($scanResult.'/menu.php')){
			include_once $scanResult.'/menu.php';
			$menus = array_merge($menus,$menu);
		}
		if(file_exists($scanResult."/".$scanResult.'.php')){
			$modules[$scanResult] = array(
				"name" => $scanResult,
				"file" => $scanResult.'/'.$scanResult.'.php',
			);
		}
	}
}

#catch the current module
$curModule = $modules[$_GET['module']];
$curAction = $_GET['action'];

# we are ok now, lets include the skin.

include "skin/index.php";