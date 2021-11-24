<?php

namespace App\Controllers;

use \Core\View;
require_once('ServerSingleton.php');

class AdminManager extends \App\Controllers\DirectAdminController
{
	
    public function loginAction()
    {
		$_SESSION['serverAddress'] = $_POST['serverAddress'];
		$_SESSION['userName'] = $_POST['accountName'];
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['port'] = $_POST['serverPort'];
		$this -> viewsManager -> showMainSite();
    }
	
	 public function logoutAction()
    {
		unset($_SESSION['serverAddress']);
		unset($_SESSION['userName']);
		unset($_SESSION['password']);
		unset($_SESSION['port']);
		$this -> viewsManager -> showLoginSite();
    }
}