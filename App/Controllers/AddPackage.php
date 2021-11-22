<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class AddPackage extends \Core\Controller
{
	public function AddPackage()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> addPackage($_POST['newPackage']);
	}
}