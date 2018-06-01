<?php
class Drama extends Livro {

  private $capaDura;

  public function __construct($nome, $valor, $quantidade, $capa){
    parent::__construct($nome, $valor, $quantidade);
    $this->capaDura = $capa;
  }

  function getCapa(){
    return $this->capaDura;
  }
}
?>