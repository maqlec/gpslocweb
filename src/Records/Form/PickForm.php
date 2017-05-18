<?php

namespace Records\Form;

class PickForm extends \Mmi\Form\Form
{
	
	public function init() {
		
		$this->addElementSelect('devices')
			->setLabel('urządzenie')
			->setMultioptions((new \Records\Model\RecordsModel())->getClientsImei());
		
		$this->addElementText('dateFrom');

		$this->addElementText('dateTo');

		$this->addElementSubmit('submit')
			->setLabel('pokaz');
		
	}
}
