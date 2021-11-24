<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class UserManager extends \App\Controllers\DirectAdminController
{
	
	public function changeEmailAction()
	{
		$directAdmin = $this -> getDirectAdminFromSession();
		$result = $directAdmin -> changeEmail($_POST['userName'] , $_POST['newEmail']);
		$this -> viewsManager -> setResult($result);
		$this -> viewsManager -> showChangeEmailAction();
	}
	
	public function changePasswordAction()
	{
		$directAdmin = $this -> getDirectAdminFromSession();
		$result = $directAdmin -> changePassword($_POST['userName'] , $_POST['newPassword'],$_POST['newPassword2']);
		$this -> viewsManager -> setResult($result);
		$this -> viewsManager -> showChangePasswordAction();
	}
	
	public function changePackageAction()
	{
		$directAdmin = $this -> getDirectAdminFromSession();
		$result = $directAdmin -> changePackage($_POST['userName'] , $_POST['newPackage']);
		$this -> viewsManager -> setResult($result);
		$this -> viewsManager -> showChangePackageAction();
	}

}