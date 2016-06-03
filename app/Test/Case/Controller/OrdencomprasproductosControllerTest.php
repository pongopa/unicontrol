<?php
/* Ordencomprasproductos Test cases generated on: 2016-05-03 23:15:02 : 1462333502*/
App::uses('OrdencomprasproductosController', 'Controller');

/**
 * TestOrdencomprasproductosController *
 */
class TestOrdencomprasproductosController extends OrdencomprasproductosController {
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
 * OrdencomprasproductosController Test Case
 *
 */
class OrdencomprasproductosControllerTestCase extends CakeTestCase {
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

		$this->Ordencomprasproductos = new TestOrdencomprasproductosController();
		$this->Ordencomprasproductos->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ordencomprasproductos);

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
