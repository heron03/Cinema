<?php
$form = $this->Html->tag('h2', 'Nome');
$form .= $this->Html->para('', $this->request->data['Critica']['nome']);
$form .= $this->Html->tag('h2', 'Avaliação');
$form .= $this->Html->para('', $this->request->data['Critica']['avaliacao']);
$form .= $this->Html->tag('h2', 'Data da Critica');
$form .= $this->Html->para('', $this->request->data['Critica']['data_avaliacao']);
$form .= $this->Html->tag('h2', 'Filme');
$form .= $this->Html->para('', $this->request->data['Filme']['nome']);

$form .= $this->Js->link('Voltar', '/criticas', array('class' => 'btn btn-secondary ml-3', 'update' => '#content'));
$form .= $this->Form->end();


echo $this->Html->tag('h1', 'Visualizar Critica');
echo $form;
$this->Js->buffer('$(".form-error").addClass("is-invalid");');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}