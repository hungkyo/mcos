<?php
Abstract Class Core_Resource_Model
{
	private $_data = array();
	private $mysql;
	private $_selectedAttribute = array();
	private $_filterAttribute = array();
	public $_table;
	private $curPage = 1;
	private $pageSize = 10;
	private $_collection = array();
	private $_orderBy = 'entity_id';
	private $_order = 'DESC';

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
	public function addOrder($key,$ord='DESC')
	{
		$this->_orderBy = $key;
		$this->_order = $ord;
		return $this;
	}
	public function getAll()
	{
		$this->pageSize = -1;
		return $this;
	}
	public function getCount()
	{
		$this->addSelect("COUNT(*) AS c");
		return $this;
	}
	public function load($val = '', $key = 'entity_id')
	{
		$startResult = ($this->curPage - 1) * $this->pageSize;
		$limit = "LIMIT {$startResult},{$this->pageSize}";
		$select = array();
		foreach($this->_selectedAttribute AS $sel){
			$select[] = $sel;
		}
		if(count($select)){
			$select = implode($select, ',');
		}else $select = '*';
		if($this->pageSize == -1) $limit = '';
		$where = array();
		if(count($this->_filterAttribute) >= 1){
			foreach ($this->_filterAttribute AS $filter) {
				// or => array('key' => 'val','key2' => 'val2')
				// and => array('key' => 'val','key2' => 'val2')
				foreach($filter AS $cond => $fil){
					$whereTemp = array();
					if(is_array($fil)){
						foreach($fil AS $keyFil=>$valFil){
							if(is_array($valFil)){
								foreach ($valFil AS $key=>$val){
									$whereTemp[] = "{$key}=".var_export($val,true);
								}
							}
							else $whereTemp[] = "{$keyFil}=".var_export($valFil,true);
						}
						$whereTemp = '('.implode(" $cond ", $whereTemp).')';
					}else{
						$whereTemp = "{$cond}=".var_export($fil,true);
					}
				}
				$where[] = $whereTemp;
			}
		}elseif($val){
			$where[] = "$key = ".var_export($val,true);
		}else{
			$where[] = "1=1";
		}
		$where = implode(" AND ",$where);
		$order = "";
		if ($this->_orderBy){
			$order = "ORDER BY {$this->_orderBy} {$this->_order}";
		}
		$q = $this->mysql->query("SELECT {$select} FROM
		{$this->_table}entity AS e
		WHERE {$where}
		{$order}
		{$limit}");
		if(!$val){
			// this one is for the collection
			while($r = mysql_fetch_array($q,MYSQL_ASSOC)){
				$tempObj = get_class($this);
				$tempObj = new $tempObj;
				foreach ($r AS $k=>$v) $tempObj->setData($k,$v);
				$this->_collection[] = $tempObj;				
			}
			return $this->_collection;
		}else{
			// return the object
			$r=mysql_fetch_array($q,MYSQL_ASSOC);
			foreach ($r AS $k=>$v) $this->setData($k,$v);
			return $this;
		}
	}

	public function save()
	{
		if($this->getData('entity_id')){
			// Update the data
			$set = array();
			foreach ($this->_data AS $key => $val){
				if($key <> 'entity_id'){
					$set[] = "{$key}=".var_export($val,true);
				}
			}
			$set = implode(',',$set);
			$this->mysql->query("UPDATE {$this->_table}entity
				SET {$set}
			WHERE entity_id = {$this->getData('entity_id')}");
			return $this;
		}else{
			// Insert the data
			$keys = array();
			$vals = array();
			foreach($this->_data AS $key=> $val){
				$keys[] = $key;
				$vals[] = var_export($val,true);
			}
			$keys = implode($keys,',');
			$vals = implode($vals,',');
			$this->mysql->query("INSERT INTO {$this->_table}entity ({$keys}) VALUES({$vals})");
			$this->setData('entity_id',mysql_insert_id());
			return $this;
		}
	}
	
	public function delete(){
		if (!$this->getData('entity_id')) return;
		$this->mysql->query("DELETE FROM {$this->_table}entity WHERE entity_id = {$this->getData('entity_id')}");
	}
}