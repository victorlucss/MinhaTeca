<section class="hero is-warning is-large is-bold">
  <div class="hero-body">
    <div class="container">
      <div class="title">
        <div class="logo"></div>
      </div>
      <div class="description">
        <strong>ATENÇÃO!</strong><br />
        Excluir este livro implica em remover todo o estoque! Deseja realmente excluí-lo?<br /><br />
        <a href="./?p=<?php print($_GET['p']);?>&v=<?php print($_GET['v']);?>&r=true"><button class="button is-medium"><i class="fas fa-trash"></i> Exluir livro</button></a>
        <a href="./?p=gerenciar"><button class="button is-medium">Cancelar</button></a>
      </div>
    </div>
  </div>
</section>

<?php
    if($_GET['r'] == true){
        header("Location: index.php?p=gerenciar");
    }
?>