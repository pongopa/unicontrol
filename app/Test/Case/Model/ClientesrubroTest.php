<?php
/* Clientesrubro Test cases generated on: 2016-05-03 14:09:08 : 1462300748*/
App::uses('Clientesrubro', 'Model');

/**
 * Clientesrubro Test Case
 *
 */
class ClientesrubroTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.clientesrubro', 'app.cliente', 'app.rubro', 'app.condicionpago', 'app.clientesbanco', 'app.banco', 'app.clientesformapago', 'app.formapago', 'app.clientesvendedore');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Clientesrubro = ClassRegistry::init('Clientesrubro');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Clientesrubro);

		parent::tearDown();
	}

}
