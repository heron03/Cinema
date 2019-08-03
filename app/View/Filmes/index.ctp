<?php
$this->extend('/Common/index');

$this->assign('title', 'Filmes');


$searchFields .= $this->Form->input('Filme.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));

$this->assign('searchFields', $searchFields);

$nomeSort = $this->Paginator->sort('Filme.nome', 'Nome');
$anoSort = $this->Paginator->sort('Filme.ano', 'Ano');
$titulos = array($nomeSort, $anoSort, 'Acoes');
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'thead-light'));
$this->assign('tableHeaders', $tableHeaders);

$detalhe = array();
foreach ($filmes as $filme) {
    $editLink = $this->Js->link($this->Html->tag('span', '&#xe3c9;', array('class' => 'material-icons')), '/filmes/edit/' . $filme['Filme']['id'], array('update' => '#content', 'escape' => false));
    $deleteLink = $this->Js->link($this->Html->tag('span', '&#xe872;', array('class' => 'material-icons')), '/filmes/delete/' . $filme['Filme']['id'], array('update' => '#content', 'escape' => false));
    $viewLink = $this->Js->link($filme['Filme']['nome'], '/filmes/view/' . $filme['Filme']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        $filme['Filme']['ano'],
        $filme['Genero']['nome'],
        $editLink . ' ' . $deleteLink
    );
}



$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
