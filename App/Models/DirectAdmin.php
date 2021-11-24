<?php

namespace App\Models;
include 'HTTPSocket.php';

use \Core\View;

class DirectAdmin extends \Core\Model
{
    private $serverAdres = "";
	private $userName = "";
	private $password = "";
	private $port = "";
	
	private $sock;

    public function __construct($serverAdres, $userName, $password , $port)
    {
       $this -> serverAdres = $serverAdres;
       $this -> serName = $userName;
       $this -> password = $password;
       $this -> port = $port;
	   $this -> sock = new HTTPSocket;
	   $this -> sock->connect($serverAdres, $port);
	   $this -> sock->set_login($userName,$password);
    }
	
	public function showUsers()
	{
		$this->sock->query("/CMD_API_SHOW_ALL_USERS");
		$result = $this->sock->fetch_parsed_body();
		if(count($result) > 0)
		{
			if(isset($result['list']))
			{
				return $result['list'];
			}
			else return "Error";
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
	 
		if( isset( $result['error']) AND $result['error']=="1")
		{
			return "Error creating user. ".$result['details'];
		}
		elseif( isset( $result['error']) AND $result['error']=="0")
		{
			return "Validate";
		}
		else
		{
			return "Error creating user";
		}
		
	}
	
	public function deleteUser($userName)
	{
		if( empty($userName))return "Error Creating user. Check user name";
		$this->sock->query('/CMD_API_SELECT_USERS',array( 'confirmed' => 'Confirm' , 'delete' => 'yes' , 'select0' => $userName));
		$result = $this->sock->fetch_parsed_body();
		if( isset( $result['error']) AND $result['error']=="1" )
		{
			return "Error Creating user. ".$result['details'];
		}
		elseif( isset( $result['error']) AND $result['error']=="0")
		{
			return "Validate";
		}
		else
		{
			return "Error delete user";
		}
	}
	
	public function changeUserData($userName)
	{
		$this->sock->query('/CMD_API_SELECT_USERS',array( 'confirmed' => 'Confirm' , 'delete' => 'yes' , 'select0' => $userName));
		$result = $this->sock->fetch_parsed_body();
		return $result;
	}
	
	public function showUserConfig($userName)
	{
		$this->sock->query('/CMD_API_SHOW_USER_CONFIG',array('user' => $userName));
		$result = $this->sock->fetch_parsed_body();
		if( count($result) )
		{
			if( isset( $result['error']) )
			{
				return "Error show user config. Wrong user name.";
			}
			else
			{
				return $result;
			}
		}
		else
		{
			return "Error show user config";
		}
	}
	
	public function addPackage($newPackage)
	{
		$this->sock->query('/CMD_API_MANAGE_USER_PACKAGES',array( 'add' => 'Save' , 'packagename' => $newPackage));
		$result = $this->sock->fetch_parsed_body();
		
		if( isset( $result['error']) AND $result['error']=="1")
		{
			return "Error adding new package. ".$result['details'];
		}
		elseif( isset( $result['error']) AND $result['error']=="0")
		{
			return "Validate";
		}
		else
		{
			return "Error adding new package";
		}
	}
	
	public function showPackages()
	{
		$this->sock->query('/CMD_API_PACKAGES_USER');
		$result = $this->sock->fetch_parsed_body();
		if(count($result) > 0)
		{
			if(isset($result['list']))
			{
				return $result['list'];
			}
			else
			{
				return "Error showing packages";
			}
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
		
		if( isset( $result['error']) AND $result['error']=="1")
		{
			return "Error changing an email. ".$result['details'];
		}
		elseif( isset( $result['error']) AND $result['error']=="0")
		{
			return "Validate";
		}
		else
		{
			return "Error email changing";
		}
	}
	
	public function changePassword($userName , $newPassword, $newPassword2)
	{
		$this -> sock -> set_method("POST");
		$this->sock->query('/CMD_API_USER_PASSWD',array('username' => $userName,'passwd' => $newPassword,'passwd2' => $newPassword2));
		$result = $this->sock->fetch_parsed_body();
		
		if( isset( $result['error']) AND $result['error']=="1")
		{
			return "Error changing a password. ".$result['details'];
		}
		elseif( isset( $result['error']) AND $result['error']=="0")
		{
			return "Validate";
		}
		else
		{
			return "Error password changing";
		}
	}
	
	public function changePackage($userName , $newPackage)
	{
		$this->sock->query('/CMD_API_MODIFY_USER',array('action' => 'package','user' => $userName,'package' => $newPackage));
		$result = $this->sock->fetch_parsed_body();
		
		if( isset( $result['error']) AND $result['error']=="1")
		{
			return "Error changing a package. ".$result['details'];
		}
		elseif( isset( $result['error']) AND $result['error']=="0")
		{
			return "Validate";
		}
		else
		{
			return "Error package changing";
		}
	}

}
