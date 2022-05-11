<?php
session_start();
require_once 'db_connect.php';

if(isset($_POST['nomeLivro'])):
    $nomeLivro = mysqli_escape_string($connect, $_POST['nomeLivro']);
    $autor = mysqli_escape_string($connect, $_POST['autor']);
    $assunto = mysqli_escape_string($connect, $_POST['assunto']);
    $idEditora = mysqli_escape_string($connect, $_POST['idEditora']);
    $isbn = mysqli_escape_string($connect, $_POST['isbn']);
    $estoque = mysqli_escape_string($connect, $_POST['estoque']);

    $sql = "INSERT INTO livros (nomeLivro, autor, assunto, idEditora, isbn, estoque) VALUES ('$nomeLivro', '$autor', '$assunto', '$idEditora', '$isbn', '$estoque')";

    if(mysqli_query($connect, $sql)):
        header('Location: ../index.php');
    else:
        header('Location: ../index.php');
    endif;
endif;

