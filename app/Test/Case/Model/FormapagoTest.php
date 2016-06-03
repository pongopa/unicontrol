<?php
/* Formapago Test cases generated on: 2016-05-03 11:12:03 : 1462290123*/
App::uses('Formapago', 'Model');

/**
 * Formapago Test Case
 *
 */
class FormapagoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.formapago');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Formapago = ClassRegistry::init('Formapago');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Formapago);

		parent::tearDown();
	}

}
