
<!DOCTYPE html>
<meta charset="UTF-8">
<?php
    $cookie_name = "user";
    $cookie_value = "Daniella Martins Vasconcellos";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<html>
<head>
    <title>ODAW - Exercício 09 - PHP</title>
</head>

<body>
<?php

//=================================================

$conexao = mysqli_connect('localhost', 'root', '', 'udesc');
if (!$conexao) {
    die('Não foi possível conectar: '.mysqli_error());
}
echo 'Conexão bem sucedida';
//mysqli_close($conexao);
//mysqli_close($conexao);

//=================================================

// Check connection
if ($conexao -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
  echo "<br>";
// $conexao = mysqli_connect('localhost', 'root', '');
// mysqli_select_db($conexao, "udesc");
// $consulta = "CREATE TABLE pessoa (codigo INT AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(50), idade VARCHAR(3), email VARCHAR(50))";
// $resultado = mysqli_query ($conexao, $consulta);
// if ($resultado)
//  echo "Tabela criada com sucesso";
// else
//  echo "Tabela não pôde ser criada, talvez ela já exista no BD";


// define variables and set to empty values
$name = ""; $nameErr = "";
$email = ""; $emailErr = "";
$idade = "";$idadeErr = "";
$senha = "";
$preenchido = true;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Esse campo é necessário.";
        $preenchido = false;                // pra não cadastrar no banco de dados se o formulario nao tiver completo
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Só é permitido letras e espaços.";
        $preenchido = false;                // pra não cadastrar no banco de dados se o formulario nao tiver completo
        }
    }
  
    if (empty($_POST["email"])) {
        $emailErr = "Esse campo é necessário.";
        $preenchido = false;                // pra não cadastrar no banco de dados se o formulario nao tiver completo
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Formato do email está incorreto.";
          $preenchido = false;                // pra não cadastrar no banco de dados se o formulario nao tiver completo
        }
    }

    if (empty($_POST["idade"])) {
        $idadeErr = "Esse campo é necessário.";
        $preenchido = false;                // pra não cadastrar no banco de dados se o formulario nao tiver completo
    } else {
        $idade = test_input($_POST["idade"]);
        // check if e-mail address is well-formed
        if (!preg_match("/^[0-9 ]*$/",$idade)) {
          $idadeErr = "Só digite números.";
          $preenchido = false;                // pra não cadastrar no banco de dados se o formulario nao tiver completo
        }
    }

    if($preenchido == false){
        echo "Faltou preencher todo o formulario";
    } else {
        //$consulta = 'INSERT INTO pessoa (nome, email) values (mysqli_real_escape_string($name), mysqli_real_escape_string($email))';
        //$consulta = 'INSERT INTO pessoa values (NULL, mysql_real_escape_string($name), mysql_real_escape_string($email))';
        //$resultado = mysqli_query ($conexao, $consulta);
        //echo $resultado;
        //echo $conexao -> info;

        $consulta = "INSERT INTO pessoa (nome, email, idade) values ('$_POST[name]','$_POST[email]', '$_POST[idade]')";
        $resultado = mysqli_query ($conexao, $consulta);
        mysqli_error($conexao);
        if ($resultado){
            //echo "Sucesso";
        }
        else
            echo "Erro";

        echo "Email e senha salvos";
        $arquivo = fopen("autenticacao.txt", "a") or die ("Unable to open file!");
        $pulaLinha = "\n";
        $separador = "|";
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        fwrite($arquivo, $pulaLinha);
        fwrite($arquivo, $email);
        fwrite($arquivo, $senha);
        fwrite($arquivo, $separador);
        fwrite($arquivo, $senhaHash);
        fclose($arquivo);
    }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Inserir registros</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Name: <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>

    Email: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>

    Idade: <input type="text" name="idade" value="<?php echo $idade;?>">
        <span class="error">* <?php echo $idadeErr;?></span>
        <br><br>

  <br><br>
  <input type="submit" name="submit">  
  <input type="reset" name="reset">
</form>

<?php
echo "<h2>Entrada:</h2>";
echo "nome: " . $name;
echo "<br>";
echo "email: " . $email;
echo "<br>";
echo "idade: " . $idade;
echo "<br>";


?>
</body>

<p><a href="http://localhost/ODAW/Ex10/ex10-inserir.php">Inserir</a></p>
<p><a href="http://localhost/ODAW/Ex10/ex10-mostrar.php">Mostrar</a></p>
<p><a href="http://localhost/ODAW/Ex10/ex10-editar.php">Editar</a></p>
<p><a href="http://localhost/ODAW/Ex10/ex10-excluir.php">Excluir</a></p>
</html>