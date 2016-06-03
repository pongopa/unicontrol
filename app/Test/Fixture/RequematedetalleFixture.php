<?php
/* Requematedetalle Fixture generated on: 2016-05-03 21:28:20 : 1462327100 */

/**
 * RequematedetalleFixture
 *
 */
class RequematedetalleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'numero_requerimiento' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'unique', 'collate' => NULL, 'comment' => ''),
		'fecha_requerimiento' => array('type' => 'date', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'fecha_salida' => array('type' => 'date', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'area_1' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'area_2' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'departamento' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 400, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'centro_costo' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 400, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'solicitada_por' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 400, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'fecha_solicitada_por' => array('type' => 'date', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'hora_solicitada_por' => array('type' => 'time', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'revisado_por_1' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 400, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'fecha_revisado_por_1' => array('type' => 'date', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'hora_revisado_por_1' => array('type' => 'time', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'revisado_por_2' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 400, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'fecha_revisado_por_2' => array('type' => 'date', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'hora_revisado_por_2' => array('type' => 'time', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'servicio' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'actividad' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'lugar_entrega' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'nota' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'id' => array('column' => 'id', 'unique' => 1), 'unique' => array('column' => 'numero_requerimiento', 'unique' => 1)),
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
			'numero_requerimiento' => 1,
			'fecha_requerimiento' => '2016-05-03',
			'fecha_salida' => '2016-05-03',
			'area_1' => 'Lorem ipsum dolor sit amet',
			'area_2' => 'Lorem ipsum dolor sit amet',
			'departamento' => 'Lorem ipsum dolor sit amet',
			'centro_costo' => 'Lorem ipsum dolor sit amet',
			'solicitada_por' => 'Lorem ipsum dolor sit amet',
			'fecha_solicitada_por' => '2016-05-03',
			'hora_solicitada_por' => '21:28:20',
			'revisado_por_1' => 'Lorem ipsum dolor sit amet',
			'fecha_revisado_por_1' => '2016-05-03',
			'hora_revisado_por_1' => '21:28:20',
			'revisado_por_2' => 'Lorem ipsum dolor sit amet',
			'fecha_revisado_por_2' => '2016-05-03',
			'hora_revisado_por_2' => '21:28:20',
			'servicio' => 'Lorem ipsum dolor sit amet',
			'actividad' => 'Lorem ipsum dolor sit amet',
			'lugar_entrega' => 'Lorem ipsum dolor sit amet',
			'nota' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);
}
