<?php
App::uses('AppController', 'Controller');

class JogosController extends AppController{
	
	public function index() {
	
		$fields = array('Jogo.id','Jogo.nome', 'Jogo.preco', 'Jogo.quantidade', 'Jogo.marca', 'Jogo.plataforma');
		$order = array('Jogo.nome' => 'desc');
		$group = array();

		$jogos = $this->Jogo->find('all', compact('fields', 'order', 'conditions'));


		$this->set('jogos', $jogos);

	}
	public function view($id = null) {
        $fields = array('Jogo.id', 'Jogo.nome', 'Jogo.preco', 'Jogo.quantidade', 'Jogo.marca', 'Jogo.plataforma');
        $conditions = array('Jogo.id' => $id);
        $this->request->data = $this->Jogo->find('first', compact('fields', 'conditions'));
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Jogo->save($this->request->data)) {
                $this->Flash->set('Jogo alterado com sucesso!');
                $this->redirect('/jogos');
            }
        } else {
            $fields = array('Jogo.id', 'Jogo.nome', 'Jogo.preco', 'Jogo.quantidade', 'Jogo.marca', 'Jogo.plataforma');
            $conditions = array('Jogo.id' => $id);
            $this->request->data = $this->Jogo->find('first', compact('fields', 'conditions'));
        }
	}

	public function delete($id) {
        $this->Jogo->delete($id);
        $this->Flash->set('Jogo excluído com sucesso!');
        $this->redirect('/jogos');
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Jogo->create();
            if ($this->Jogo->save($this->request->data)) {
                $this->Flash->set('Jogo gravado com sucesso!');
                $this->redirect('/jogos');
            }
        }

    }
}