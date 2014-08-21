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

	public function addFilter($filter)
	{
		$this->_filterAttribute[] = $filter;
		return $this;
	}

	public function addSelect($attribute)
	{
		$this->_selectedAttribute[] = $attribute;
		return $this;
	}

	public function load($val = '', $key = 'entity_id')
	{
		$startResult = ($this->curPage - 1) * $this->pageSize;
		$select = array();
		foreach($this->_selectedAttribute AS $sel){
			$select[] = 'v.'.$sel;
		}
		$select = implode($select, ',');
		$where = array("e.entity_id=v.entity_id");
		if(count($this->_filterAttribute) >= 1){
			foreach ($this->_filterAttribute AS $filter) {
				// or => array('key' => 'val','key2' => 'val2')
				// and => array('key' => 'val','key2' => 'val2')
				foreach($filter AS $cond => $fil){
					$whereTemp = array();
					foreach($fil AS $key=>$val){
						$whereTemp[] = "{$key}=".var_export($val,true);
					}
					$whereTemp = '('.implode(" $cond ", $whereTemp).')';
				}
				$where[] = $whereTemp;
			}
		}else{
			$where[] = "$key = ".var_export($val,true);
		}
		$where = implode(" AND ",$where);
		var_dump($where);
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