<?php
App::uses('AppController', 'Controller');

class FilmesController extends AppController {

    public $paginate = array(
        'fields' => array('Filme.id', 'Filme.nome','Filme.ano', 'Genero.nome'),
        'conditions' => array(),
        'limit' => 10,
        'order' => array('Filme.nome' => 'asc')    
    );
     public function setPaginateConditions() {
        $nome = '';
        if ($this->request->is('post')) {
            $nome = $this->request->data['Filme']['nome'];
            $this->Session->write('Filme.nome', $nome);
        } else {
            $nome = $this->Session->read('Filme.nome');
            $this->request->data('Filme.nome', $nome);
        }
        if (!empty($nome)) {
            $this->paginate['conditions']['Filme.nome LIKE'] = '%' . trim($nome) . '%';
        }
    }

    public function add() {
        parent::add();
        $this->setGeneros();
        $this->setAtors();     
    }

    public function edit($id = null) {
       parent::edit($id);
        $this->setGeneros();
        $this->setAtors();        
    }

    public function getEditData($id) {
        $fields = array('Filme.id', 'Filme.nome','Filme.ano', 'Filme.duracao', 'Filme.idioma',  'Genero.nome');
        $conditions = array('Filme.id' => $id);
        $filmes = $this->Filme->find('first', compact('fields', 'conditions'));
        return $filmes;
    }

    public function view($id = null) {
       parent::edit($id);
        $this->setGeneros();
    }

}
