<?php
/* Proveedore Test cases generated on: 2016-05-03 13:16:26 : 1462297586*/
App::uses('Proveedore', 'Model');

/**
 * Proveedore Test Case
 *
 */
class ProveedoreTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.proveedore', 'app.rubro', 'app.condicionpago');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Proveedore = ClassRegistry::init('Proveedore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proveedore);

		parent::tearDown();
	}

}
