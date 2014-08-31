<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/31/14
 * Time: 5:07 PM
 */

class post extends Core_Resource_Model {
	public function __construct()
	{
		$this->_table = 'post_';
		parent::__construct();
	}
} 