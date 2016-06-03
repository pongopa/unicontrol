<?php
/* Proveedoresformapago Test cases generated on: 2016-05-03 13:26:17 : 1462298177*/
App::uses('Proveedoresformapago', 'Model');

/**
 * Proveedoresformapago Test Case
 *
 */
class ProveedoresformapagoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.proveedoresformapago', 'app.proveedore', 'app.rubro', 'app.condicionpago', 'app.formapago');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Proveedoresformapago = ClassRegistry::init('Proveedoresformapago');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Proveedoresformapago);

		parent::tearDown();
	}

}
