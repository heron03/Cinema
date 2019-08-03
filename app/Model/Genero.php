<?php
App::uses('AppModel', 'Model');

class Genero extends AppModel {
	public $hasMany = array(
        'Filme'
    );
	public $validate = array(
        'nome' => array('rule' => 'notBlank', 'message' => 'Informe o nome, please'),
    );
}
?>