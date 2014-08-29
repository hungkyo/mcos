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
		$this->ftpCon = ftp_connect($this->host);
		ftp_login($this->ftpCon, $this->user, $this->pass);
		if ($this->initPath) $this->changeDir($this->initPath);
		return $this;
	}

	public function changeDir($path)
	{
		@ftp_chdir($this->ftpCon, $path);
		return $this;
	}

	public function upload($localFile, $remoteFile)
	{
		@ftp_put($this->ftpCon, $remoteFile, $localFile, FTP_BINARY);
		return $this;
	}

	public function download($remoteFile, $localFile)
	{
		@ftp_get($this->ftpCon, $localFile, $remoteFile, FTP_BINARY);
		return $this;
	}

	public function makeDir($dir)
	{
		@ftp_mkdir($this->ftpCon, $dir);
		return $this;
	}

	public function removeDir($dir)
	{
		@ftp_rmdir($this->ftpCon, $dir);
		return $this;
	}

	public function dirExists($remoteDir)
	{
		$curDir = @ftp_pwd($this->ftpCon);
		if (@ftp_chdir($this->ftpCon, $remoteDir)) {
			@ftp_chdir($this->ftpCon, $curDir);
			return true;
		}
		return false;
	}

	public function uploadDir($localDir, $remoteDir)
	{
		if (!$this->dirExists($remoteDir)) $this->makeDir($remoteDir);
		$ignores = array(
			'.',
			'..',
			'Thumbs.db',
		);
		$directory = opendir($localDir);
		while ($file = readdir($directory)) {
			if (in_array($file, $ignores)) continue;
			if (is_dir("$localDir/$file")) {
				$this->makeDir("$localDir/$file");
				$this->uploadDir("$localDir/$file", "$remoteDir/$file");
			} else {
				$this->upload("$localDir/$file", "$remoteDir/$file");
			}
		}
	}
}