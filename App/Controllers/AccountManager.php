<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class AccountManager extends \Core\Controller
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
	
	public function addUserAction()
    {
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$result = $directAdmin -> addUser($_POST['userName'] , $_POST['email'] , $_POST['package'] , $_POST['password'] );
		$this -> viewsManager -> setResult($result);
		$this -> viewsManager -> showSignupSiteAction();
    }
	
	public function deleteUserAction()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$result = $directAdmin -> deleteUser($_POST['userName']);
		$this -> viewsManager -> setResult($result);
		$this -> viewsManager -> showDeleteAccountSiteAction();
	}
	
	public function showAllUsersAction()
    {
        $directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$result = $directAdmin -> showUsers();
		$this -> viewsManager -> setResultArray($result);
		$this -> viewsManager -> setResult("Show users clicked");
		$this -> viewsManager -> showMainSite();
    }
	
	public function showUserConfigAction()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
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