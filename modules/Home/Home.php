<?php
	$moduleConfig = array(
		"name" => "Dashboard", // Actually we don't need this
		"controller" => array(
			"index" => dirname(__FILE__)."/".'indexAction.php',
		),
		"model" => array(
			/** This module has no model at all,
			 * Lets create a resource model in the next module!
			 */
		),
	);