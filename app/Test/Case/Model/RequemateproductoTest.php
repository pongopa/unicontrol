<?php
/* Requemateproducto Test cases generated on: 2016-05-03 21:28:43 : 1462327123*/
App::uses('Requemateproducto', 'Model');

/**
 * Requemateproducto Test Case
 *
 */
class RequemateproductoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.requemateproducto', 'app.requematedetalle', 'app.productos');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Requemateproducto = ClassRegistry::init('Requemateproducto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Requemateproducto);

		parent::tearDown();
	}

}
