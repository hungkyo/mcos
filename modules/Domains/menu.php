<?php
	$menu = array(
		'module' => 'Domains',
		'link' => 'index.php?module=Domains',
		'text' => 'Domains',
		'action' => 'index',
		'order' => 2,
		'sub_links' => array(
			'create' => array(
				 'link' => 'index.php?module=Domains&action=create',
				 'text' => 'Add a new Domain!',
				 'action' => 'create',
			 ),
		),
	);
?>