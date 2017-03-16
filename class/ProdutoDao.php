<?php

    class ProdutoDao{

        private $conexao;

        function __construct($conexao){
            $this->conexao = $conexao;
        }

        public function cadastroProduto(Produto $produto){

            $nome_produto = $produto->getNome();
            $valor_produto = $produto->getValor();
            $qtd_produto = $produto->getQtd();
         
            $query = "INSERT INTO produto (nome,valor,qtd) VALUES (:nome, :valor, :qtd)";
            $stmt = $this->conexao->prepare($query);

            $stmt->bindParam(':nome',$nome_produto);
            $stmt->bindParam(':valor',$valor_produto);
            $stmt->bindParam(':qtd',$qtd_produto);

            $result = $stmt->execute();

            if(!$result){
                var_dump($query);
                echo "Erro ao tentar cadastrar!";
                exit;
            }else{
                header("location: index.php");
            }
        }

        public function deleteProduto($id){

            $query = "DELETE FROM  produto WHERE id = '$id'";
            $stmt = $this->conexao->prepare($query);

            $result = $stmt->execute();

            if(!$result){
                var_dump($query);
                exit;
            }else{
                header("location: index.php");
            }
        }

        public function alteraProduto(Produto $produto){

            $id_produto = $produto->getId();
            $nome_produto = $produto->getNome();
            $valor_produto = $produto->getValor();
            $qtd_produto = $produto->getQtd();

            $query = "UPDATE produto set nome = :nome, valor = :valor, qtd = :qtd WHERE id = :id";
            $stmt = $this->conexao->prepare($query);
           
            $stmt->bindParam(':nome',$nome_produto);
            $stmt->bindParam(':valor',$valor_produto);
            $stmt->bindParam(':qtd',$qtd_produto);
            $stmt->bindParam(':id',$id_produto);

            $result = $stmt->execute();

            if(!$result){
                echo "Erro ao tentar alterar produto!";
            }else{
                header("location: index.php");
            }
        }

        public function listaProdutos(){

            $query = "SELECT * FROM produto";
            $stmt = $this->conexao->query($query);

            $produtos = array();

            foreach($stmt->fetchAll() as $value){

                $id = $value['id'];
                $nome = $value['nome'];
                $valor = $value['valor'];
                $qtd = $value['qtd'];

                $novoProduto = new Produto($nome,$valor,$qtd);
                $novoProduto->setId($id);

                array_push($produtos,$novoProduto);
            }

            return $produtos;
        }
    }