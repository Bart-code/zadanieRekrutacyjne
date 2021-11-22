<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

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
	
	public function addAction()
    {
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> addUser($_POST['userName'] , $_POST['email'] , $_POST['package'] , $_POST['password'] );
    }
	
	

}