<?php

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller
{

    protected function before()
    {
		session_start();
    }

    public function indexAction()
    {
        View::renderTemplate('Home/loginSite.html');
    }
}