<?php
/* ConfPai Test cases generated on: 2016-05-14 10:24:07 : 1463237647*/
App::uses('ConfPai', 'Model');

/**
 * ConfPai Test Case
 *
 */
class ConfPaiTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.conf_pai', 'app.moneda');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ConfPai = ClassRegistry::init('ConfPai');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ConfPai);

		parent::tearDown();
	}

}
