<?php
/* Banco Test cases generated on: 2016-05-03 10:39:48 : 1462288188*/
App::uses('Banco', 'Model');

/**
 * Banco Test Case
 *
 */
class BancoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.banco');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Banco = ClassRegistry::init('Banco');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Banco);

		parent::tearDown();
	}

}
