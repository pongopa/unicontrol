<?php
App::uses('AppModel', 'Model');
/**
 * Ordencompra Model
 *
 * @property Ordencomprastipo $Ordencomprastipo
 * @property Serviciosrealizado $Serviciosrealizado
 * @property Proveedore $Proveedore
 * @property Proveedoresvendedore $Proveedoresvendedore
 * @property Proveedoresbanco $Proveedoresbanco
 * @property Ordencomprasproducto $Ordencomprasproducto
 */
class Ordencompra extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'numero_orden_compra';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ano_orden_compra' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'numero_orden_compra' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha_orden_compra' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ordencomprastipo_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'area_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
		),
		'proveedore_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'proveedoresvendedore_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'formaentrega_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'formapago_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'condicionpago_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cotizacion_referencia' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ordencomprastipo' => array(
			'className' => 'Ordencomprastipo',
			'foreignKey' => 'ordencomprastipo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Serviciosrealizado' => array(
			'className' => 'Serviciosrealizado',
			'foreignKey' => 'serviciosrealizado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Proveedore' => array(
			'className' => 'Proveedore',
			'foreignKey' => 'proveedore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Proveedoresvendedore' => array(
			'className' => 'Proveedoresvendedore',
			'foreignKey' => 'proveedoresvendedore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Proveedoresbanco' => array(
			'className' => 'Proveedoresbanco',
			'foreignKey' => 'proveedoresbanco_id',
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
		'Condicionpago' => array(
			'className' => 'Condicionpago',
			'foreignKey' => 'condicionpago_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Formapago' => array(
			'className' => 'Formapago',
			'foreignKey' => 'formapago_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Formaentrega' => array(
			'className' => 'Formaentrega',
			'foreignKey' => 'formaentrega_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Administrador' => array(
			'className' => 'Usuario',
			'foreignKey' => 'administrador_id',
			'conditions' => '',
			'fields' => 'Usuario',
			'order' => ''
		)

	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Ordencomprasproducto' => array(
			'className' => 'Ordencomprasproducto',
			'foreignKey' => 'ordencompra_id',
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
