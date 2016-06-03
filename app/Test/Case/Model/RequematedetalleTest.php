<?php
/* Requematedetalle Test cases generated on: 2016-05-03 21:28:20 : 1462327100*/
App::uses('Requematedetalle', 'Model');

/**
 * Requematedetalle Test Case
 *
 */
class RequematedetalleTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.requematedetalle', 'app.requemateproducto');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Requematedetalle = ClassRegistry::init('Requematedetalle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Requematedetalle);

		parent::tearDown();
	}

}
