<?php

    include_once("conexao.php");
    include_once("class/Produto.php");
    include_once("class/ProdutoDao.php");

    $id_produto = $_POST['id_produto'];
    $nome_produto = $_POST['nome_produto'];
    $valor_produto = $_POST['valor_produto'];
    $qtd_produto = $_POST['qtd_produto'];

    $novoProduto = new Produto($nome_produto,$valor_produto,$qtd_produto);
    $novoProduto->setId($id_produto);
    $produtoDao = new ProdutoDao($conn);
    
    $produtoDao->alteraProduto($novoProduto);