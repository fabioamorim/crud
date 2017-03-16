<?php
    include_once("conexao.php");
    include_once("class/ProdutoDao.php");

    $produtoDao = new ProdutoDao($conn);

    $id_produto = $_POST['id_produto'];

    $produtoDao->deleteProduto($id_produto);
     