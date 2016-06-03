<?php
/* Proveedoresrubro Test cases generated on: 2016-05-03 13:15:32 : 1462297532*/
App::uses('Proveedoresrubro', 'Model');

/**
 * Proveedoresrubro Test Case
 *
 */
class ProveedoresrubroTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.proveedoresrubro', 'app.proveedore', 'app.rubro', 'app.condicionpago');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Proveedoresrubro = ClassRegistry::init('Proveedoresrubro');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proveedoresrubro);

		parent::tearDown();
	}

}
