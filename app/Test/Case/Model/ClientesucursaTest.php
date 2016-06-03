<?php
/* Clientesucursa Test cases generated on: 2016-05-15 22:24:00 : 1463367240*/
App::uses('Clientesucursa', 'Model');

/**
 * Clientesucursa Test Case
 *
 */
class ClientesucursaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.clientesucursa', 'app.cliente', 'app.rubro', 'app.condicionpago', 'app.estadocontribuyente', 'app.clientesbanco', 'app.banco', 'app.clientesformapago', 'app.formapago', 'app.clientesrubro', 'app.clientesvendedore', 'app.conf_pai', 'app.conf_departamento', 'app.conf_provincia', 'app.conf_distrito', 'app.serviciosrealizado', 'app.status');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Clientesucursa = ClassRegistry::init('Clientesucursa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Clientesucursa);

		parent::tearDown();
	}

}
