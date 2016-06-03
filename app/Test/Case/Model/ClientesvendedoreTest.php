<?php
/* Clientesvendedore Test cases generated on: 2016-05-03 14:10:19 : 1462300819*/
App::uses('Clientesvendedore', 'Model');

/**
 * Clientesvendedore Test Case
 *
 */
class ClientesvendedoreTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.clientesvendedore', 'app.cliente', 'app.rubro', 'app.condicionpago', 'app.clientesbanco', 'app.banco', 'app.clientesformapago', 'app.formapago', 'app.clientesrubro');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Clientesvendedore = ClassRegistry::init('Clientesvendedore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Clientesvendedore);

		parent::tearDown();
	}

}
