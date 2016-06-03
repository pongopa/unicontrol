<?php
/* Rubros Test cases generated on: 2016-05-03 10:46:39 : 1462288599*/
App::uses('RubrosController', 'Controller');

/**
 * TestRubrosController *
 */
class TestRubrosController extends RubrosController {
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
 * RubrosController Test Case
 *
 */
class RubrosControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.rubro');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Rubros = new TestRubrosController();
		$this->Rubros->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rubros);

		parent::tearDown();
	}

}
