<?php
$servername = "localhost";

//username      Local: root
//senha         Local: ""
//databasename  LOCAL: osalvenaria

//username      HOMOLOGAÇÃO: hostdeprojetos_osalvenaria
//senha         HOMOLOGAÇÃO: ifspgru@2022
//databasename  HOMOLOGAÇÃO: hostdeprojetos_osalvenaria;

$username = "hostdeprojetos";
$password = "ifspgru@2022";
$databasename = "hostdeprojetos_osalvenaria";

$username = "root";
$password = "";
$databasename = "osalvenaria";
//criação da conexão
$conn = new mysqli($servername, $username, $password, $databasename);

// verificando a conexão
if (!$conn){
    //die("conexão falhou".mysqli_connect_error());
    echo "não foi possível conectar ao banco de dados";
}


?>
