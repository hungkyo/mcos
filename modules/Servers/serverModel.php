<?php
Class serverModel extends Core_Resource_Model{
	public function __construct()
	{
		$this->_table = 'server_';	
		parent::__construct();
	}
}