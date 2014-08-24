<?php

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/24/14
 * Time: 12:16 PM
 */
class Core_Session_User
{
	public function login($userName, $pass)
	{
		$sessionMessage = getModel("Core_Session_Message");
		$user = getModel("Core_User");
		$user->addFilter('user', $userName)
			->addFilter('pass', $pass)
			->load();
		if (count($user)) {
			$user = array_shift($user);
			$_SESSION['_user'] = $user;
			$_SESSION['_login'] = true;
			$sessionMessage->addSuccess('Successfully logged in!');
			$sessionMessage->addRedirect('index.php');
		} else {
			$sessionMessage->addError('The User name and Password is incorrect!');
			$sessionMessage->addRedirect('login.php');
		}
	}

	public function logout()
	{
		$sessionMessage = getModel("Core_Session_Message");
		$_SESSION['_user'] = false;
		$_SESSION['_login'] = false;
		$sessionMessage->addSuccess('Successfully logged out!');
		$sessionMessage->addRedirect('login.php');
	}
} 