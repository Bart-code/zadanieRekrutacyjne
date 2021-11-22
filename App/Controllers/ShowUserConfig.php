<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class ShowUSerConfig extends \Core\Controller
{
	public function showUserConfig()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> showUserConfig($_POST['userName']);
	}
}