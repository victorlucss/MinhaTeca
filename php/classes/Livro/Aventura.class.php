<?php
  class Aventura extends Livro {
    private $ilustracao;

    public function __construct($nome, $valor, $quantidade, $ilus){
      parent::__construct($nome, $valor, $quantidade);
      $this->ilustracao = $ilus;
    }

    function getIlustracao(){
      return $this->ilustracao;
    }
  }
?>