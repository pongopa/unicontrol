<?php
/* Usuario Fixture generated on: 2016-05-04 14:37:09 : 1462388829 */

/**
 * UsuarioFixture
 *
 */
class UsuarioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'dependencia_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'usuario' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'clave' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 32, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'created' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'collate' => NULL, 'comment' => ''),
		'modified' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00', 'collate' => NULL, 'comment' => ''),
		'nivel' => array('type' => 'integer', 'null' => false, 'default' => '1', 'collate' => NULL, 'comment' => ''),
		'email' => array('type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'enlinea' => array('type' => 'integer', 'null' => false, 'default' => '0', 'collate' => NULL, 'comment' => ''),
		'entrada_actualizada' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00', 'collate' => NULL, 'comment' => ''),
		'activo' => array('type' => 'boolean', 'null' => false, 'default' => '1', 'collate' => NULL, 'comment' => ''),
		'nombre_completo' => array('type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'cedula_identidad' => array('type' => 'integer', 'null' => false, 'default' => '0', 'collate' => NULL, 'comment' => ''),
		'dependencia_orig_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => array('id', 'usuario'), 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1)),
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
			'dependencia_id' => 1,
			'usuario' => 'Lorem ipsum dolor sit amet',
			'clave' => 'Lorem ipsum dolor sit amet',
			'created' => 1462388829,
			'modified' => 1462388829,
			'nivel' => 1,
			'email' => 'Lorem ipsum dolor sit amet',
			'enlinea' => 1,
			'entrada_actualizada' => 1462388829,
			'activo' => 1,
			'nombre_completo' => 'Lorem ipsum dolor sit amet',
			'cedula_identidad' => 1,
			'dependencia_orig_id' => 1
		),
	);
}
