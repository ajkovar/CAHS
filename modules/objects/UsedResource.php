<?php
require_once('./modules/autoload.php');
class UsedResource extends Resource
{	
	public $used;
	
	function __construct($id, $name, $price, $total, $used)
	{
		parent::__construct($id, $name, $price, $total);
		$this->used = $used;	

	}	
}
?>