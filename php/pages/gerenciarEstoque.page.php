<section class="hero is-dark is-bold">
  <div class="hero-body">
    <div class="container">
      <div class="title">
        <a href="/"><div class="logo"></div></a>
      </div>
    </div>
  </div>
</section>

<?php
    $isVisible = "none";
    $message = "";
    $type = "";

    if($_POST['id'] != ''){
        $Livraria->editarLivro($_POST['id'], $_POST['quantidade']);

        $isVisible = "block";
        $message = "Livro editado com sucesso";
        $type = "success";
    }
?>

<section class="hero is-small is-<?php print($type); ?>" style="display: <?php print($isVisible); ?>">
  <div class="hero-body">
    <div class="container">
      <h2 class="subtitle">
        <?php print($message); ?>
      </h2>
    </div>
  </div>
</section>

<div class="container">
    <div class="content">
        <h2>Gerenciar estoque</h2>

        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="thead">
                <tr>
                    <td class="has-text-centered"><strong>ID</strong></td>
                    <td><strong>Nome</strong></td>
                    <td><strong>Quantidade</strong></td>
                    <td><strong></strong></td>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach ($_SESSION['livros'] as $i => $livro) {
                        ?>
                <tr>
                    <td class="has-text-centered"><?php print($livro->getId()) ?></td>
                    <td><?php print($livro->getNome()) ?></td>
                    <td><?php print($livro->getQuantidade()); ?></td>
                    <td class="has-text-centered">
                        <form action="index.php?p=gerenciarEstoque" method="post">
                            <input name="quantidade" type="number" min="1" class="input" value="<?php print($livro->getQuantidade()); ?>" style="width: 50%;"/>
                            <input type="hidden" name="id" value="<?php print($livro->getId())?>">
                            <button type="submit" class="button is-dark"> Atualizar estoque</button>
                        </form>
                    </td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
</div>