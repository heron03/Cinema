<?php
class JogoTest extends CakeTestCase {

    public $fixtures = array('app.Jogo');
    public $Jogo = null;

    public function setUp() {
        $this->Jogo = ClassRegistry::init('Jogo');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Jogo, 'Jogo'));
    }

    public function testNomeEmpty() {
        $data = array('Jogo' => array('nome' => null));
        $saved = $this->Jogo->save($data);
        $this->assertFalse($saved);
    }
    public function testPrecoEmpty() {
        $data = array('Jogo' => array('preco' => null));
        $saved = $this->Jogo->save($data);
        $this->assertFalse($saved);
    }    

    public function testQuantidadeEmpty() {
        $data = array('Jogo' => array('quantidade' => null));
        $saved = $this->Jogo->save($data);
        $this->assertFalse($saved);
    }

    public function testMarcaEmpty() {
        $data = array('Jogo' => array('marca' => null));
        $saved = $this->Jogo->save($data);
        $this->assertFalse($saved);
    }


}
?>