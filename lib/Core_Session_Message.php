<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/23/14
 * Time: 9:35 PM
 */
class Core_Session_Message
{
	private $_error = array();
	private $_success = array();

	public function addError($msg)
	{
		$this->_error[] = $msg;
		$_SESSION['_error'] = $this->_error;
		return $this;
	}

	public function addSuccess($msg)
	{
		$this->_success[] = $msg;
		$_SESSION['_success'] = $this->_success;
		return $this;
	}

	public function getError()
	{
		$this->_error = $_SESSION['_error'];
		$_SESSION['_error'] = array();
		return $this->_error;
	}

	public function getSuccess()
	{
		$this->_success = $_SESSION['_success'];
		$_SESSION['_success'] = array();
		return $this->_success;
	}
}