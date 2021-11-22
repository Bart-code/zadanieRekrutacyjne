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

    public function connect()
    {
        
    }
	
	public function showUsers()
	{
		$this->sock->query("/CMD_API_SHOW_ALL_USERS");
		$result = $this->sock->fetch_parsed_body();
		//print_r($result);
		if (!$this->error) {
			echo var_dump($result);
			return;
		} else {
			return("Error!");
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
		echo var_dump($result);
	 
		if( $result['error'] != "0" )
		{
			echo "<b>Error Creating user  <br>\n";
			echo $result['text']."<br>\n";
			echo $result['details']."<br></b>\n";
		}
		else
		{
			echo "User created on server<br>\n";
		}
	}

		//$this->sock->query('/CMD_API_SHOW_USER_CONFIG?user='.$show_user);
	
	public function deleteUser($userName)
	{
		$this->sock->query('/CMD_API_SELECT_USERS',array( 'confirmed' => 'Confirm' , 'delete' => 'yes' , 'select0' => $userName));
		$result = $this->sock->fetch_parsed_body();
		echo var_dump($result);
		return $result;
	}
	
	//CMD_API_CHANGE_INFO
	
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
		echo var_dump($result);
	}
	
	public function addPackage($newPackage)
	{
		$this->sock->query('/CMD_API_MANAGE_USER_PACKAGES',array( 'add' => 'Save' , 'packagename' => $newPackage));
		$result = $this->sock->fetch_parsed_body();
		echo var_dump($result);
	}
	
	public function showPackages($userName)
	{
		$this->sock->query('/CMD_API_PACKAGES_USER');
		$result = $this->sock->fetch_parsed_body();
		echo var_dump($result);
	}
}
