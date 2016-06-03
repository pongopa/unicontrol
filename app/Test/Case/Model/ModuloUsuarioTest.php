<?php
/* ModuloUsuario Test cases generated on: 2016-05-04 14:25:15 : 1462388115*/
App::uses('ModuloUsuario', 'Model');

/**
 * ModuloUsuario Test Case
 *
 */
class ModuloUsuarioTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.modulo_usuario', 'app.modulo', 'app.zmenu', 'app.zmenu_usuario', 'app.usuario');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ModuloUsuario = ClassRegistry::init('ModuloUsuario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ModuloUsuario);

		parent::tearDown();
	}

}
