<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class AccountManager extends \Core\Controller
{

    protected function before()
    {
		session_start();
    }
	
	public function addUserAction()
    {
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> addUser($_POST['userName'] , $_POST['email'] , $_POST['package'] , $_POST['password'] );
    }
	
	public function deleteUserAction()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> deleteUser($_POST['userName']);
	}
	
	public function showAllUsersAction()
    {
        $directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$result = $directAdmin -> showUsers();
    }
	
	public function showUserConfigAction()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> showUserConfig($_POST['userName']);
	}

}