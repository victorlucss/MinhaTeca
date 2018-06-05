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
    $isVisible = "none"; //define se o aviso vai estar visivel ou n
    $message = ""; //define a mensagem do aviso
    $type = ""; //define o tipo do aviso (ver doc do bulma pra saber mais sobre os estilos)

    if($_POST['post'] && $_POST['post']=="post"){
        $campos = [
            "nome" => $_POST['nome'],
            "valor" => $_POST['valor'],
            "quantidade" => $_POST['quantidade'],
            "genero" => $_POST['genero']
        ];

        foreach ($campos as $i => $valor) { //percorre os campos procurando por um valor não preenchido
            if($valor == ""){
                $isVisible = "block";
                $message = "Preencha todos os campos! ${i}";
                $type = "danger";
                break;
                return;
            }
        }

        //valores que podem variar
        $brochura = $_POST['brochura'];
        $capaDura = $_POST['capaDura'];
        $ilustracao = $_POST['ilustracao'];

        switch ($campos['genero']) {
            case 'drama':
                if($capaDura != ''){
                    $Livraria->addLivro(new Drama($campos['nome'], $campos['valor'], $campos['quantidade'], $capaDura));
                    $isVisible = "block";
                    $message = "Livro adicionado com sucesso!";
                    $type = "success";
                }else{
                    $isVisible = "block";
                    $message = "Preencha todos os campos!";
                    $type = "danger";
                }
            break;

            case 'comedia':
                if($brochura != ''){
                    $Livraria->addLivro(new Comedia($campos['nome'], $campos['valor'], $campos['quantidade'], $brochura));
                    $isVisible = "block";
                    $message = "Livro adicionado com sucesso!";
                    $type = "success";
                }else{
                    $isVisible = "block";
                    $message = "Preencha todos os campos!";
                    $type = "danger";
                }
            break;

            default: # se não for drama ou comédia vai ser aventura, ué
                if($ilustracao != ''){
                    $Livraria->addLivro(new Aventura($campos['nome'], $campos['valor'], $campos['quantidade'], $ilustracao));
                    $isVisible = "block";
                    $message = "Livro adicionado com sucesso!";
                    $type = "success";
                }else{
                    $isVisible = "block";
                    $message = "Preencha todos os campos!";
                    $type = "danger";
                }
            break;
        }

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
        <h2>Adicionar livro</h2>
        <form action="?p=adicionar" method="post">
            <input type="hidden" name="post" value="post" />
            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="text" name="nome" placeholder="Nome do livro">
                    <span class="icon is-left">
                        <i class="fas fa-book"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="number" min="0.1" name="valor" step="0.1" placeholder="Valor">
                    <span class="icon is-left">
                        <i class="far fa-money-bill-alt"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="number" min="1" name="quantidade" placeholder="Quantidade">
                    <span class="icon is-left">
                        <i class="fas fa-dice-six"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <div class="select is-medium">
                        <select name="genero" id="generoLivro">
                            <option selected value="">Selecione um gênero</option>
                            <option value="aventura">Aventura</option>
                            <option value="comedia">Comédia</option>
                            <option value="drama">Drama</option>
                        </select>
                    </div>
                    <span class="icon is-left">
                        <i class="fas fa-genderless"></i>
                    </span>
                </div>
            </div>

            <div class="field" style="display: none;" id="generoLivroComedia">
                <div class="control has-icons-left has-icons-right">
                    <div class="select is-medium">
                        <select name="brochura">
                            <option selected value="">Este livro tem brochura?</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>
                    <span class="icon is-left">
                        <i class="fas fa-genderless"></i>
                    </span>
                </div>
            </div>

            <div class="field" style="display: none;" id="generoLivroDrama">
                <div class="control has-icons-left has-icons-right">
                    <div class="select is-medium">
                        <select name="capaDura">
                            <option selected value="">Este livro tem capa dura?</option>
                            <option value="sim">Sim</option>
                            <option value="nao">Não</option>
                        </select>
                    </div>
                    <span class="icon is-left">
                        <i class="fas fa-genderless"></i>
                    </span>
                </div>
            </div>

            <div class="field" style="display: none;" id="generoLivroAventura">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="text" name="ilustracao" placeholder="URL para uma ilustração">
                    <span class="icon is-left">
                        <i class="fas fa-genderless"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="button is-dark">Criar novo livro</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('generoLivro').addEventListener("change", (e) => {
        switch (e.target.value) {
            case 'comedia':
                document.getElementById('generoLivroComedia').style.display = "block";
                document.getElementById('generoLivroDrama').style.display = "none";
                document.getElementById('generoLivroAventura').style.display = "none";
            break;

            case 'drama':
                document.getElementById('generoLivroDrama').style.display = "block";
                document.getElementById('generoLivroComedia').style.display = "none";
                document.getElementById('generoLivroAventura').style.display = "none";
            break;

            case 'aventura':
                document.getElementById('generoLivroAventura').style.display = "block";
                document.getElementById('generoLivroComedia').style.display = "none";
                document.getElementById('generoLivroDrama').style.display = "none";
            break;

            default:
                document.getElementById('generoLivroComedia').style.display = "none";
                document.getElementById('generoLivroDrama').style.display = "none";
                document.getElementById('generoLivroAventura').style.display = "none";
            break;
        }
    });
</script>
