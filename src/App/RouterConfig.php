<?php

namespace App;

/**
 * Klasa konfiguracji routera
 */
class RouterConfig extends \Mmi\Mvc\RouterConfig {

	/**
	 * Konstruktor konfigurujący router
	 */
	public function __construct() {

		//strona glowna
		$this->setRoute('records', '', ['module' => 'records']);
		$this->setRoute('position', 'position', ['module' => 'records', 'controller' => 'index', 'action' => 'position']);
	}

}
