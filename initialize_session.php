<?php
    session_start();
    $_SESSION['livros'] = array();
    $_SESSION['id'] = 0;

    if(isset($_SESSION['livros'])){
        header('Location: index.php');
    }
?>