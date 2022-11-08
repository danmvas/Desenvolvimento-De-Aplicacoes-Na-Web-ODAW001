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
$name='';
$email='';
$nomepreenchido = true;
$emailpreenchido = true;
//=================================================

$conexao = mysqli_connect('localhost', 'root', '', 'udesc');
if (!$conexao) {
    die('Não foi possível conectar: '.mysqli_error());
}
//=================================================

// Check connection
if ($conexao -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

//$conexao = mysqli_connect('localhost', 'root', '');
//mysqli_select_db($conexao, "udesc");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nomepreenchido = false;                // pra não cadastrar no banco de dados se o formulario nao tiver completo
    }
    if (empty($_POST["email"])) {
        $emailpreenchido = false;                // pra não cadastrar no banco de dados se o formulario nao tiver completo
    }
    if($nomepreenchido == false){
        echo "Nome não alterado <br>";
    } else {     
        $consulta = "DELETE FROM pessoa WHERE nome='$_POST[name]'";
        $resultado = mysqli_query ($conexao, $consulta);
        mysqli_error($conexao);
        if ($resultado)
            echo "Nome deletado '$_POST[name]'<br>";
        else
            echo "Nome: erro <br>";

        //echo "Nome salvo";
    }
    if($emailpreenchido == false){
        echo "Email não foi preenchido.";
    } else {
        $consulta = "DELETE FROM pessoa WHERE email='$_POST[email]'";
        $resultado = mysqli_query ($conexao, $consulta);
        mysqli_error($conexao);
        if ($resultado)
            echo "Email deletado: '$_POST[email]'";
        else
            echo "Email: erro";
    }
}


?>

<h2>Excluir um cadastro</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

    delete from pessoa 
    where nome=<input type="text" name="name" value="<?php echo $name;?>">

<br><br>
    delete from pessoa 
    where email=<input type="text" name="email" value="<?php echo $email;?>">

  <br><br>
  <input type="submit" name="submit">  
  <input type="reset" name="reset">
</form>

<p><a href="http://localhost/odaw/ex10-inserir.php">Inserir</a></p>
<p><a href="http://localhost/odaw/ex10-mostrar.php">Mostrar</a></p>
<p><a href="http://localhost/odaw/ex10-editar.php">Editar</a></p>
<p><a href="http://localhost/odaw/ex10-excluir.php">Excluir</a></p>
</html>