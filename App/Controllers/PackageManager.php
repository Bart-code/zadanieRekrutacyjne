<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class PackageManager extends \Core\Controller
{
	
	public function addPackage()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> addPackage($_POST['newPackage']);
	}
	
	public function ahowAllPackages()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$directAdmin -> showPackages();
	}

}