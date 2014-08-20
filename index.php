<?
include "config.php";
include "functions.php";
session_start();
if($_SESSION['login_'] <> 'yes'){
	header("Location: login.php");
	die();
}
