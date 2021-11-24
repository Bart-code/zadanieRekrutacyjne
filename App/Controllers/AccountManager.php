<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class AccountManager extends \App\Controllers\DirectAdminController
{
	
	public function addUserAction()
    {
		$directAdmin = $this -> getDirectAdminFromSession();
		$result = $directAdmin -> addUser($_POST['userName'] , $_POST['email'] , $_POST['package'] , $_POST['password'] );
		$this -> viewsManager -> setResult($result);
		$this -> viewsManager -> showSignupSiteAction();
    }
	
	public function deleteUserAction()
	{
		$directAdmin = $this -> getDirectAdminFromSession();
		$result = $directAdmin -> deleteUser($_POST['userName']);
		$this -> viewsManager -> setResult($result);
		$this -> viewsManager -> showDeleteAccountSiteAction();
	}
	
	public function showAllUsersAction()
    {
		$directAdmin = $this -> getDirectAdminFromSession();
		$result = $directAdmin -> showUsers();
		if( gettype( $result ) == "array")
		{
			$this -> viewsManager -> setResultArray($result);
			$this -> viewsManager -> setResult("Show users clicked");
		}
		else
		{
			$this -> viewsManager -> setResult($result);
		}
		
		$this -> viewsManager -> showMainSite();
    }
	
	public function showUserConfigAction()
	{
		$directAdmin = $this -> getDirectAdminFromSession();
		$result = $directAdmin -> showUserConfig($_POST['userName']);
		if( gettype( $result ) == "array")
		{
			$this -> viewsManager -> setResultArray($result);
			$this -> viewsManager -> setResult("Show config available");
		}
		else
		{
			$this -> viewsManager -> setResult($result);
		}
		$this -> viewsManager -> showUserConfigAction();
	}

}