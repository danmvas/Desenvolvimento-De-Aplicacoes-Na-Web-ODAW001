<?php

$conexao = mysql_connect('localhost', 'root', '');

mysql_select_db("udesc",$conexao);
$consulta = "CREATE TABLE agenda_telefonica
            (codigo INT AUTO_INCREMENT PRIMARY KEY,
             nome VARCHAR(40),
             telefone VARCHAR(11),
             endereco VARCHAR(200)
             )";

$resultado = mysql_query ($consulta, $conexao);

if (!$conexao){
    die('Não foi possível conectar: '.mysql_error());
}
echo 'Conexão bem sucedida';
mysql_close($conexao);

?>