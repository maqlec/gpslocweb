<?php

namespace Records\Form;

class PickForm extends \Mmi\Form\Form
{
	
	public function init() {
		
		$this->addElementSelect('devices')
			->setLabel('urządzenie')
			->setMultioptions((new \Records\Model\RecordsModel())->getClientsImei());
		
		$this->addElementSubmit('sumbit')
			->setLabel('pokaz');
		
	}
}
