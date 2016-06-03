<?php
/* Clientesbanco Test cases generated on: 2016-05-03 14:07:48 : 1462300668*/
App::uses('Clientesbanco', 'Model');

/**
 * Clientesbanco Test Case
 *
 */
class ClientesbancoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.clientesbanco', 'app.cliente', 'app.rubro', 'app.condicionpago', 'app.clientesformapago', 'app.clientesrubro', 'app.clientesvendedore', 'app.banco');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Clientesbanco = ClassRegistry::init('Clientesbanco');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Clientesbanco);

		parent::tearDown();
	}

}
