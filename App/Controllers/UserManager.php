<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class UserManager extends \Core\Controller
{
	
	private $viewsManager;
	
	public function __construct()
    {
		$this -> viewsManager = new ViewsManager("");
	}

    protected function before()
    {
		session_start();
    }
	
	public function changeEmailAction()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$result = $directAdmin -> changeEmail($_POST['userName'] , $_POST['newEmail']);
		$this -> viewsManager -> setResult($result);
		$this -> viewsManager -> showChangeEmailAction();
	}
	
	public function changePasswordAction()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$result = $directAdmin -> changePassword($_POST['userName'] , $_POST['newPassword'],$_POST['newPassword2']);
		$this -> viewsManager -> setResult($result);
		$this -> viewsManager -> showChangePasswordAction();
	}
	
	public function changePackageAction()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$result = $directAdmin -> changePackage($_POST['userName'] , $_POST['newPackage']);
		$this -> viewsManager -> setResult($result);
		$this -> viewsManager -> showChangePackageAction();
	}

}