<?php

class Seller 
{

	public function sellItem(Item $item, $itemCount) 
	{
		return $item->name . "?" . ($item->price * $itemCount) . "|";
	}

	public function checkLogs($log) {}
}