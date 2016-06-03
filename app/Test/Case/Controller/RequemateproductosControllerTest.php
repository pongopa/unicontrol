<?php
/* Requemateproductos Test cases generated on: 2016-05-03 21:57:32 : 1462328852*/
App::uses('RequemateproductosController', 'Controller');

/**
 * TestRequemateproductosController *
 */
class TestRequemateproductosController extends RequemateproductosController {
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
 * RequemateproductosController Test Case
 *
 */
class RequemateproductosControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.requemateproducto', 'app.requematedetalle', 'app.producto', 'app.productosmedida', 'app.requeequiherproducto', 'app.requeequiherdetalle');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Requemateproductos = new TestRequemateproductosController();
		$this->Requemateproductos->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Requemateproductos);

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
