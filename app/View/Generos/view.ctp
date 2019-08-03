<?php
$form = $this->Html->tag('h2', 'Nome');
$form .= $this->Html->para('', $this->request->data['Genero']['nome']);


$form .= $this->Html->tag('h2', 'Filmes');
foreach ($this->request->data['Filme'] as $filme) {
    $filmes = $filme['nome'] ;
    $form .= $this->Html->para('', $filmes);
}

$form .= $this->Js->link('Voltar', '/generos', array('class' => 'btn btn-secondary ml-3', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Visualizar Genero');
echo $form;
$this->Js->buffer('$(".form-error").addClass("is-invalid");');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}