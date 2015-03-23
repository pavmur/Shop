<?php

class Bookkeeping 
{

	public function compute($log) 
	{
		if (!is_string($log) || strlen($log) < 4)
			throw new BKException('Логи должны храниться в строке не менее 4 символов.');
		$soldUnits = explode("|", $log);
		if (count($soldUnits) < 2)
			throw new BKException('Неверный формат логов. Возможно упущен символ "|".');
		foreach ($soldUnits as $unit) 
		{
			if ($unit == "")
				continue;
			$price = explode("?", $unit);
			if (
					count($price) < 2 
						|| 
					$price[1] == "" 
						|| 
					$price[0] == ""
				)
				throw new BKException('Неверный формат логов. Возможно упущен символ "?".');
		}
		$this->issueDocuments();
		return TRUE;
	}

	private function issueDocuments() 
	{

	}
}