<?php
session_start();
require_once 'db_connect.php';

    $nomeLivro = mysqli_escape_string($connect, $_POST['nomeLivro']);
    $autor = mysqli_escape_string($connect, $_POST['autor']);
    $assunto = mysqli_escape_string($connect, $_POST['assunto']);
    $idEditora = mysqli_escape_string($connect, $_POST['idEditora']);
    $isbn = mysqli_escape_string($connect, $_POST['isbn']);
    $estoque = mysqli_escape_string($connect, $_POST['estoque']);
    $id = mysqli_escape_string($connect, $_POST['idLivro']);

    $sql = "UPDATE livros SET nomeLivro = '$nomeLivro', autor = '$autor', assunto = '$assunto', idEditora = '$idEditora', isbn = '$isbn', estoque = '$estoque' WHERE idLivro = '$id'";

    if(mysqli_query($connect, $sql)):
        header('Location: ../index.php');
    else:
        header('Location: ../index.php');
    endif;
