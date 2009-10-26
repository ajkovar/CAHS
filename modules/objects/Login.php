<?php
// THIS CLASS HAS BEEN RENAMED TO USER.. IT HAS BEEN LEFT IN HERE MERELY AS A REFERENCE FOR THE A.D.D. DOCUMENT
class Login
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