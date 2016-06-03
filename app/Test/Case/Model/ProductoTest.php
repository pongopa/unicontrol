<?php
/* Producto Test cases generated on: 2016-05-03 21:53:39 : 1462328619*/
App::uses('Producto', 'Model');

/**
 * Producto Test Case
 *
 */
class ProductoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.producto', 'app.productosmedida');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Producto = ClassRegistry::init('Producto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Producto);

		parent::tearDown();
	}

}
