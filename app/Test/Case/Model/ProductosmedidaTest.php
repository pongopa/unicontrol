<?php
/* Productosmedida Test cases generated on: 2016-05-03 15:23:57 : 1462305237*/
App::uses('Productosmedida', 'Model');

/**
 * Productosmedida Test Case
 *
 */
class ProductosmedidaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.productosmedida', 'app.producto');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Productosmedida = ClassRegistry::init('Productosmedida');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Productosmedida);

		parent::tearDown();
	}

}
