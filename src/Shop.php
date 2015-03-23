<?php
class Shop 
{
	
	private $bookkeeping;
	
	private $seller;
	
	private $log = "";
	
	private $data = array();

	function __construct (Bookkeeping $bk) 
	{
		$this->bookkeeping = $bk;
		$this->seller = new Seller();

		array_push($this->data, new Item('Колбаса', 340));
		array_push($this->data, new Item('Хлеб', 37));
		array_push($this->data, new Item('Молоко', 65));
		array_push($this->data, new Item('Яйцо', 108));
		array_push($this->data, new Item('Рис', 45));
	}

	public function sellItem($id, $count) 
	{
		if ($count <= 0)
			throw new SellException("Нельзя купить ноль товара.");
		if (!isset($this->data[$id]))
			throw new SellException('Нет данного товара.');
		else 
			$this->log .= $this->seller->sellItem($this->data[$id], $count);
	}

	public function countUp() 
	{
		try {
			$this->bookkeeping->compute($this->log);
			$this->log = "";
			return TRUE;
		} catch (BKException $e) {
			$this->seller->checkLogs($this->log);
			return FALSE;
		}
	}
	
	public function setWrongLog($str) 
	{
		$this->log = $str;
	}
}