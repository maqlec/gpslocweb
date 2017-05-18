<?php

namespace Records\Model;

class RecordsModel
{

	public function getClientsImei()
	{
		return (new \Records\Orm\RecordsQuery)
			->findUnique('imei');
	}

}
