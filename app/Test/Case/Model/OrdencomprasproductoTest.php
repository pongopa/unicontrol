<?php
/* Ordencomprasproducto Test cases generated on: 2016-05-03 23:13:28 : 1462333408*/
App::uses('Ordencomprasproducto', 'Model');

/**
 * Ordencomprasproducto Test Case
 *
 */
class OrdencomprasproductoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.ordencomprasproducto', 'app.ordencompra', 'app.ordencomprastipo', 'app.serviciosrealizado', 'app.cliente', 'app.rubro', 'app.condicionpago', 'app.clientesbanco', 'app.banco', 'app.clientesformapago', 'app.formapago', 'app.clientesrubro', 'app.clientesvendedore', 'app.status', 'app.proveedore', 'app.proveedoresrubro', 'app.proveedoresvendedore', 'app.proveedoresbanco', 'app.producto', 'app.productosmedida', 'app.requeequiherproducto', 'app.requeequiherdetalle', 'app.requemateproducto', 'app.requematedetalle');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Ordencomprasproducto = ClassRegistry::init('Ordencomprasproducto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ordencomprasproducto);

		parent::tearDown();
	}

}
