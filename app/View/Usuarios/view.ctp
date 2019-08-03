<?php
$form = $this->Html->tag('h2', 'Nome');
$form .= $this->Html->para('', $this->request->data['Usuario']['nome']);
$form = $this->Html->tag('h2', 'Login');
$form .= $this->Html->para('', $this->request->data['Usuario']['login']);
$form .= $this->Html->tag('h2', 'Senha');
$form .= $this->Html->para('', $this->request->data['Usuario']['senha']);


$form .= $this->Js->link('Voltar', '/usuarios', array('class' => 'btn btn-secondary ml-3', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Visualizar Usuario');

echo $form;
$this->Js->buffer('$(".form-error").addClass("is-invalid");');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}