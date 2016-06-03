<?php
/* ConfDistritos Test cases generated on: 2016-05-14 21:41:08 : 1463278268*/
App::uses('ConfDistritosController', 'Controller');

/**
 * TestConfDistritosController *
 */
class TestConfDistritosController extends ConfDistritosController {
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
 * ConfDistritosController Test Case
 *
 */
class ConfDistritosControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.conf_distrito', 'app.conf_pai', 'app.moneda', 'app.conf_departamento', 'app.conf_pais', 'app.conf_provincia');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ConfDistritos = new TestConfDistritosController();
		$this->ConfDistritos->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ConfDistritos);

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
