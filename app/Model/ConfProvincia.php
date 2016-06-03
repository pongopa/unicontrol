<?php
App::uses('AppModel', 'Model');
/**
 * ConfProvincia Model
 *
 * @property ConfPai $ConfPai
 * @property ConfDepartamento $ConfDepartamento
 */
class ConfProvincia extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'denominacion';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'conf_pai_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'conf_departamento_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'denominacion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ConfPai' => array(
			'className' => 'ConfPai',
			'foreignKey' => 'conf_pai_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ConfDepartamento' => array(
			'className' => 'ConfDepartamento',
			'foreignKey' => 'conf_departamento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
