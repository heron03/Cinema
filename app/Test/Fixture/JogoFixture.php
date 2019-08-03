<?php
class JogoFixture extends CakeTestFixture {
    
    public $name = 'Jogo';
    public $import = array('model' => 'Jogo', 'records' => false);

    public function init() {
        $this->records = array(
            array('nome' => 'Gta', 'preco' => '200', 'quantidade' => '50', 'marca' => 'Rockstar', 'plataforma' => 'Ps4')
        );
        parent::init();
    }

}
?>