<?php 

class BookkeepingTest extends PHPUnit_Framework_TestCase 
{

	public function testComputeRightLog() 
	{
		$ob = new Bookkeeping();
		$this->assertTrue($ob->compute("Колбаса?23|Сосисоны?43|Чебуреки?56|"));
	}
	
	/**
	* @expectedException 		BKException
	* @dataProvider providerCompute
	*/
	public function testComputeWrongLog($log) 
	{
		$ob = new Bookkeeping();
		$ob->compute($log);
	}
	
	public function providerCompute() 
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