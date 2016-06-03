<?php
/* Proveedoresformapagos Test cases generated on: 2016-05-03 13:26:54 : 1462298214*/
App::uses('ProveedoresformapagosController', 'Controller');

/**
 * TestProveedoresformapagosController *
 */
class TestProveedoresformapagosController extends ProveedoresformapagosController {
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
 * ProveedoresformapagosController Test Case
 *
 */
class ProveedoresformapagosControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.proveedoresformapago', 'app.proveedore', 'app.rubro', 'app.condicionpago', 'app.formapago');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Proveedoresformapagos = new TestProveedoresformapagosController();
		$this->Proveedoresformapagos->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proveedoresformapagos);

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
