<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\DirectAdmin;

class ViewsManager extends \Core\Controller
{

    public function showMainSiteAction()
    {
		View::renderTemplate('Main/mainSite.html');
    }
	
	public function showSignupSiteAction()
    {
		View::renderTemplate('Signup/signupSite.html');
    }
	
	public function showChangeDataSiteAction()
    {
		View::renderTemplate('ChangeData/changeDataSite.html');
    }
	
	public function showDeleteAccountSiteAction()
    {
		View::renderTemplate('DeleteAccount/deleteAccountSite.html');
    }
	
	public function showAccountListingSiteAction()
    {
		View::renderTemplate('AccountListing/accountListingSite.html');
    }
	
	public function showUserShowConfigAction()
    {
		View::renderTemplate('UserShowConfig/showUserConfigSite.html');
    }
	
	public function showAddPackageAction()
    {
		View::renderTemplate('AddPackage/addPackageSite.html');
    }
	
	public function showAllackagesAction()
    {
		View::renderTemplate('AddPackage/addPackageSite.html');
    }
}