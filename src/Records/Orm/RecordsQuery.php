<?php

namespace Records\Orm;

//<editor-fold defaultstate="collapsed" desc="RecordsQuery">
/**
 * @method RecordsQuery limit($limit = null)
 * @method RecordsQuery offset($offset = null)
 * @method RecordsQuery orderAsc($fieldName, $tableName = null)
 * @method RecordsQuery orderDesc($fieldName, $tableName = null)
 * @method RecordsQuery andQuery(\Mmi\Orm\Query $query)
 * @method RecordsQuery whereQuery(\Mmi\Orm\Query $query)
 * @method RecordsQuery orQuery(\Mmi\Orm\Query $query)
 * @method RecordsQuery resetOrder()
 * @method RecordsQuery resetWhere()
 * @method QueryHelper\RecordsQueryField whereId()
 * @method QueryHelper\RecordsQueryField andFieldId()
 * @method QueryHelper\RecordsQueryField orFieldId()
 * @method RecordsQuery orderAscId()
 * @method RecordsQuery orderDescId()
 * @method RecordsQuery groupById()
 * @method QueryHelper\RecordsQueryField whereImei()
 * @method QueryHelper\RecordsQueryField andFieldImei()
 * @method QueryHelper\RecordsQueryField orFieldImei()
 * @method RecordsQuery orderAscImei()
 * @method RecordsQuery orderDescImei()
 * @method RecordsQuery groupByImei()
 * @method QueryHelper\RecordsQueryField whereTimestamp()
 * @method QueryHelper\RecordsQueryField andFieldTimestamp()
 * @method QueryHelper\RecordsQueryField orFieldTimestamp()
 * @method RecordsQuery orderAscTimestamp()
 * @method RecordsQuery orderDescTimestamp()
 * @method RecordsQuery groupByTimestamp()
 * @method QueryHelper\RecordsQueryField whereLatitude()
 * @method QueryHelper\RecordsQueryField andFieldLatitude()
 * @method QueryHelper\RecordsQueryField orFieldLatitude()
 * @method RecordsQuery orderAscLatitude()
 * @method RecordsQuery orderDescLatitude()
 * @method RecordsQuery groupByLatitude()
 * @method QueryHelper\RecordsQueryField whereLongitude()
 * @method QueryHelper\RecordsQueryField andFieldLongitude()
 * @method QueryHelper\RecordsQueryField orFieldLongitude()
 * @method RecordsQuery orderAscLongitude()
 * @method RecordsQuery orderDescLongitude()
 * @method RecordsQuery groupByLongitude()
 * @method QueryHelper\RecordsQueryField whereAltitude()
 * @method QueryHelper\RecordsQueryField andFieldAltitude()
 * @method QueryHelper\RecordsQueryField orFieldAltitude()
 * @method RecordsQuery orderAscAltitude()
 * @method RecordsQuery orderDescAltitude()
 * @method RecordsQuery groupByAltitude()
 * @method QueryHelper\RecordsQueryField whereAngle()
 * @method QueryHelper\RecordsQueryField andFieldAngle()
 * @method QueryHelper\RecordsQueryField orFieldAngle()
 * @method RecordsQuery orderAscAngle()
 * @method RecordsQuery orderDescAngle()
 * @method RecordsQuery groupByAngle()
 * @method QueryHelper\RecordsQueryField whereSatellites()
 * @method QueryHelper\RecordsQueryField andFieldSatellites()
 * @method QueryHelper\RecordsQueryField orFieldSatellites()
 * @method RecordsQuery orderAscSatellites()
 * @method RecordsQuery orderDescSatellites()
 * @method RecordsQuery groupBySatellites()
 * @method QueryHelper\RecordsQueryField whereSpeed()
 * @method QueryHelper\RecordsQueryField andFieldSpeed()
 * @method QueryHelper\RecordsQueryField orFieldSpeed()
 * @method RecordsQuery orderAscSpeed()
 * @method RecordsQuery orderDescSpeed()
 * @method RecordsQuery groupBySpeed()
 * @method QueryHelper\RecordsQueryField andField($fieldName, $tableName = null)
 * @method QueryHelper\RecordsQueryField where($fieldName, $tableName = null)
 * @method QueryHelper\RecordsQueryField orField($fieldName, $tableName = null)
 * @method QueryHelper\RecordsQueryJoin join($tableName, $targetTableName = null, $alias = null)
 * @method QueryHelper\RecordsQueryJoin joinLeft($tableName, $targetTableName = null, $alias = null)
 * @method RecordsRecord[] find()
 * @method RecordsRecord findFirst()
 * @method RecordsRecord findPk($value)
 */
//</editor-fold>
class RecordsQuery extends \Mmi\Orm\Query
{

	protected $_tableName = 'records';

	/**
	 * 
	 * @param type $imei
	 * @return type
	 */
	public function byImeiQuery($imei)
	{
		return $this
				->whereImei()->equals($imei);
	}

	/**
	 * 
	 * @param type $dateFrom
	 * @param type $dateTo
	 * @return type
	 */
	public function byDatesQuery($dateFrom, $dateTo)
	{
		return $this
				->whereTimestamp()->greaterOrEquals($dateFrom)
				->andFieldTimestamp()->lessOrEquals($dateTo);
	}

	/**
	 * 
	 * @param type $imei
	 * @param type $dateFrom
	 * @param type $dateTo
	 */
	public function pointsQuery($imei, $dateFrom, $dateTo)
	{
		return $this
				->byImeiQuery($imei)
				->andQuery($this->byDatesQuery($dateFrom, $dateTo));
	}

}
