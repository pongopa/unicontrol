<?php
/* Rubro Test cases generated on: 2016-05-03 10:43:41 : 1462288421*/
App::uses('Rubro', 'Model');

/**
 * Rubro Test Case
 *
 */
class RubroTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.rubro');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Rubro = ClassRegistry::init('Rubro');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rubro);

		parent::tearDown();
	}

}
