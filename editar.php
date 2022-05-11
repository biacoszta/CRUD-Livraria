<?php

include_once 'php_action/db_connect.php';


    $id = mysqli_escape_string($connect, $_GET['idLivro']);
    
    $sql = "SELECT * FROM livros WHERE idLivro = '$id'";

    $resultado = mysqli_query($connect, $sql);
    
    $row=mysqli_fetch_assoc($resultado);

    $sqlEditora = "SELECT idEditora, nomeEditora FROM editoras";

    $resultadoEditora = mysqli_query($connect, $sqlEditora);
    while($dados = mysqli_fetch_array($resultadoEditora)){
        $row["editoras"][]=$dados;
    }
    
    echo json_encode($row);
?>