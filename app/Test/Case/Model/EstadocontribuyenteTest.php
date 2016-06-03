<?php
/* Estadocontribuyente Test cases generated on: 2016-05-14 08:19:12 : 1463230152*/
App::uses('Estadocontribuyente', 'Model');

/**
 * Estadocontribuyente Test Case
 *
 */
class EstadocontribuyenteTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.estadocontribuyente');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Estadocontribuyente = ClassRegistry::init('Estadocontribuyente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Estadocontribuyente);

		parent::tearDown();
	}

}
