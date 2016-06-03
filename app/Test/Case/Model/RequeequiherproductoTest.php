<?php
/* Requeequiherproducto Test cases generated on: 2016-05-03 21:27:04 : 1462327024*/
App::uses('Requeequiherproducto', 'Model');

/**
 * Requeequiherproducto Test Case
 *
 */
class RequeequiherproductoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.requeequiherproducto', 'app.requeequiherdetalle', 'app.productos');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Requeequiherproducto = ClassRegistry::init('Requeequiherproducto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Requeequiherproducto);

		parent::tearDown();
	}

}
