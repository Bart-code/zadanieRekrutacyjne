<?php

namespace App\Controllers;

use \Core\View;

class Signup extends \Core\Controller
{

    protected function before()
    {
		session_start();
    }

    public function newAction()
    {
        View::renderTemplate('SignupSite/signupSite.html');
    }
}