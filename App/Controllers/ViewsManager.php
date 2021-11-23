<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class ViewsManager extends \Core\Controller
{
	private $result;
	private $resultArray = array();
	
	public function setResult( String $result )
    {
		$this -> result = $result;
	}
	
	public function setResultArray( array $results )
    {
		$this -> resultArray = $results;
	}
	
    public function showMainSiteAction()
    {
		View::renderTemplate('Main/mainSite.html', ['result' => $this ->result , 'resultsArray' => $this -> resultArray]);
		$this -> result = "";
    }
	
	public function showSignupSiteAction()
    {
		View::renderTemplate('Signup/signupSite.html', ['result' => $this -> result]);
		$this -> result = "";
    }
	
	public function showChangeDataSiteAction()
    {
		View::renderTemplate('ChangeData/changeDataSite.html');
		$this -> result = "";
    }
	
	public function showDeleteAccountSiteAction()
    {
		View::renderTemplate('DeleteAccount/deleteAccountSite.html', ['result' => $this -> result]);
		$this -> result = "";
    }
	
	public function showAccountListingSiteAction()
    {
		View::renderTemplate('AccountListing/accountListingSite.html');
		$this -> result = "";
    }
	
	public function showUserConfigAction()
    {
		View::renderTemplate('UserShowConfig/showUserConfigSite.html' , ['result' => $this ->result , 'resultsArray' => $this -> resultArray]);
		$this -> result = "";
    }
	
	public function showAddPackageAction()
    {
		View::renderTemplate('AddPackage/addPackageSite.html', ['result' => $this -> result]);
		$this -> result = "";
    }
	
	public function showChangeEmailAction()
    {
		View::renderTemplate('ChangeData/changeEmailSite.html', ['result' => $this -> result]);
		$this -> result = "";
    }
	
	public function showChangePasswordAction()
    {
		View::renderTemplate('ChangeData/changePasswordSite.html', ['result' => $this -> result]);
		$this -> result = "";
    }
	
	public function showChangePackageAction()
    {
		View::renderTemplate('ChangeData/changePackageSite.html', ['result' => $this -> result]);
		$this -> result = "";
    }
}