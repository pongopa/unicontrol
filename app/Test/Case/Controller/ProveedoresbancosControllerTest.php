<?php
/* Proveedoresbancos Test cases generated on: 2016-05-03 13:31:42 : 1462298502*/
App::uses('ProveedoresbancosController', 'Controller');

/**
 * TestProveedoresbancosController *
 */
class TestProveedoresbancosController extends ProveedoresbancosController {
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
 * ProveedoresbancosController Test Case
 *
 */
class ProveedoresbancosControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.proveedoresbanco', 'app.proveedore', 'app.rubro', 'app.condicionpago', 'app.banco');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Proveedoresbancos = new TestProveedoresbancosController();
		$this->Proveedoresbancos->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proveedoresbancos);

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
