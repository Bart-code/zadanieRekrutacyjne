<?php

namespace App\Models;
include 'HTTPSocket.php';

use \Core\View;

class DirectAdmin extends \Core\Model
{
    private $serverAdres = "";
	private $userName = "";
	private $password = "";
	private $port = "2222";

	public $login = false;
	public $error = false;
	
	private $sock;

    public function __construct($serverAdres, $userName, $password)
    {
       $this -> $serverAdres = $serverAdres;
       $this -> $userName = $userName;
       $this -> $password = $password;
	   $this ->sock = new HTTPSocket;
		$this ->sock->connect($serverAdres, $this->port); 
		$this ->sock->set_login($userName,$password);
    }
	
	public function showUsers()
	{
		$this->sock->query("/CMD_API_SHOW_ALL_USERS");
		$result = $this->sock->fetch_parsed_body();
		if(count($result) > 0)
		{
			return $result['list'];
		}
		else
		{
			return $result;
		}
		
	}
	
	public function addUser($name,$email,$packasge,$password)
	{
		$this->sock->query('/CMD_API_ACCOUNT_USER',
		array(
			'action' => 'create',
			'add' => 'Submit',
			'username' => $name,
			'email' => $email,
			'package' => $packasge,
			'passwd' => $password,
			'passwd2' => $password,
			'ip' => '65.108.88.40',
			'notify' => 'yes'
		));
 
		$result = $this->sock->fetch_parsed_body();
	 
		if( $result['error'] != "0" )
		{
			return "Error Creating user. ".$result['details'];
		}
		else
		{
			return "Validate";
		}
	}
	
	public function deleteUser($userName)
	{
		if( empty($userName))return "Error Creating user. Check user name";
		$this->sock->query('/CMD_API_SELECT_USERS',array( 'confirmed' => 'Confirm' , 'delete' => 'yes' , 'select0' => $userName));
		$result = $this->sock->fetch_parsed_body();
		if( $result['error'] != "0" )
		{
			return "Error Creating user. ".$result['details'];
		}
		else
		{
			return "Validate";
		}
	}
	
	public function changeUserData($userName)
	{
		$this->sock->query('/CMD_API_SELECT_USERS',array( 'confirmed' => 'Confirm' , 'delete' => 'yes' , 'select0' => $userName));
		$result = $this->sock->fetch_parsed_body();
		echo var_dump($result);
		return $result;
	}
	
	public function showUserConfig($userName)
	{
		$this->sock->query('/CMD_API_SHOW_USER_CONFIG',array('user' => $userName));
		$result = $this->sock->fetch_parsed_body();
		if(  !isset( $result['error']) )
		{
			return $result;
		}
		else
		{
			return "Unable to show user";
		}
	}
	
	public function addPackage($newPackage)
	{
		$this->sock->query('/CMD_API_MANAGE_USER_PACKAGES',array( 'add' => 'Save' , 'packagename' => $newPackage));
		$result = $this->sock->fetch_parsed_body();
		if( $result['error'] != "0" )
		{
			return "Error adding new package. ".$result['details'];
		}
		else
		{
			return "Validate";
		}
	}
	
	public function showPackages()
	{
		$this->sock->query('/CMD_API_PACKAGES_USER');
		$result = $this->sock->fetch_parsed_body();
		if(count($result) > 0)
		{
			return $result['list'];
		}
		else
		{
			return $result;
		}
	}
	
	public function changeEmail($userName , $newEmail)
	{
		$this -> sock -> set_method("POST");
		$this->sock->query('/CMD_API_MODIFY_USER',array('action' => 'single','user' => $userName, 'evalue'=> $newEmail , 'email' => 'Save E-Mail'));
		$result = $this->sock->fetch_parsed_body();
		if( $result['error'] != "0" )
		{
			return "Error changing an email. ".$result['details'];
		}
		else
		{
			return "Validate";
		}
	}
	
	public function changePassword($userName , $newPassword, $newPassword2)
	{
		$this -> sock -> set_method("POST");
		$this->sock->query('/CMD_API_USER_PASSWD',array('username' => $userName,'passwd' => $newPassword,'passwd2' => $newPassword2));
		$result = $this->sock->fetch_parsed_body();
		if( $result['error'] != "0" )
		{
			return "Error changing a password. ".$result['details'];
		}
		else
		{
			return "Validate";
		}
	}
	
	public function changePackage($userName , $newPackage)
	{
		$this->sock->query('/CMD_API_MODIFY_USER',array('action' => 'package','user' => $userName,'package' => $newPackage));
		$result = $this->sock->fetch_parsed_body();
		if( $result['error'] != "0" )
		{
			return "Error changing a package. ".$result['details'];
		}
		else
		{
			return "Validate";
		}
	}

}
