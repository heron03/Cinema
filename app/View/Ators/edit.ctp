<?php
$this->extend('/Common/form');

$this->assign('title', 'Alterar Ator');


$formFields = $this->element('formCreate');
$formFields .= $this->Form->hidden('Ator.id');
$formFields .= $this->Html->div('form-row',
    $this->Form->input('Ator.nome', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),

    )) .
    $this->Form->input('Ator.nascimento', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'type' => 'text',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);
$options = array(
    'options' => $filmes
);
$formFields .= $this->Form->select('Filme.Filme', $options, array(
    'multiple' => 'checkbox'
));


$this->assign('formFields', $formFields);
