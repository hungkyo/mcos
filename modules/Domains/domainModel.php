<?php
Class domainModel extends Core_Resource_Model{
	public function __construct()
	{
		$this->_table = 'domain_';
		parent::__construct();
	}
}