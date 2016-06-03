<?php
App::uses('AppModel', 'Model');
/**
 * Proveedoresbanco Model
 *
 * @property Proveedore $Proveedore
 * @property Banco $Banco
 */
class Proveedoresbanco extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'cuenta_bancaria';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'banco_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cuenta_bancaria' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tipo_moneda' => array(
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
		'Proveedore' => array(
			'className' => 'Proveedore',
			'foreignKey' => 'proveedore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Banco' => array(
			'className' => 'Banco',
			'foreignKey' => 'banco_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Moneda' => array(
			'className' => 'Moneda',
			'foreignKey' => 'moneda_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

var $virtualFields = array('cuenta_full'=>"CONCAT((select a.denominacion from bancos AS a where a.id=Proveedoresbanco.banco_id),' - ',(select b.denominacion from monedas AS b where b.id=Proveedoresbanco.moneda_id),' - ',Proveedoresbanco.cuenta_bancaria)");




}
