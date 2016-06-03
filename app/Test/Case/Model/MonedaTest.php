<?php
/* Moneda Test cases generated on: 2016-05-14 09:45:44 : 1463235344*/
App::uses('Moneda', 'Model');

/**
 * Moneda Test Case
 *
 */
class MonedaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.moneda');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Moneda = ClassRegistry::init('Moneda');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Moneda);

		parent::tearDown();
	}

}
