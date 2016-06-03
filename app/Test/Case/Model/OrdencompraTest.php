<?php
/* Ordencompra Test cases generated on: 2016-05-03 23:10:44 : 1462333244*/
App::uses('Ordencompra', 'Model');

/**
 * Ordencompra Test Case
 *
 */
class OrdencompraTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.ordencompra', 'app.ordencomprastipo', 'app.serviciosrealizado', 'app.cliente', 'app.rubro', 'app.condicionpago', 'app.clientesbanco', 'app.banco', 'app.clientesformapago', 'app.formapago', 'app.clientesrubro', 'app.clientesvendedore', 'app.status', 'app.proveedore', 'app.proveedoresrubro', 'app.proveedoresvendedore', 'app.proveedoresbanco', 'app.ordencomprasproducto', 'app.productos');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Ordencompra = ClassRegistry::init('Ordencompra');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ordencompra);

		parent::tearDown();
	}

}
