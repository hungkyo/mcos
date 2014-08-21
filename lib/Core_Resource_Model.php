<?php

Class Core_Resource_Model
{
	private $_data = array();
	private $mysql;
	private $_selectedAttribute = array();
	private $_filterAttribute = array();
	private $_table = "";
	private $curPage = 1;
	private $pageSize = 10;
	private $_collection = array();
	public function __construct()
	{
		if (!$this->mysql) {
			global $mysql;
			$this->mysql = $mysql;
		}
	}

	public function getData($key = '')
	{
		if (!$key) return $this->_data;
		return $this->_data[$key];
	}

	public function setData($key, $val)
	{
		$this->_data[$key] = $val;
		return $this;
	}

	public function load($val='', $key = 'entity_id')
	{
		$startResult = ($this->curPage-1)*$this->pageSize;
		$select = implode($this->_selectedAttribute, ',');
		$where = array("1=1");
		foreach($this->_filterAttribute AS $filter){
			// or => array('key' => 'val')
		}
		$q = $this->mysql->query("SELECT {$select} FROM
		{$this->_table}entity AS e,
		{$this->_table}eav_val AS v
		WHERE {$where}
		LIMIT {$startResult},{$this->pageSize}");
		return $this;
	}

	public function save()
	{

	}
}