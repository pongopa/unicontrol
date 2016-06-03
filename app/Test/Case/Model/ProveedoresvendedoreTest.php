<?php
/* Proveedoresvendedore Test cases generated on: 2016-05-03 13:43:09 : 1462299189*/
App::uses('Proveedoresvendedore', 'Model');

/**
 * Proveedoresvendedore Test Case
 *
 */
class ProveedoresvendedoreTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.proveedoresvendedore', 'app.proveedore', 'app.rubro', 'app.condicionpago');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Proveedoresvendedore = ClassRegistry::init('Proveedoresvendedore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proveedoresvendedore);

		parent::tearDown();
	}

}
