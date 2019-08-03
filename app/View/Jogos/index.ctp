<?php
$detalhe = array();
foreach ($jogos as $jogo) {
	$editLink = $this->Html->link('Editar', '/jogos/edit/' . $jogo['Jogo']['id']);
	$deleteLink = $this->Html->link('Excluir', '/jogos/delete/' . $jogo['Jogo']['id']);
	$viewLink = $this->Html->link($jogo['Jogo']['nome'], '/jogos/view/' . $jogo['Jogo']['id']);
    $detalhe[] = array(
        $viewLink,
        $jogo['Jogo']['preco'], 
        $jogo['Jogo']['quantidade'], 
        $jogo['Jogo']['marca'], 
        $jogo['Jogo']['plataforma'],
        $editLink .' '. $deleteLink

    );
}

echo $this->Html->tag('h1', 'Jogos');

$titulos = array('Nome', 'Preco', 'Quantidade', 'Marca', 'Plataforma');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/jogos/add');

echo $novoButton;
echo $this->Html->tag('table', $header . $body);
?>