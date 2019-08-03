<?php
App::uses('AppModel', 'Model');

class Jogo extends AppModel{

	public $validate = array(
        'nome' => array('rule' => 'notBlank', 'message' => 'Informe o nome, please'),
        'preco' => array('rule' => 'notBlank', 'message' => 'Informe o preço, please'),
        'quantidade' => array('rule' => 'notBlank', 'message' => 'Informe o quantidade, please'),
        'plataforma' => array('rule' => 'notBlank', 'message' => 'Informe o plataforma, please'),
        'marca' => array('rule' => 'notBlank', 'message' => 'Informe o marca, please')
    );

}
?>