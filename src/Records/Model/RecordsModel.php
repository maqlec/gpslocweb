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

	public function getPoints($imei, $dateFrom, $dateTo)
	{
		return (new \Records\Orm\RecordsQuery())->pointsQuery($imei, $dateFrom, $dateTo)
				->find();
	}

	public function getPointsJson($records)
	{
		$points = [];
		foreach ($records as $record) {
			$object['point']['lat'] = $record->latitude;
			$object['point']['lng'] = $record->longitude;
			$points[] = $object;
		}
		return json_encode($points, JSON_NUMERIC_CHECK);
	}

	public function newestPoint()
	{
		$record = (new \Records\Orm\RecordsQuery)
			->orderDescTimestamp()
			->limit(1)
			->findFirst();
		$coords = [
			'latitude' => $record->latitude,
			'longitude' => $record->longitude
		];
		return $coords;
	}

}
