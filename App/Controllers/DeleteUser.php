<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class DeleteUser extends \Core\Controller
{
	public function deleteUser()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> deleteUser($_POST['userName']);
	}
}