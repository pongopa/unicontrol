<?php
/* Clientesformapagos Test cases generated on: 2016-05-03 14:15:39 : 1462301139*/
App::uses('ClientesformapagosController', 'Controller');

/**
 * TestClientesformapagosController *
 */
class TestClientesformapagosController extends ClientesformapagosController {
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
 * ClientesformapagosController Test Case
 *
 */
class ClientesformapagosControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.clientesformapago', 'app.cliente', 'app.rubro', 'app.condicionpago', 'app.clientesbanco', 'app.banco', 'app.clientesrubro', 'app.clientesvendedore', 'app.formapago');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Clientesformapagos = new TestClientesformapagosController();
		$this->Clientesformapagos->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Clientesformapagos);

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
