<?php
App::uses('AppModel', 'Model');
/**
 * Proveedore Model
 *
 * @property Rubro $Rubro
 * @property Condicionpago $Condicionpago
 * @property Proveedoresrubro $Proveedoresrubro
 */
class Proveedore extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'razon_social';
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
		'direccion' => array(
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
		'referencia' => array(
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
		'conf_provincia_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo requerido',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'conf_distrito_id' => array(
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
		),
		'ConfProvincia' => array(
			'className' => 'ConfProvincia',
			'foreignKey' => 'conf_provincia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ConfDistrito' => array(
			'className' => 'ConfDistrito',
			'foreignKey' => 'conf_distrito_id',
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
		'Proveedoresrubro' => array(
			'className' => 'Proveedoresrubro',
			'foreignKey' => 'proveedore_id',
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
		'Proveedoresbanco' => array(
			'className' => 'Proveedoresbanco',
			'foreignKey' => 'proveedore_id',
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
		'Proveedoresvendedore' => array(
			'className' => 'Proveedoresvendedore',
			'foreignKey' => 'proveedore_id',
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
