<?php
/* Requeequiherdetalles Test cases generated on: 2016-05-03 21:56:45 : 1462328805*/
App::uses('RequeequiherdetallesController', 'Controller');

/**
 * TestRequeequiherdetallesController *
 */
class TestRequeequiherdetallesController extends RequeequiherdetallesController {
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
 * RequeequiherdetallesController Test Case
 *
 */
class RequeequiherdetallesControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.requeequiherdetalle', 'app.requeequiherproducto', 'app.productos');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Requeequiherdetalles = new TestRequeequiherdetallesController();
		$this->Requeequiherdetalles->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Requeequiherdetalles);

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
