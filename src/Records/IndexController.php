<?php

namespace Records;

class IndexController extends \Mmi\Mvc\Controller
{

	public function indexAction()
	{
		$form = new Form\PickForm();
		$this->view->form = $form;
	}

}
