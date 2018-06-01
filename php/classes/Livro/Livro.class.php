<?php

abstract class Livro{
    private $id;
    private $nome;
    private $valor;
    private $quantidade;

    function __construct($nome, $valor, $quantidade){
        $this->nome = $nome;
        $this->valor = $valor;
        $this->quantidade = $quantidade;
        $this->atualizarId();
    }

    function atualizarId(){
        $this->id = $_SESSION['id'];
        $_SESSION['id'] = $_SESSION['id'] + 1;
    }

    function getId(){
        return $this->id;
    }

    function getNome(){
        return $this->nome;
    }

    function getValor(){
        return $this->valor;
    }

    function getQuantidade(){
        return $this->quantidade;
    }

    function vender(){
        $this->quantidade = $this->getQuantidade() - 1;
    }
}

?>