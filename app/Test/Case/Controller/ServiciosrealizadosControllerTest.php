<?php
/* Serviciosrealizados Test cases generated on: 2016-05-03 15:11:29 : 1462304489*/
App::uses('ServiciosrealizadosController', 'Controller');

/**
 * TestServiciosrealizadosController *
 */
class TestServiciosrealizadosController extends ServiciosrealizadosController {
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
 * ServiciosrealizadosController Test Case
 *
 */
class ServiciosrealizadosControllerTestCase extends CakeTestCase {
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

		$this->Serviciosrealizados = new TestServiciosrealizadosController();
		$this->Serviciosrealizados->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Serviciosrealizados);

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
