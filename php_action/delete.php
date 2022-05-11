<?php
session_start();
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])):
// var_dump($_POST);
// exit();
    $id = mysqli_escape_string($connect, $_POST['idLivro']);

    $sql = "DELETE FROM livros WHERE idLivro = '$id'";
    
    if(mysqli_query($connect, $sql)):
        header('Location: ../index.php');
    else:
        header('Location: ../index.php');
    endif;

endif;
