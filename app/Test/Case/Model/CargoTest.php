<?php
/* Cargo Test cases generated on: 2016-05-23 22:00:34 : 1464057034*/
App::uses('Cargo', 'Model');

/**
 * Cargo Test Case
 *
 */
class CargoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.cargo', 'app.usuario', 'app.dependencia', 'app.institucione', 'app.dependencia3', 'app.modulo', 'app.modulo_usuario', 'app.zmenu', 'app.zmenu_usuario');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Cargo = ClassRegistry::init('Cargo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cargo);

		parent::tearDown();
	}

}
