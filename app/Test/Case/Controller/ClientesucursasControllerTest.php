<?php
/* Clientesucursas Test cases generated on: 2016-05-15 23:16:01 : 1463370361*/
App::uses('ClientesucursasController', 'Controller');

/**
 * TestClientesucursasController *
 */
class TestClientesucursasController extends ClientesucursasController {
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
 * ClientesucursasController Test Case
 *
 */
class ClientesucursasControllerTestCase extends CakeTestCase {
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

		$this->Clientesucursas = new TestClientesucursasController();
		$this->Clientesucursas->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Clientesucursas);

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
