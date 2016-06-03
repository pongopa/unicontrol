<?php
/* Proveedoresvendedores Test cases generated on: 2016-05-03 13:43:30 : 1462299210*/
App::uses('ProveedoresvendedoresController', 'Controller');

/**
 * TestProveedoresvendedoresController *
 */
class TestProveedoresvendedoresController extends ProveedoresvendedoresController {
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
 * ProveedoresvendedoresController Test Case
 *
 */
class ProveedoresvendedoresControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.proveedoresvendedore', 'app.proveedore', 'app.rubro', 'app.condicionpago');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Proveedoresvendedores = new TestProveedoresvendedoresController();
		$this->Proveedoresvendedores->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proveedoresvendedores);

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
