<?php

class DB
{
	var $link_id;

	function connect($db_host, $db_username, $db_password, $db_name = '')
	{
		$this->link_id = mysqli_connect($db_host, $db_username, $db_password);
		mysqli_connect_error();
		if ($this->link_id) {
			if ($db_name) @mysqli_select_db($this->link_id, $db_name);
			return $this->link_id;
		}
	}

	function select_db($db_name)
	{
		@mysqli_select_db($this->link_id, $db_name);
		return $this;
	}

	function query($input)
	{
		$q = @mysqli_query($this->link_id, $input);
		return $q;
	}

	function close()
	{
		@mysqli_close($this->link_id);
	}
}

?>
