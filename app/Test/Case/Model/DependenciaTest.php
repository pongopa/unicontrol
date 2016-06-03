<?php
/* Dependencia Test cases generated on: 2016-05-04 14:49:06 : 1462389546*/
App::uses('Dependencia', 'Model');

/**
 * Dependencia Test Case
 *
 */
class DependenciaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.dependencia', 'app.institucion', 'app.usuario', 'app.modulo', 'app.modulo_usuario', 'app.zmenu', 'app.zmenu_usuario');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Dependencia = ClassRegistry::init('Dependencia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dependencia);

		parent::tearDown();
	}

}
