<?php

namespace Records;

class IndexController extends \Mmi\Mvc\Controller
{

	public function indexAction()
	{
		$clients = (new Model\RecordsModel)->getClientsImei();
	}

}
