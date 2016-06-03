<?php
App::uses('AppModel', 'Model');
/**
 * Formaentrega Model
 *
 * @property Ordencompra $Ordencompra
 */
class Formaentrega extends AppModel {
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Ordencompra' => array(
			'className' => 'Ordencompra',
			'foreignKey' => 'formaentrega_id',
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
