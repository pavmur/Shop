<?php

class ShopTest extends PHPUnit_Framework_TestCase 
{

	protected $shop;

	protected $bk;

	public function setUp() {
		$this->bk = new Bookkeeping();
		$this->shop = new Shop($this->bk);
	}

	/** 
	* @expectedException 		SellException
	* @expectedExceptionMessage Нельзя купить ноль товара.
	*/
	public function testSellItemNullItem() 
	{
		$this->shop->sellItem(2, 0);
	}

	/** 
	* @expectedException 		SellException
	* @expectedExceptionMessage Нет данного товара.
	*/
	public function testSellItemWrongIdItem() 
	{
		$this->shop->sellItem(200, 10);
	}
	
	public function testCountUp() 
	{
		$this->shop->sellItem(1, 10);
		$this->shop->sellItem(2, 10);
		$this->shop->sellItem(3, 10);
		$this->assertTrue($this->shop->countUp());
	}
	
	/**
	* @dataProvider providerCountUpWithWrongLogs
	*/
	public function testCountUpWithWrongLogs($str) 
	{
		$this->shop->setWrongLog($str);
		$this->assertFalse($this->shop->countUp());
	}
	
	public function providerCountUpWithWrongLogs() 
	{
		return array(
					array("9813468906"),
					array(""),
					array("Яйцо?23"),
					array("Булка?|"),
					array("?780|"),
					array("Огурец?45")
				);
	}
}