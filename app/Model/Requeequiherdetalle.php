<?php
App::uses('AppModel', 'Model');
/**
 * Requeequiherdetalle Model
 *
 * @property Requeequiherproducto $Requeequiherproducto
 */
class Requeequiherdetalle extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'numero_requerimiento';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'numero_requerimiento' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha_requerimiento' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'serviciosrealizado_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)


	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

public $belongsTo = array(
		'Serviciosrealizado' => array(
			'className' => 'Serviciosrealizado',
			'foreignKey' => 'serviciosrealizado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Area' => array(
			'className' => 'Area',
			'foreignKey' => 'area_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		,
		'Gerente' => array(
			'className' => 'Usuario',
			'foreignKey' => 'gerente_id',
			'conditions' => '',
			'fields' => 'Usuario, nombre_completo',
			'order' => ''
		),
		'Solicitada' => array(
			'className' => 'Usuario',
			'foreignKey' => 'solicitada_id',
			'conditions' => '',
			'fields' => 'Usuario, nombre_completo',
			'order' => ''
		),
		'Statuse' => array(
			'className' => 'Status',
			'foreignKey' => 'statuse_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Requeequiherproducto' => array(
			'className' => 'Requeequiherproducto',
			'foreignKey' => 'requeequiherdetalle_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
