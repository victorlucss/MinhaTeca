<?php
class Comedia extends Livro {

  private $broxura;

  public function __construct($nome, $valor, $quantidade, $broxura){
    parent::__construct($nome, $valor, $quantidade);
    $this->broxura = $broxura;
  }

  function getBroxura(){
    return $this->broxura;
  }
}
?>