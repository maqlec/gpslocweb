<?php

namespace Records;

class IndexController extends \Mmi\Mvc\Controller
{

	public function indexAction()
	{
		$form = new Form\PickForm(null);
		$records = (new Model\RecordsModel)->getPoints($form->getElement('imei')->getValue(), $form->getElement('dateFrom')->getValue(), $form->getElement('dateTo')->getValue());
		$this->view->records = $records;
		$this->view->json = (new Model\RecordsModel)->getPointsJson($records);
		$this->view->form = $form;
	}

	public function positionAction()
	{
		$this->getResponse()->setTypeJson();
		$coords = (new \Records\Model\RecordsModel)->newestPoint();
		return json_encode($coords, JSON_NUMERIC_CHECK);
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
