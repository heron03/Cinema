<?php

$form = $this->Form->create('Jogo');
$form .= $this->Form->hidden('Jogo.id');
$form .= $this->Form->input('Jogo.nome', array('required' => false, ));
$form .= $this->Form->input('Jogo.preco', array('required' => false, ));
$form .= $this->Form->input('Jogo.quantidade', array('required' => false, ));
$form .= $this->Form->input('Jogo.plataforma', array('required' => false, ));
$form .= $this->Form->input('Jogo.marca', array('required' => false, ));
$form .= $this->Form->end('Gravar');
$voltarLink = $this->Html->link('Voltar', '/jogos');

echo $this->Html->tag('h1', 'Alterar o Jogo');
echo $form;
echo $voltarLink;