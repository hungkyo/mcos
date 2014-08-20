<?php

Class Core_Resource_Model
{
	private $_data = array();
	private $mysql;
	public function __construct(){
		if(!$this->mysql){
			global $mysql;
			$this->mysql = $mysql;
		}
	}
	public function getData($key = '')
	{
		if (!$key) return $this->_data;
		return $this->_data[$key];
	}
	public function setData($key,$val){
		$this->_data[$key] = $val;
		return $this;
	}
	public function load($val,$key = 'entity_id'){
		$q = $this->mysql->query("SELECT * FROM server_entity
		JOIN server_eav_varchar ON server_eav_varchar.entity_id = server_entity.entity_id
		WHERE server_entity.$key=".var_export($val,true)."");
		while($r = mysql_fetch_array($q)){
			var_dump($r);
		}
		return $this;
	}
	public function save(){

	}
}