<?php
class installWP {
	private $domain;
	private $server;
	private $dbname;
	private $ftp;
	private $db;
	public function setData($key, $value)
	{
		$this->$key = $value;
		return $this;
	}
	public function mkTempDir(){
		copy('originClientCode',$this->domain);
		$tempConfig = file_get_contents($this->domain.'/wp-config.php');
		$tempConfig = str_replace(array(
			'{DBNAME}',
			'{DBUSER}',
			'{DBPASS}',
		),array(
			$this->dbname,
			$this->server->getData('dbuser'),
			$this->server->getData('dbpass'),
		),$tempConfig);
		file_put_contents($this->domain.'/wp-config.php',$tempConfig);
		return $this;
	}
	public function connectDB(){
		$this->db = getModel('DB');
		$this->db->connect(
			$this->server->getData('ip'),
			$this->server->getData('dbuser'),
			$this->server->getData('dbpass')
		);
	}
	public function mkDB(){
		$this->dbname = str_replace(array(
			'.',
			'-',
		),'_',$this->domain);
		$this->db->query('CREATE DATABASE '.$this->dbname.' IF NOT EXISTS');
		$this->db->select_db($this->dbname);
		return $this;
	}
	public function dumpDB(){
		$this->db->query('');
		return $this;
	}
	public function connectFTP(){
		$this->ftp = getModel("FTP");
		$this->ftp->setData('host',$this->server->getData('ip'))
			->setData('user',$this->server->getData('ftpuser'))
			->setData('pass',$this->server->getData('ftppass'))
			->connect();
		return $this;
	}
	public function uploadClient(){
		$this->ftp->uploadDir($this->domain,$this->domain);
		return $this;
	}
	public function mkConfFile(){
		$tempConfig = file_get_contents('tempvHost.conf');
		$tempConfig = str_replace(array(
			'{DOMAIN}',
		),array(
			$this->domain,
		),$tempConfig);
		file_put_contents("{$this->domain}.conf",$tempConfig);
		return $this;
	}
	public function uploadConfFile(){
		$this->ftp->upload("{$this->domain}.conf","/var/www/mcos-conf/{$this->domain}.conf");
		return $this;
	}
}