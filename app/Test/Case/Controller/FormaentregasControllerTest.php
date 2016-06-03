<?php
/* Formaentregas Test cases generated on: 2016-05-23 23:11:55 : 1464061315*/
App::uses('FormaentregasController', 'Controller');

/**
 * TestFormaentregasController *
 */
class TestFormaentregasController extends FormaentregasController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * FormaentregasController Test Case
 *
 */
class FormaentregasControllerTestCase extends CakeTestCase {
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

		$this->Formaentregas = new TestFormaentregasController();
		$this->Formaentregas->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Formaentregas);

		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {

	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {

	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {

	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {

	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {

	}

}
