<?php
App::uses('AppModel', 'Model');
/**
 * Cliente Model
 *
 * @property Rubro $Rubro
 * @property Condicionpago $Condicionpago
 * @property Clientesbanco $Clientesbanco
 * @property Clientesformapago $Clientesformapago
 * @property Clientesrubro $Clientesrubro
 * @property Clientesvendedore $Clientesvendedore
 */
class Cliente extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre_comercial';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ruc' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'razon_social' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombre_comercial' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha_de_inscripcion' => array(
			'date' => array(
				'rule' => array('date'),
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
		'estadocontribuyente_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'dias_pago' => array(
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
		'Condicionpago' => array(
			'className' => 'Condicionpago',
			'foreignKey' => 'condicionpago_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Estadocontribuyente' => array(
			'className' => 'Estadocontribuyente',
			'foreignKey' => 'estadocontribuyente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AddUsuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'add_usuario_id',
			'conditions' => '',
			'fields' => 'usuario',
			'order' => ''
		),
        'ModUsuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'mod_usuario_id',
			'conditions' => '',
			'fields' => 'usuario',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Clientesbanco' => array(
			'className' => 'Clientesbanco',
			'foreignKey' => 'cliente_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Clientesformapago' => array(
			'className' => 'Clientesformapago',
			'foreignKey' => 'cliente_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Clientesvendedore' => array(
			'className' => 'Clientesvendedore',
			'foreignKey' => 'cliente_id',
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
		,
		'Clientesucursa' => array(
			'className' => 'Clientesucursa',
			'foreignKey' => 'cliente_id',
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
