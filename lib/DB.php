<?php

class DB
{
	var $link_id;

	function connect($db_host, $db_username, $db_password, $db_name = '')
	{
		$this->link_id = @mysql_connect($db_host, $db_username, $db_password);
		if ($this->link_id) {
			if ($db_name) @mysql_select_db($db_name, $this->link_id);
			return $this->link_id;
		}
	}

	function select_db($db_name)
	{
		@mysql_select_db($db_name, $this->link_id);
		return $this;
	}

	function query($input)
	{
		$q = @mysql_query($input);
		return $q;
	}

	function fetch_array($query_id, $type = MYSQL_BOTH)
	{
		$fa = @mysql_fetch_array($query_id, $type);
		return $fa;
	}

	function num_rows($query_id)
	{
		$nr = @mysql_num_rows($query_id);
		return $nr;
	}

	function result($query_id, $row = 0, $field)
	{
		$r = @mysql_result($query_id, $row, $field);
		return $r;
	}

	function insert_id()
	{
		return @mysql_insert_id($this->link_id);
	}

	function close()
	{
		@mysql_close($this->link_id);
	}
}

?>
