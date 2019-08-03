<?php
$form = $this->Form->create('Genero');
$form .= $this->Form->hidden('Genero.id');
$form .= $this->Html->div('form-row',
	$this->Form->input('Genero.nome', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control', 
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);
$form .= $this->Js->submit('Gravar', array('type' => 'submit', 'class' => 'btn btn-success', 'div' => false, 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/Generos', array('class' => 'btn btn-secondary ml-3', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Alterar Genero');
echo $form;
$this->Js->buffer('$(".form-error").addClass("is-invalid");');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
