<?php
/* Cliente Test cases generated on: 2016-05-03 14:07:05 : 1462300625*/
App::uses('Cliente', 'Model');

/**
 * Cliente Test Case
 *
 */
class ClienteTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.cliente', 'app.rubro', 'app.condicionpago', 'app.clientesbanco', 'app.clientesformapago', 'app.clientesrubro', 'app.clientesvendedore');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Cliente = ClassRegistry::init('Cliente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cliente);

		parent::tearDown();
	}

}
