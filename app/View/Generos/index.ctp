<?php
$this->extend('/Common/index');

$this->assign('title', 'Generos');



$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);


$searchFields .= $this->Form->input('Genero.nome', array('required' => false,
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));
$this->assign('searchFields', $searchFields);

$nomeSort = $this->Paginator->sort('Genero.nome', 'Nome');
$titulos = array($nomeSort);
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'thead-light'));
$this->assign('tableHeaders', $tableHeaders);


$detalhe = array();
foreach ($generos as $genero) {
    $editLink = $this->Js->link($this->Html->tag('span', '&#xe3c9;', array('class' => 'material-icons')), '/generos/edit/' . $genero['Genero']['id'], array('update' => '#content', 'escape' => false));
    $deleteLink = $this->Js->link($this->Html->tag('span', '&#xe872;', array('class' => 'material-icons')), '/generos/delete/' . $genero['Genero']['id'], array('update' => '#content', 'escape' => false));
    $viewLink = $this->Js->link($genero['Genero']['nome'], '/Generos/view/' . $genero['Genero']['id'], array('update' => '#content', 'escape' => false));
    $detalhe[] = array(
        $viewLink, 
        $editLink . '' . $deleteLink
    );
}



$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);
