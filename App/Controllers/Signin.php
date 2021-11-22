<?php

namespace App\Controllers;

//include 'ViewManager.php';

use \Core\View;


class Signin extends \Core\Controller
{
	private $viewManager;
	
    protected function before()
    {
		session_start();
    }

    public function loginAction()
    {
		$routparams = [];
		$viewManager = new ViewsManager($routparams);
		$viewManager -> showMainSiteAction();
    }
}