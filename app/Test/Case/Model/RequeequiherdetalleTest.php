<?php
/* Requeequiherdetalle Test cases generated on: 2016-05-03 21:26:15 : 1462326975*/
App::uses('Requeequiherdetalle', 'Model');

/**
 * Requeequiherdetalle Test Case
 *
 */
class RequeequiherdetalleTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.requeequiherdetalle', 'app.requeequiherproducto');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Requeequiherdetalle = ClassRegistry::init('Requeequiherdetalle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Requeequiherdetalle);

		parent::tearDown();
	}

}
