<?php
	$moduleConfig = array(
		"name" => "Servers", // Actually we don't need this
		"controller" => array(
			"index" => dirname(__FILE__)."/".'indexAction.php',
			"create" => dirname(__FILE__)."/".'createAction.php',
		),
		"model" => array(
			"server" => array(
				"type" => "eav", // yeah, eav!
				"tablePrefix" => "server_",
				"file" => dirname(__FILE__)."/".'serverModel.php',
			),
		),
	);