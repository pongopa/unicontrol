<?php
/* ConfDepartamento Test cases generated on: 2016-05-14 20:58:18 : 1463275698*/
App::uses('ConfDepartamento', 'Model');

/**
 * ConfDepartamento Test Case
 *
 */
class ConfDepartamentoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.conf_departamento', 'app.conf_pais');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ConfDepartamento = ClassRegistry::init('ConfDepartamento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ConfDepartamento);

		parent::tearDown();
	}

}
