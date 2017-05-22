<?php

namespace Records\Model;

class RecordsModel
{

	/**
	 * 
	 * @return type
	 */
	public function getClientsImei()
	{
		return (new \Records\Orm\RecordsQuery)
				->findPairs('imei', 'imei');
	}

}
