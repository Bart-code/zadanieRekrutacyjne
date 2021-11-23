<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class PackageManager extends \Core\Controller
{
	private $viewsManager;
	
	public function __construct()
    {
		$this -> viewsManager = new ViewsManager("");
	}
	
	public function addPackage()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$result = $directAdmin -> addPackage($_POST['newPackage']);
		$this -> viewsManager -> setResult($result);
		$this -> viewsManager -> showAddPackageAction();
	}
	
	public function showAllPackages()
	{
		$directAdmin = new DirectAdmin("http://65.108.88.40", "admin", "axm-9wxwdgM3VLfu");
		$result = $directAdmin -> showPackages();
		$this -> viewsManager -> setResultArray($result);
		$this -> viewsManager -> setResult("Show packages clicked");
		$this -> viewsManager -> showMainSite();
	}

}