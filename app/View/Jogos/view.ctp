<?php

$view = $this->Html->tag('h2', 'Nome');
$view .= $this->Html->para('', $this->request->data['Jogo']['nome']);
$view .= $this->Html->tag('h2', 'Preço');
$view .= $this->Html->para('', $this->request->data['Jogo']['preco']);
$view .= $this->Html->tag('h2', 'Quantidade');
$view .= $this->Html->para('', $this->request->data['Jogo']['quantidade']);
$view .= $this->Html->tag('h2', 'Marca');
$view .= $this->Html->para('', $this->request->data['Jogo']['marca']);
$view .= $this->Html->tag('h2', 'Plataforma');
$view .= $this->Html->para('', $this->request->data['Jogo']['plataforma']);
$voltarLink = $this->Html->link('Voltar', '/jogos');

echo $this->Html->tag('h1', 'Visualizar o Jogo');
echo $view;
echo $voltarLink;
?>