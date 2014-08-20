<?php
	$menu = array(
		'module' => 'Servers',
		'link' => 'index.php?module=Servers',
		'text' => 'Servers',
		'action' => 'index',
		'sub_links' => array(
			'create' => array(
				 'link' => 'index.php?module=Servers&action=create',
				 'text' => 'Add a new Server!',
				 'action' => 'create',
			 ),
		),
	);
?>