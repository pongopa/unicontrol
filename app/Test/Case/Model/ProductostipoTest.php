<?php
/* Productostipo Test cases generated on: 2016-05-06 23:02:41 : 1462591961*/
App::uses('Productostipo', 'Model');

/**
 * Productostipo Test Case
 *
 */
class ProductostipoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.productostipo', 'app.producto', 'app.productosmedida', 'app.requeequiherproducto', 'app.requeequiherdetalle', 'app.requemateproducto', 'app.requematedetalle');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Productostipo = ClassRegistry::init('Productostipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Productostipo);

		parent::tearDown();
	}

}
