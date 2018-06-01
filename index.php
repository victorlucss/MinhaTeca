<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MinhaTeca</title>
    <link rel="stylesheet" href="./src/css/bulma.min.css">
    <link rel="stylesheet" href="./src/css/minhateca.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>

<?php
    error_reporting(E_ERROR | E_PARSE); //Isso é pra ignorar os warnings
    
    require('./php/classes/Livraria.class.php');
    require('./php/classes/Livro/Livro.class.php');
    require('./php/classes/Livro/Aventura.class.php');
    require('./php/classes/Livro/Comedia.class.php');
    require('./php/classes/Livro/Drama.class.php');
    
    session_start();
    $Livraria = new Livraria();

    if($_GET['p'] == '') require('./php/pages/initial.page.php');
    else if(file_exists('./php/pages/'.$_GET['p'].'.page.php')) require('./php/pages/'.$_GET['p'].'.page.php');
    else require('./php/pages/error.page.php');

    // print_r($_SESSION['livros'][0]);


?>

</body>
</html>