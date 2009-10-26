<?php
class User
{	
	public $id;
	public $username;
	public $firstName;
	public $lastName;
	
	function __construct($id, $username, $firstName, $lastName)
	{	
		$this->id = $id;	
		$this->username = $username;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	 }	
}
?>