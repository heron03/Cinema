<?php
$this->extend('/Common/index');

$this->assign('title', 'Usuarios');





$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);







$searchFields .= $this->Form->input('Usuario.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));
$this->assign('searchFields', $searchFields);

$detalhe = array();
foreach ($usuarios as $usuario) {
    $editLink = $this->Js->link('Alterar', '/usuarios/edit/' . $usuario['Usuario']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/usuarios/delete/' . $usuario['Usuario']['id'], array('update' => '#content', 'confirm' => 'Tem certeza?'));
    $viewLink = $this->Js->link($usuario['Usuario']['nome'], '/usuarios/view/' . $usuario['Usuario']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        $editLink . ' ' . $deleteLink 
    );
}



$titulos = array('Nome', '');
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'thead-light'));
$this->assign('tableHeaders', $tableHeaders);

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);