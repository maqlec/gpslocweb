<?php

namespace Records;

class IndexController extends \Mmi\Mvc\Controller
{

	public function indexAction()
	{
		$form = new Form\PickForm(null);
		$records = (new Orm\RecordsQuery())->pointsQuery(
				$form->getElement('imei')->getValue(), $form->getElement('dateFrom')->getValue(), $form->getElement('dateTo')->getValue()
			)->find();
		$this->view->records = $records;
		$points = [];
		foreach ($records as $record) {
			$object['point']['lat'] = $record->latitude;
			$object['point']['lng'] = $record->longitude;
			$points[] = $object;
		}
		$this->view->json = json_encode($points, JSON_NUMERIC_CHECK);
		$this->view->form = $form;
	}

	/**
	 * Akcja wylogowania
	 */
	public function logoutAction()
	{
		$this->getMessenger()->clearMessages();
		\App\Registry::$auth->clearIdentity();
		//hit do statystyk
		$this->getResponse()->redirect('records');
	}

}
