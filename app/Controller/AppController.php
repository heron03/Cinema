<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package     app.Controller
 * @link        https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $layout = 'bootstrap';
    public $helpers = array('Js' => array('Jquery'), 'Pdf.Report', 'Pdf.Document');
    public $components = array(
        'Flash',
        'RequestHandler',
        'Session',
        'Auth' => array(
            'flash' => array('element' => 'bootstrap', 'params' => array('key' => 'warning'), 'key' => 'warning'),
            'authError' => 'Você não possui permissão para acessar essa operação.',
            'loginAction' => '/login',
            'loginRedirect' => '/',
            'logoutRedirect' => '/login',
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'Usuario',
                    'fields' => array('username' => 'login', 'password' => 'senha'),
                    'passwordHasher' => array('className' => 'Simple', 'hashType' => 'sha256')
                )
            ),
            'authorize' => array('Crud' => array('userModel' => 'Usuario'))
        ),  
        'Acl'
    );
    public function beforeFilter() {
        $this->Auth->mapActions(['read' => ['report']]);
    }

    public function index() {
        $this->setPaginateConditions();
        try {
            $this->set($this->getControllerName(), $this->paginate());        
        } catch (NotFoundException $e) {
            $this->redirect('/' . $this->getControllerName());
        }        
    }
        public function add() {
        if (!empty($this->request->data)) {
            $this->{$this->getModelName()}->create();
            if ($this->{$this->getModelName()}->save($this->request->data)) {
                $this->Flash->bootstrap('Gravado com sucesso!', array('key' => 'success'));
                $this->redirect('/' . $this->getControllerName());
            }
        }
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->{$this->getModelName()}->save($this->request->data)) {
                $this->Flash->bootstrap('Alterado com sucesso!', array('key' => 'success'));
                $this->redirect('/' . $this->getControllerName());
            }
        } else {
            $this->request->data = $this->getEditData($id);
        }
    }

    public function view($id = null) {
        $this->request->data = $this->getEditData($id);
    }

    public function delete($id) {
        $this->{$this->getModelName()}->delete($id);
        $this->Flash->bootstrap('Excluído com sucesso!', array('key' => 'warning'));
        $this->redirect('/' . $this->getControllerName());
    }

     public function report() {
        $this->layout = false;
        $this->response->type('pdf');
        $this->set($this->getControllerName(), $this->paginate());        
    }
    public function getControllerName() {
        return $this->request->params['controller'];
    }

    public function getModelName() {
        return $this->modelClass;
    }

    public function setFilmes() {
        $filme = ClassRegistry::init('Filme');
        $this->set('filmes', $filme->find('list', array('fields' => array('Filme.id', 'Filme.nome'))));
    }
    public function setAtors() {
        $ators = ClassRegistry::init('Ator');
        $this->set('ators', $ators->find('list', array('fields' => array('Ator.id', 'Ator.nome'))));
    }
    public function setGeneros() {
        $generos = ClassRegistry::init('Genero');
        $this->set('generos', $generos->find('list', array('fields' => array('Genero.id', 'Genero.nome'))));
    }
}