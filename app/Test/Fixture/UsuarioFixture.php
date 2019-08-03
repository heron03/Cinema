<?php
class UsuarioFixture extends CakeTestFixture {
    
    public $name = 'Usuario';
    public $import = array('model' => 'Usuario', 'records' => false);

    public function init() {
        $this->records = array(
            array('id' => 1, 'nome' => 'opa', 'login' => 'opa', 'senha' => 'faec568b09c40854aabcb1d901c3cedc4a1540e107998c34beea5ed3ede8bde0', 'aro_parent_id' => '6')
        );
        parent::init();
    }

}
?>