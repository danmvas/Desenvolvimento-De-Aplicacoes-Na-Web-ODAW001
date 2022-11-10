<?php

$conexao = mysqli_connect('localhost', 'root', '', 'udesc');

if (!$conexao) {
    die('Não foi possível conectar: '.mysqli_error());
}

echo 'Conectado com sucesso';

//=================================================

if ($conexao -> connect_errno) {
    echo "Falha em se conectar com MySQL: " . $mysqli -> connect_error;
    exit();
  }
  echo "<br>";

//=================================================

$conexao = mysqli_connect('localhost', 'root', '');

mysqli_select_db($conexao, "udesc");

$consulta = "CREATE TABLE agenda_telefonica
            (codigo INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(40),
            telefone VARCHAR(11),
            endereco VARCHAR(200)
            )";

$resultado = mysqli_query ($conexao, $consulta);

if ($resultado)
    echo "Tabela criada com sucesso";
else
    echo "Erro ao criar tabela: ".mysqli_error();

mysqli_close($conexao);

?>
