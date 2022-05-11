<?php
//conexao com banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "livraria";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
    echo "erro na conexao ".mysqli_connect_error();
endif;
