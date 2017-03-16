<?php

    include_once("conexao.php");
    include_once("class/Produto.php");
    include_once("class/ProdutoDao.php");

    $nome_produto = $_POST['nome_produto'];
    $valor_produto = $_POST['valor_produto'];
    $qtd_produto = $_POST['qtd_produto'];

    $novoProduto = new Produto($nome_produto,$valor_produto,$qtd_produto);
    $produtoDao = new ProdutoDao($conn);

    $produtoDao->cadastroProduto($novoProduto);