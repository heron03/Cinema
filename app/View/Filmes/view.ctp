<?php
$form = $this->Html->tag('h2', 'Nome');
$form .= $this->Html->para('', $this->request->data['Filme']['nome']);
$form .= $this->Html->tag('h2', 'Duração');
$form .= $this->Html->para('', $this->request->data['Filme']['duracao']);
$form .= $this->Html->tag('h2', 'Idioma');
$form .= $this->Html->para('', $this->request->data['Filme']['idioma']);
$form .= $this->Html->tag('h2', 'Ano');
$form .= $this->Html->para('', $this->request->data['Filme']['ano']);

$form .= $this->Html->tag('h2', 'Críticas');
foreach ($this->request->data['Critica'] as $critica) {
    $criticas = $critica['nome'] . ' - ' . date('d/m/Y', strtotime($critica['data_avaliacao'])) . ' - Avaliação: ' . $critica['avaliacao'];
    $form .= $this->Html->para('', $criticas);
}

$form .= $this->Html->tag('h2', 'Atores');
foreach ($this->request->data['Ator'] as $ator) {
    $atores = $ator['nome'] . ' - ' . date('d/m/Y', strtotime($ator['nascimento']));
    $form .= $this->Html->para('', $atores);
}


$form .= $this->Js->link('Voltar', '/filmes', array('class' => 'btn btn-secondary ml-3', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Visualizar Filme');
echo $form;
$this->Js->buffer('$(".form-error").addClass("is-invalid");');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}