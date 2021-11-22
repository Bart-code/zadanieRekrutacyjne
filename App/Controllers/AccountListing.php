<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class UserManager extends \Core\Controller
{

    protected function before()
    {
		session_start();
    }

    public function showUsersAction()
    {
        $directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$result = $directAdmin -> showUsers();
		View::renderTemplate('MainSite/mainSite.html',['result' => $result]);
    }
	
	public function showAdminsAction()
    {
        $directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$result = $directAdmin -> showUserConfig();
		View::renderTemplate('MainSite/mainSite.html',['result' => $result]);
    }
	
	public function deleteUser()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> deleteUser();
		View::renderTemplate('MainSite/mainSite.html');
	}
}