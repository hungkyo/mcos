<?php

class installWP
{
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
	public function cpDir($source,$dest){
		$ignores = array(
			'.',
			'..',
			'Thumbs.db',
		);
		if(!file_exists($dest)) mkdir($dest);
		$directory = opendir($source);
		while ($file = readdir($directory)) {
			if (in_array($file, $ignores)) continue;
			if (is_dir("$source/$file")) {
				$this->cpDir("$source/$file", "$dest/$file");
			} else {
				copy("$source/$file", "$dest/$file");
			}
		}
	}
	public function mkTempDir()
	{
		$this->cpDir(thisDir.'origin/originClientCode', thisDir.'temp/' . $this->domain);
		$tempConfig = file_get_contents(thisDir.'temp/' . $this->domain . '/wp-config.php');
		$tempConfig = str_replace(array(
			'{DBNAME}',
			'{DBUSER}',
			'{DBPASS}',
		), array(
			$this->dbname,
			$this->server->getData('dbuser'),
			$this->server->getData('dbpass'),
		), $tempConfig);
		file_put_contents(thisDir.'temp/' . $this->domain . '/wp-config.php', $tempConfig);
		return $this;
	}

	public function connectDB()
	{
		$this->db = getModel('DB');
		$this->db->connect(
			$this->server->getData('ip'),
			$this->server->getData('dbuser'),
			$this->server->getData('dbpass')
		);
		return $this;
	}

	public function mkDB()
	{
		$this->dbname = str_replace(array(
			'.',
			'-',
		), '_', $this->domain);
		$this->db->query('CREATE DATABASE IF NOT EXISTS ' . $this->dbname);
		$this->db->select_db($this->dbname);
		return $this;
	}

	public function dumpDB()
	{
		$originDB = file_get_contents(thisDir.'origin/originDB.sql');
		$originDBA = explode("\n", $originDB);
		$q = '';
		foreach ($originDBA AS $r) {
			$r = str_replace('{DOMAINNAME}',$this->domain,$r);
			$q .= "\n$r";
			if($r[strlen($r)-1] == ';'){
				$this->db->query($q);
				$q = '';
			}
		}
		return $this;
	}

	public function connectFTP()
	{
		$this->ftp = getModel("FTP");
		$this->ftp->setData('host', $this->server->getData('ip'))
			->setData('user', $this->server->getData('ftpuser'))
			->setData('pass', $this->server->getData('ftppass'))
			->connect();
		return $this;
	}

	public function uploadClient()
	{
		$this->ftp->uploadDir(thisDir.'temp/'.$this->domain, "/var/www/mcos-wp/".$this->domain);
		return $this;
	}

	public function mkConfFile()
	{
		$tempConfig = file_get_contents(thisDir.'origin/tempvHost.conf');
		$tempConfig = str_replace(array(
			'{DOMAIN}',
		), array(
			$this->domain,
		), $tempConfig);
		file_put_contents(thisDir."temp/{$this->domain}.conf", $tempConfig);
		return $this;
	}

	public function uploadConfFile()
	{
		$this->ftp->upload(thisDir."temp/{$this->domain}.conf", "/var/www/vconf/{$this->domain}.conf");
		return $this;
	}
}