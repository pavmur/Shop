<?php

class SellerTest extends PHPUnit_Framework_TestCase 
{

	public function testSellItem() 
	{
		$seller = new Seller();
		$this->assertEquals('Хлеб ржаной?175|', $seller->sellItem(new Item('Хлеб ржаной', 35), 5));
		$this->assertEquals('Греча?0|', $seller->sellItem(new Item('Греча', 0), 3105));
	}
}