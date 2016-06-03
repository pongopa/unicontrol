<?php
/* Formapagos Test cases generated on: 2016-05-03 11:37:59 : 1462291679*/
App::uses('Formapagos', 'Controller');

/**
 * TestFormapagos *
 */
class TestFormapagos extends Formapagos {
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
 * Formapagos Test Case
 *
 */
class FormapagosTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.condicionpago');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Formapagos = new TestFormapagos();
		$this->->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Formapagos);

		parent::tearDown();
	}

}
