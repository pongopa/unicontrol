<?php
/* Area Test cases generated on: 2016-05-12 23:29:08 : 1463111948*/
App::uses('Area', 'Model');

/**
 * Area Test Case
 *
 */
class AreaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.area');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Area = ClassRegistry::init('Area');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Area);

		parent::tearDown();
	}

}
