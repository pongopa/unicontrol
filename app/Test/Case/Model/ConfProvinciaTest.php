<?php
/* ConfProvincia Test cases generated on: 2016-05-14 21:17:55 : 1463276875*/
App::uses('ConfProvincia', 'Model');

/**
 * ConfProvincia Test Case
 *
 */
class ConfProvinciaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.conf_provincia', 'app.conf_pai', 'app.moneda', 'app.conf_departamento', 'app.conf_pais');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ConfProvincia = ClassRegistry::init('ConfProvincia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ConfProvincia);

		parent::tearDown();
	}

}
