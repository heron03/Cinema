<?php
class CriticaTest extends CakeTestCase {

    public $fixtures = array('app.critica');
    public $Critica = null;

    public function setUp() {
        $this->Critica = ClassRegistry::init('Critica');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Critica, 'Critica'));
    }
    public function testavaliacaoEmpty() {
        $data = array('Critica' => array('avaliacao' => null));
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);
    }


}
?>