<?php

namespace App\Controllers;

use \Core\View;

class Signin extends \Core\Controller
{

    protected function before()
    {
		session_start();
    }

    public function loginAction()
    {
        View::renderTemplate('MainSite/mainSite.html');
    }
}