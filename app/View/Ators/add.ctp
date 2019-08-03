<?php
$form = $this->Form->create('Ator');
$form .= $this->Html->div('form-row',
    $this->Form->input('Ator.nome', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
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
$form .= $this->Form->select('Filme.Filme', $options, array(
    'multiple' => 'checkbox'
));




$form .= $this->Js->submit('Gravar', array('type' => 'submit', 'class' => 'btn btn-success', 'div' => false, 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/ators', array('class' => 'btn btn-secondary ml-3', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Novo Ator');
echo $form;
$this->Js->buffer('$(".form-error").addClass("is-invalid");');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
