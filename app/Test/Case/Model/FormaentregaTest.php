<?php
/* Formaentrega Test cases generated on: 2016-05-23 23:11:42 : 1464061302*/
App::uses('Formaentrega', 'Model');

/**
 * Formaentrega Test Case
 *
 */
class FormaentregaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.formaentrega', 'app.ordencompra', 'app.ordencomprastipo', 'app.serviciosrealizado', 'app.cliente', 'app.condicionpago', 'app.estadocontribuyente', 'app.usuario', 'app.dependencia', 'app.institucione', 'app.dependencia3', 'app.area', 'app.cargo', 'app.modulo', 'app.modulo_usuario', 'app.zmenu', 'app.zmenu_usuario', 'app.clientesbanco', 'app.banco', 'app.clientesformapago', 'app.formapago', 'app.clientesvendedore', 'app.clientesucursa', 'app.conf_pai', 'app.conf_departamento', 'app.conf_provincia', 'app.conf_distrito', 'app.status', 'app.proveedore', 'app.proveedoresrubro', 'app.rubro', 'app.proveedoresbanco', 'app.moneda', 'app.proveedoresvendedore', 'app.ordencomprasproducto', 'app.producto', 'app.productosmedida', 'app.productostipo', 'app.requeequiherproducto', 'app.requeequiherdetalle', 'app.requemateproducto', 'app.requematedetalle');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Formaentrega = ClassRegistry::init('Formaentrega');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Formaentrega);

		parent::tearDown();
	}

}
