<?php
	$moduleConfig = array(
		"name" => "Domains", // Actually we don't need this
		"controller" => array(
			"index" => dirname(__FILE__)."/".'indexAction.php',
			"create" => dirname(__FILE__)."/".'createAction.php',
			"bulkcreate" => dirname(__FILE__)."/".'bulkcreateAction.php',
		),
		"model" => array(
			"domain" => array(
				"type" => "flat", // hmmm, flat is enough
				"tablePrefix" => "domain_",
				"file" => dirname(__FILE__)."/".'domainModel.php',
			),
		),
	);