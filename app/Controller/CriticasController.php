<?php
App::uses('AppController', 'Controller');

class CriticasController extends AppController {

     public $paginate = array(
        'fields' => array('Critica.id', 'Critica.nome', 'Critica.avaliacao', 'Critica.data_avaliacao', 'Filme.nome'),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Critica.nome' => 'asc')    
    );

             
    public function setPaginateConditions(){
        $nome='';
        if ($this->request->is('post')){
            $nome = $this->request->data['Critica']['nome'];
            $this->Session->write('Critica.nome', $nome);
        }else {
            $nome = $this->Session->read('Critica.nome');
            $this->request->data('Critica.nome', $nome);
        }
            if (!empty($nome)){
                $this->paginate['conditions']['Critica.nome LIKE'] = '%' . trim($nome) . '%';
            }
    }

    public function add() {
        parent::add();
        $this->setFilmes();
    }

    public function edit($id = null) {
        parent::edit($id);
        $this->setFilmes();        
    }

    public function getEditData($id) {
        $fields = array('Critica.id', 'Critica.nome', 'Critica.avaliacao', 'Critica.data_avaliacao', 'Filme.nome');
        $conditions = array('Critica.id' => $id);
        $critica = $this->Critica->find('first', compact('fields', 'conditions'));
        return $critica;
    }

    public function view($id = null) {
        parent::view($id);
        $this->setFilmes();
    }

}
