<?php

namespace App\Controllers;

use \Core\View;

class AdminManager extends \Core\Controller
{

    protected function before()
    {
		session_start();
    }

    public function loginAction()
    {
        View::renderTemplate('Main/mainSite.html');
    }
}