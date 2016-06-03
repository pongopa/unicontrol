<?php
/* Proveedoresbanco Fixture generated on: 2016-05-03 13:31:21 : 1462298481 */

/**
 * ProveedoresbancoFixture
 *
 */
class ProveedoresbancoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'proveedore_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'banco_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'cuenta_bancaria' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 40, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'tipo_moneda' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => array('id', 'proveedore_id', 'banco_id', 'cuenta_bancaria'), 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'proveedore_id' => 1,
			'banco_id' => 1,
			'cuenta_bancaria' => 'Lorem ipsum dolor sit amet',
			'tipo_moneda' => 'Lorem ipsum dolor sit ame'
		),
	);
}
