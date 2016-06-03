<?php
/* ZmenuUsuarios Test cases generated on: 2016-05-04 14:32:02 : 1462388522*/
App::uses('ZmenuUsuariosController', 'Controller');

/**
 * TestZmenuUsuariosController *
 */
class TestZmenuUsuariosController extends ZmenuUsuariosController {
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
 * ZmenuUsuariosController Test Case
 *
 */
class ZmenuUsuariosControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.zmenu_usuario', 'app.zmenu', 'app.modulo', 'app.modulo_usuario', 'app.usuario');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ZmenuUsuarios = new TestZmenuUsuariosController();
		$this->ZmenuUsuarios->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ZmenuUsuarios);

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
