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
$name='';$novoname='';
$email='';$novoemail='';
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
    if (empty($_POST["novonome"])) {
        $novonameErr = "Esse campo é necessário.";
        $nomepreenchido = false;                // pra não cadastrar no banco de dados se o formulario nao tiver completo
    } else {
        $novoname = test_input($_POST["novonome"]);
        // check if novoname only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$novoname)) {
        $novonameErr = "Só é permitido letras e espaços.";
        $nomepreenchido = false;                // pra não cadastrar no banco de dados se o formulario nao tiver completo
        }
    }

    if (empty($_POST["novoemail"])) {
        $novoemailErr = "Esse campo é necessário.";
        $emailpreenchido = false;                // pra não cadastrar no banco de dados se o formulario nao tiver completo
    } else {
        $novoemail = test_input($_POST["novoemail"]);
        // check if e-mail address is well-formed
        if (!filter_var($novoemail, FILTER_VALIDATE_EMAIL)) {
          $novoemailErr = "Formato do novo Email está incorreto.";
          $emailpreenchido = false;                // pra não cadastrar no banco de dados se o formulario nao tiver completo
        }
    }

    if($nomepreenchido == false){
        echo "Nome não preenchido, portanto não será alterado. <br>";
    } else {     
        $consulta = "UPDATE pessoa SET nome='$_POST[novonome]' WHERE nome='$_POST[nome]'";
        $resultado = mysqli_query ($conexao, $consulta);
        mysqli_error($conexao);
        if ($resultado)
            echo "Nome '$_POST[nome]' alterado para '$_POST[novonome]'<br>";
        else
            echo "Nome não alterado.<br>";

        //echo "Nome salvo";
    }

    if($emailpreenchido == false){
        echo "Email não preenchido, portanto não será alterado.";
    } else {
        $consulta = "UPDATE pessoa SET email='$_POST[novoemail]' WHERE email='$_POST[email]'";
        $resultado = mysqli_query ($conexao, $consulta);
        mysqli_error($conexao);
        if ($resultado)
            echo "Email '$_POST[email]' alterado para '$_POST[novoemail]'";
        else
            echo "Email: erro";
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

<h2>Alterar um cadastro</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

    Nome a ser editado: <input type="text" name="nome" value="<?php echo $nome;?>">
    Novo nome: <input type="text" name="novonome" value="<?php echo $novonome;?>">

<br><br>
    Email a ser editado: <input type="text" name="email" value="<?php echo $email;?>">
    Novo email: <input type="text" name="novoemail" value="<?php echo $novoemail;?>">

  <br><br>
  <input type="submit" name="submit">  
  <input type="reset" name="reset">
</form>

<p><a href="http://localhost/odaw/ex10-inserir.php">Inserir</a></p>
<p><a href="http://localhost/odaw/ex10-mostrar.php">Mostrar</a></p>
<p><a href="http://localhost/odaw/ex10-editar.php">Editar</a></p>
<p><a href="http://localhost/odaw/ex10-excluir.php">Excluir</a></p>
</html>