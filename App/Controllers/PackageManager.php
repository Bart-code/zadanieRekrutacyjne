<?php

namespace App\Controllers;
use \App\Models\DirectAdmin;

class PackageManager extends \App\Controllers\DirectAdminController
{
	
	public function addPackage()
	{
		$directAdmin = $this -> getDirectAdminFromSession();
		$result = $directAdmin -> addPackage($_POST['newPackage']);
		$this -> viewsManager -> setResult($result);
		$this -> viewsManager -> showAddPackageAction();
	}
	
	public function showAllPackages()
	{
		$directAdmin = $this -> getDirectAdminFromSession();
		$result = $directAdmin -> showPackages();
		if( gettype($result) == "array")
		{
			$this -> viewsManager -> setResultArray($result);
			$this -> viewsManager -> setResult("Show packages clicked");
		}
		else
		{
			$this -> viewsManager -> setResult($result);
			var_dump($_SESSION['serverAddress']);
		}
		
		$this -> viewsManager -> showMainSite();
	}

}