<?php
/* Requeequiherproductos Test cases generated on: 2016-05-03 21:56:58 : 1462328818*/
App::uses('RequeequiherproductosController', 'Controller');

/**
 * TestRequeequiherproductosController *
 */
class TestRequeequiherproductosController extends RequeequiherproductosController {
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
 * RequeequiherproductosController Test Case
 *
 */
class RequeequiherproductosControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.requeequiherproducto', 'app.requeequiherdetalle', 'app.productos');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Requeequiherproductos = new TestRequeequiherproductosController();
		$this->Requeequiherproductos->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Requeequiherproductos);

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
