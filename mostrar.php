<?php

include_once 'php_action/db_connect.php';


    $id = mysqli_escape_string($connect, $_GET['idEditora']);
    
    $sql = "SELECT nomeEditora FROM editoras WHERE idEditora = '$id'";

    $resultado = mysqli_query($connect, $sql);
    
    $row=mysqli_fetch_assoc($resultado);

    echo json_encode($row);
?>