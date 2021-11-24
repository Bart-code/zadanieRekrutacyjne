<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

abstract class DirectAdminController extends \Core\Controller
{
	protected $viewsManager;
	
	public function __construct()
    {
		session_start();
		$this -> viewsManager = new ViewsManager("");
	}
	
	protected function getDirectAdminFromSession()
	{
		if( isset($_SESSION['serverAddress'])  )
		{
			$directAdmin = new DirectAdmin($_SESSION['serverAddress'], $_SESSION['userName'] ,$_SESSION['password'], $_SESSION['port'] );
			return $directAdmin;
		}
		else
		{
			return null;
		}
	}
	
}