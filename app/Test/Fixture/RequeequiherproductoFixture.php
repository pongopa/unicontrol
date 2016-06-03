<?php
/* Requeequiherproducto Fixture generated on: 2016-05-03 21:27:04 : 1462327024 */

/**
 * RequeequiherproductoFixture
 *
 */
class RequeequiherproductoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'requeequiherdetalle_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'cantidad' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '22,6', 'collate' => NULL, 'comment' => ''),
		'productos_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
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
			'requeequiherdetalle_id' => 1,
			'cantidad' => 1,
			'productos_id' => 1
		),
	);
}
