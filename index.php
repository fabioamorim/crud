<?php
    include_once("carrega-classe.php");
    include_once("conexao.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD com PHP e MYSQL</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">                
                    <h1 class="text-center">CRUD - Create, Read, Update, Delete</h2> 
                    <h4 class="text-center">Lista de produtos</h4>
                    <div class="scroll">
                        <table class="table table-bordered">
                            <thead>
                                <tr >
                                    <th>NOME</th>
                                    <th>VALOR</th>
                                    <th>QUANTIDADE</th>
                                    <th>ALTERAR</th>
                                    <th>DELETAR</th>
                                </tr>
                            </thread>
                        <?php
                            $produtoDao = new ProdutoDao($conn);
                            $produtos = $produtoDao->listaProdutos();

                            foreach($produtos as $produto):    
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $produto->getNome() ?></td>
                                    <td><?= $produto->getValor() ?></td>
                                    <td><?= $produto->getQtd() ?></td>

                                    <td>
                                        <form method=post action="index.php">
                                            <input type="hidden" name="id_produto" value="<?= $produto->getId() ?>"/>
                                            <input type="hidden" name="nome_produto" value="<?= $produto->getNome() ?>"/>
                                            <input type="hidden" name="valor_produto" value="<?= $produto->getValor() ?>"/>
                                            <input type="hidden" name="qtd_produto" value="<?= $produto->getQtd() ?>"/>
                                            <button class="btn btn-primary" >ALTERAR</button>
                                       </form>     
                                    </td>

                                    <td>
                                        <form method=post action="deleta-produto.php">
                                            <input type="hidden" name="id_produto" value="<?= $produto->getId() ?>"/>
                                            <button  class="btn btn-danger">DELETAR</button>
                                        </form>
                                    </td>                                    
                                <tr>
                            </tbody>
                            <?php
                            endforeach    
                            ?>
                        </table>
                    </div>

                <h4 class="text-center">Formulário de produto</h4>
                <?php

                    $id_produto ="";
                    $nome_produto = "";
                    $valor_produto = "";
                    $qtd_produto="";
                    $path = "";

                    if(isset($_POST['id_produto'])){

                        $id_produto =$_POST['id_produto'];
                        $nome_produto = $_POST['nome_produto'];
                        $valor_produto = $_POST['valor_produto'];
                        $qtd_produto = $_POST['qtd_produto'];

                        $path = "altera-usuario.php";
                    }else{
                        $path = "cadastro-usuario.php";
                    }                    
                ?>

                <form method=post action="<?=$path?>">

                    <input type="hidden" name="id_produto" value="<?= $id_produto ?>"/>
                    <div class="col-xs-12">
                        <label>Produto</label><br>
                        <input type="text" class="form-control" name="nome_produto" value="<?= $nome_produto ?>" placeholder="Nome do produto" required="required"><br>
                    </div>
                    <div class="col-xs-3">
                        <label>Valor</label>
                        <input type="number" class=form-control name="valor_produto" value="<?= $valor_produto ?>" placeholder="00,00" required="required"><br>
                    </div>
                    <div class="col-xs-3">
                        <label>Quantidade</label>
                        <input type="number" class=form-control name="qtd_produto" value="<?= $qtd_produto ?>" required="required"><br>
                    </div>
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-success">SALVAR</button>
                    </div>
                    
                </form>

              </div>
            </div>
        </div>
    </body>
</html>