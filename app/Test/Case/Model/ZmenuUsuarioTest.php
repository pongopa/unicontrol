<?php
/* ZmenuUsuario Test cases generated on: 2016-05-04 14:30:39 : 1462388439*/
App::uses('ZmenuUsuario', 'Model');

/**
 * ZmenuUsuario Test Case
 *
 */
class ZmenuUsuarioTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.zmenu_usuario', 'app.zmenu', 'app.modulo', 'app.modulo_usuario', 'app.usuario');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ZmenuUsuario = ClassRegistry::init('ZmenuUsuario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ZmenuUsuario);

		parent::tearDown();
	}

}
