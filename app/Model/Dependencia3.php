<?php
class Dependencia3 extends AppModel {
	var $name = 'Dependencia3';
	var $useTable = 'dependencias';
	var $validate = array(
		'denominacion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'gaceta_registro' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'actividad' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo_dependencia' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
/*
	var $hasOne = array(
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'dependencia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);*/

	var $belongsTo = array(
		'Institucione' => array(
			'className' => 'Institucione',
			'foreignKey' => 'institucion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $virtualFields = array('codigo_dependencia_deno'=>"Dependencia3.id||' - '||Dependencia3.denominacion");
}
?>