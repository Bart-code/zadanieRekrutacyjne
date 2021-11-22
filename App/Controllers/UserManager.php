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
	
	public function changeEmailAction()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> changeEmail($_POST['userName'] , $_POST['newEmail']);
	}
	
	public function changePasswordAction()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> changePassword($_POST['userName'] , $_POST['newPassword']);
	}
	
	public function changePackageAction()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> changePackage($_POST['userName'] , $_POST['newPackage']);
	}

}