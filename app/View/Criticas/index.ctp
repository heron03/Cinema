<?php
$this->extend('/Common/index');

$this->assign('title', 'Criticas');

$searchFields .= $this->Form->input('Critica.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'div' => false,
    'placeholder' => 'Nome...'
));

$this->assign('searchFields', $searchFields);

$nomeSort = $this->Paginator->sort('Critica.nome', 'Nome');
$avaliacaoSort = $this->Paginator->sort('Critica.avaliacao', 'Avaliacao');
$titulos = array($nomeSort, $avaliacaoSort, 'Acoes');
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos), array('class' => 'thead-light'));
$this->assign('tableHeaders', $tableHeaders);

$detalhe = array();
foreach ($criticas as $critica) {
    $editLink = $this->Js->link($this->Html->tag('span', '&#xe3c9;', array('class' => 'material-icons')), '/criticas/edit/' . $critica['Critica']['id'], array('update' => '#content', 'escape' => false));
    $deleteLink = $this->Js->link($this->Html->tag('span', '&#xe872;', array('class' => 'material-icons')), '/criticas/delete/' . $critica['Critica']['id'] , array('update' => '#content', 'escape' => false));
    $viewLink = $this->Js->link($critica['Critica']['nome'], '/criticas/view/' . $critica['Critica']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink, 
        $critica['Critica']['avaliacao'],
        date('d/m/Y', strtotime($critica['Critica']['data_avaliacao'])),
        $critica['Filme']['nome'],
        $editLink . ' ' . $deleteLink
    );
}

$tableCells = $this->Html->tableCells($detalhe);
$this->assign('tableCells', $tableCells);