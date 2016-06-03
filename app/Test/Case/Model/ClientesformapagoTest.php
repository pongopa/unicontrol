<?php
/* Clientesformapago Test cases generated on: 2016-05-03 14:08:31 : 1462300711*/
App::uses('Clientesformapago', 'Model');

/**
 * Clientesformapago Test Case
 *
 */
class ClientesformapagoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.clientesformapago', 'app.cliente', 'app.rubro', 'app.condicionpago', 'app.clientesbanco', 'app.banco', 'app.clientesrubro', 'app.clientesvendedore', 'app.formapago');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Clientesformapago = ClassRegistry::init('Clientesformapago');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Clientesformapago);

		parent::tearDown();
	}

}
