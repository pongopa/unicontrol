<?php
/* Zmenu Fixture generated on: 2016-05-04 14:29:04 : 1462388344 */

/**
 * ZmenuFixture
 *
 */
class ZmenuFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'modulo_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'deno_menu' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 300, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'nivel' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'id_menu' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'orden_ubicacion' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 600, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'idcapa' => array('type' => 'string', 'null' => true, 'default' => 'principal', 'length' => 15, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'tipo_inst' => array('type' => 'integer', 'null' => false, 'default' => '0', 'collate' => NULL, 'comment' => ''),
		'activo' => array('type' => 'integer', 'null' => true, 'default' => '1', 'collate' => NULL, 'comment' => ''),
		'principal' => array('type' => 'integer', 'null' => true, 'default' => '0', 'collate' => NULL, 'comment' => ''),
		'principal_dependencia' => array('type' => 'integer', 'null' => true, 'default' => '0', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1)),
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
			'modulo_id' => 1,
			'deno_menu' => 'Lorem ipsum dolor sit amet',
			'nivel' => 1,
			'id_menu' => 1,
			'orden_ubicacion' => 1,
			'url' => 'Lorem ipsum dolor sit amet',
			'idcapa' => 'Lorem ipsum d',
			'tipo_inst' => 1,
			'activo' => 1,
			'principal' => 1,
			'principal_dependencia' => 1
		),
	);
}
