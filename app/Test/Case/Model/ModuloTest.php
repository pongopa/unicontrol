<?php
/* Modulo Test cases generated on: 2016-05-04 14:24:48 : 1462388088*/
App::uses('Modulo', 'Model');

/**
 * Modulo Test Case
 *
 */
class ModuloTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.modulo', 'app.modulo_usuario', 'app.zmenu', 'app.zmenu_usuario');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Modulo = ClassRegistry::init('Modulo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Modulo);

		parent::tearDown();
	}

}
