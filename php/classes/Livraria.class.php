<?php
    class Livraria {

        function __constructor(){}

        function getEstoque(){
            $estoque = 0;

            foreach($_SESSION['livros'] as $chave => $livro){
            $estoque = $estoque + $livro->getQuantidade();
            }

            return $estoque;
        }

        function addLivro($livro){
            array_push($_SESSION['livros'], $livro);
        }

        function venderLivro($id){
            if($_SESSION['livros'][$id]->getQuantidade() > 1) {
                $_SESSION['livros'][$id]->vender();
            }else{
                unset($_SESSION['livros'][$id]);
                $_SESSION['id']--;
            }
        }

        function excluirLivro($id){
            if($_SESSION['livros'][$id]) {
                unset($_SESSION['livros'][$id]);
                $_SESSION['id']--;
            }
        }
    }
?>