<?php
/* ConfDistrito Test cases generated on: 2016-05-14 21:40:57 : 1463278257*/
App::uses('ConfDistrito', 'Model');

/**
 * ConfDistrito Test Case
 *
 */
class ConfDistritoTestCase extends CakeTestCase {
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

		$this->ConfDistrito = ClassRegistry::init('ConfDistrito');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ConfDistrito);

		parent::tearDown();
	}

}
