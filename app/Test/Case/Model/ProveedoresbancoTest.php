<?php
/* Proveedoresbanco Test cases generated on: 2016-05-03 13:31:21 : 1462298481*/
App::uses('Proveedoresbanco', 'Model');

/**
 * Proveedoresbanco Test Case
 *
 */
class ProveedoresbancoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.proveedoresbanco', 'app.proveedore', 'app.rubro', 'app.condicionpago', 'app.banco');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Proveedoresbanco = ClassRegistry::init('Proveedoresbanco');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proveedoresbanco);

		parent::tearDown();
	}

}
