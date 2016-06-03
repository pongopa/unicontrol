<?php
/* Ordencomprastipo Test cases generated on: 2016-05-03 22:48:37 : 1462331917*/
App::uses('Ordencomprastipo', 'Model');

/**
 * Ordencomprastipo Test Case
 *
 */
class OrdencomprastipoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.ordencomprastipo');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Ordencomprastipo = ClassRegistry::init('Ordencomprastipo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ordencomprastipo);

		parent::tearDown();
	}

}
