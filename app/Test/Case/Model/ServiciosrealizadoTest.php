<?php
/* Serviciosrealizado Test cases generated on: 2016-05-03 15:11:05 : 1462304465*/
App::uses('Serviciosrealizado', 'Model');

/**
 * Serviciosrealizado Test Case
 *
 */
class ServiciosrealizadoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.serviciosrealizado', 'app.cliente', 'app.rubro', 'app.condicionpago', 'app.clientesbanco', 'app.banco', 'app.clientesformapago', 'app.formapago', 'app.clientesrubro', 'app.clientesvendedore', 'app.statuse');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Serviciosrealizado = ClassRegistry::init('Serviciosrealizado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Serviciosrealizado);

		parent::tearDown();
	}

}
