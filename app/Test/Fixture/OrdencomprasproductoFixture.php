<?php
/* Ordencomprasproducto Fixture generated on: 2016-05-03 23:13:27 : 1462333407 */

/**
 * OrdencomprasproductoFixture
 *
 */
class OrdencomprasproductoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'ordencompra_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'cantidad' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '22,6', 'collate' => NULL, 'comment' => ''),
		'producto_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'precio_unitario' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '26,4', 'collate' => NULL, 'comment' => ''),
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
			'ordencompra_id' => 1,
			'cantidad' => 1,
			'producto_id' => 1,
			'precio_unitario' => 1
		),
	);
}
