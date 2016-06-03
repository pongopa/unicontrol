<?php
/* Condicionpago Test cases generated on: 2016-05-03 11:11:25 : 1462290085*/
App::uses('Condicionpago', 'Model');

/**
 * Condicionpago Test Case
 *
 */
class CondicionpagoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.condicionpago');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Condicionpago = ClassRegistry::init('Condicionpago');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Condicionpago);

		parent::tearDown();
	}

}
