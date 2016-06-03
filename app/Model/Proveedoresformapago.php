<?php
App::uses('AppModel', 'Model');
/**
 * Proveedoresformapago Model
 *
 * @property Proveedore $Proveedore
 * @property Formapago $Formapago
 */
class Proveedoresformapago extends AppModel {
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
		'Formapago' => array(
			'className' => 'Formapago',
			'foreignKey' => 'formapago_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
