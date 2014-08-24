<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/24/14
 * Time: 12:17 PM
 */

class Core_User extends Core_Resource_Model{
	public function __construct(){
		$this->_table = 'user_';
		parent::__construct();
	}
} 