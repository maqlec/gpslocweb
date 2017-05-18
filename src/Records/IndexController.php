<?php

namespace Records;

class IndexController extends \Mmi\Mvc\Controller
{

	public function indexAction()
	{
		$records = (new Orm\RecordsQuery())->byDatesQuery('2017-05-09 11:00', '2017-05-09 12:00')->find();
//		var_dump($records);
		$this->view->records = $records;
		$form = new Form\PickForm();
		$this->view->form = $form;
	}

}
