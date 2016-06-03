<?php
/* Zmenu Test cases generated on: 2016-05-04 14:29:04 : 1462388344*/
App::uses('Zmenu', 'Model');

/**
 * Zmenu Test Case
 *
 */
class ZmenuTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.zmenu', 'app.modulo', 'app.modulo_usuario', 'app.usuario', 'app.zmenu_usuario');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Zmenu = ClassRegistry::init('Zmenu');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Zmenu);

		parent::tearDown();
	}

}
