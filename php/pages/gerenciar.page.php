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

    if($_GET['v'] != ''){
        $Livraria->venderLivro($_GET['v']);

        $isVisible = "block";
        $message = "Livro vendido com sucesso";
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
        <h2>Gerenciar livros</h2>

        <?php
            if($Livraria->getEstoque() == 0){
                print('Nenhum livro adicionado. <br /> <a class="button" href="?p=adicionar">Adicione um livro agora!</a>');
                return;
            }
        ?>
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="thead">
                <tr>
                    <td class="has-text-centered"><strong>ID</strong></td>
                    <td><strong>Nome</strong></td>
                    <td><strong>Valor</strong></td>
                    <td><strong>Quantidade</strong></td>
                    <td><strong>Gênero</strong></td>
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
                    <td><?php print("R$".$livro->getValor()) ?></td>
                    <td><?php print($livro->getQuantidade()); ?></td>
                    <td><?php print(get_class($livro))?></td>
                    <td class="has-text-centered">
                        <a href="./?p=gerenciar&ver=<?php print($livro->getId())?>">
                            <button class="button is-small"><i class="far fa-eye"></i> Visualizar</button>
                        </a>
                        <a href="./?p=gerenciar&v=<?php print($livro->getId())?>">
                            <button class="button is-small is-success"><i class="fas fa-shopping-cart"></i> Vender</button>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                    ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    $modalIsActive = "";
    $modalTitle = "";

    if($_GET['ver'] != ''){
        $modalIsActive = "is-active";
        $livro = $_SESSION['livros'][$_GET['ver']];
        $modalTitle = $livro->getNome();

        switch (get_class($livro)) {
            case 'Comedia':
                $optGenero = "Tem brochura";
                $optGen = $livro->getBroxura();
            break;

            case 'Drama':
                $optGenero = "Tem capa dura";
                $optGen = $livro->getCapa();
            break;

            default:
                $optGenero = "Ilustração";
                $optGen = $livro->getIlustracao();
            break;
        }
    }
?>

<div class="modal <?php print($modalIsActive); ?>">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title"><?php print($modalTitle); ?></p>
      <a href="?p=<?php print($_GET['p']); ?>"><button class="delete" aria-label="close"></button></a>
    </header>
    <section class="modal-card-body">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="thead">
                <tr>
                    <td>Valor</td>
                    <td>Quantidade</td>
                    <td><?php print($optGenero); ?></td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td><?php print("R$".$livro->getValor()) ?></td>
                    <td><?php print($livro->getQuantidade()); ?></td>
                    <td><?php print($optGen)?></td>
                </tr>
            </tbody>
        </table>
    </section>
    <footer class="modal-card-foot">
        <a href="./?p=excluir&v=<?php print($livro->getId())?>">
            <button class="button is-danger"><i class="fas fa-trash"></i> Exluir livro</button>
        </a>
    </footer>
  </div>
</div>