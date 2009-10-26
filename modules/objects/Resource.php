<?php
class Resource
{	
	public $id;
	public $name;
	public $price;
	public $total;	
	
	function __construct($id, $name, $price, $total)
	{	
		$this->id = $id;	
		$this->name = $name;
		$this->price = $price;
		$this->total = $total;
	 }

}
?>