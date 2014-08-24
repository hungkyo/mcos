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
$coreSession = getModel("Core_Session_Message");
if($redirectURL = $coreSession->getRedirect()){
	header("Location: $redirectURL");
	exit;
}
$mysql = new mysql;
$mysql->connect($config['db_host'],$config['db_user'],$config['db_pass'],$config['db_name']);

# check login status
if($_SESSION['login_'] <> 'yes'){
//	header("Location: login.php");
//	die();
}
if($_POST['submit']){
	$sessionUser = getModel("Core_Session_User");
	$sessionUser->login($_POST['user'],$_POST['pass']);
	exit;
}
# we are ok now, lets include the skin.
include "skin/login.php";