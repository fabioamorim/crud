<?php

    class Produto{

        private $id;
        private $nome;
        private $valor;
        private $qtd;

        function __construct($nome,$valor,$qtd){
            $this->nome = $nome;
            $this->valor = $valor;
            $this->qtd = $qtd;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getValor(){
            return $this->valor;
        }

        public function setValor($valor){
            $this->valor = $valor;
        }

        public function getQtd(){
            return $this->qtd;
        }

        public function setQtd($qtd){
            $this->qtd = $qtd;
        }

    }