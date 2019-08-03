<?php
class GeneroTest extends CakeTestCase {

    public $fixtures = array('app.genero');
    public $Genero = null;

    public function setUp() {
        $this->Genero = ClassRegistry::init('Genero');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Genero, 'Genero'));
    }
     public function testNomeEmpty() {
        /** preparacao */
        $data = array('Genero' => array('nome' => null));
       
        /** execucao */
        $saved = $this->Genero->save($data);
        
        /** checagem / teste */
        $this->assertFalse($saved);
    }
}
?>