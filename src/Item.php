<?php

class Item 
{
	
	public $name;
	
	public $price;

	function __construct($n, $p) 
	{
		$this->name = $n;
		$this->price = $p;
	}
}