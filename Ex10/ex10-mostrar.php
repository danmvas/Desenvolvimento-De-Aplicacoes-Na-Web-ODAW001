
<!DOCTYPE html>
<meta charset="UTF-8">
<?php
    $cookie_name = "user";
    $cookie_value = "Daniella Martins Vasconcellos";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<html>
<head>
    <title>ODAW - Exercício 10 - PHP</title>
</head>

<body>
<?php

//=================================================

$conexao = mysqli_connect('localhost', 'root', '', 'udesc');
if (!$conexao) {
    die('Não foi possível conectar: '.mysqli_error());
}
//echo 'Conexão bem sucedida';
//mysqli_close($conexao);
//mysqli_close($conexao);

//=================================================

// Check connection
if ($conexao -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

//$conexao = mysqli_connect('localhost', 'root', '');
//mysqli_select_db($conexao, "udesc");

$consulta = "SELECT codigo, nome, email FROM pessoa";
$resultado = mysqli_query ($conexao,$consulta);
echo "--------- <b>CÓDIGO</B> ----------------------------- <b>NOME</B> --------------------------------------------------- <b>EMAIL</B> ----------------------------- <br>";
while ($linha = mysqli_fetch_row($resultado))
{
 echo "-------------- ". $linha[0]." ----------------------------- ".$linha[1]." ----------------------------- ".$linha[2]." -------------- <br>";
}
echo "<br><br>";



?>

<p><a href="http://localhost/odaw/ex10-inserir.php">Inserir</a></p>
<p><a href="http://localhost/odaw/ex10-mostrar.php">Mostrar</a></p>
<p><a href="http://localhost/odaw/ex10-editar.php">Editar</a></p>
<p><a href="http://localhost/odaw/ex10-excluir.php">Excluir</a></p>
</html>