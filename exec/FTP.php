<?php

class FTP
{
	private $host = '';
	private $user = '';
	private $pass = '';
	private $initPath = '';
	private $ftpCon;

	public function setData($key, $value)
	{
		$this->$key = $value;
		return $this;
	}

	public function connect()
	{
		var_dump($this->host);
		exit;
		$this->ftpCon = @ftp_connect($this->host);
		var_dump($this->ftpCon);
		exit;
		@ftp_login($this->ftpCon, $this->user, $this->pass);
		// ftp_chdir($this->ftpCon, $this->initPath);
		return $this;
	}

	public function chdir($path)
	{
		@ftp_chdir($this->ftpCon, $path);
		return $this;
	}

	public function upload($localFile, $remoteFile)
	{
		@ftp_put($this->ftpCon, $remoteFile, $localFile, FTP_BINARY);
		return $this;
	}
}