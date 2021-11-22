<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class ShowUsers extends \Core\Controller
{

    protected function before()
    {
		session_start();
    }

    public function showUsersAction()
    {
        $directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$result = $directAdmin -> showUsers();
    }
}