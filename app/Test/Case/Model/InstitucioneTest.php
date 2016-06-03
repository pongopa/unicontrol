<?php
/* Institucione Test cases generated on: 2016-05-04 14:46:44 : 1462389404*/
App::uses('Institucione', 'Model');

/**
 * Institucione Test Case
 *
 */
class InstitucioneTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.institucione');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Institucione = ClassRegistry::init('Institucione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Institucione);

		parent::tearDown();
	}

}
