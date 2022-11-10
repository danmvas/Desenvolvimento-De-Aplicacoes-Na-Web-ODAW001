<<<<<<< HEAD

<!DOCTYPE html>
<meta charset="UTF-8">
<?php
    $cookie_name = "user";
    $cookie_value = "Daniella Martins Vasconcellos";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<html>
<head>
    <title>ODAW - Exercício 9 - PHP</title>
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
$conexao = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conexao, "udesc");
$consulta = "CREATE TABLE pessoa (codigo INT AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(50), email VARCHAR(50))";
$resultado = mysqli_query ($conexao, $consulta);
if ($resultado)
 echo "Tabela criada com sucesso";
else
 echo "Tabela não pôde ser criada, talvez ela já exista no BD";


// define variables and set to empty values
$name = ""; $nameErr = "";
$email = ""; $emailErr = "";
$senha = ""; $senhaErr = "";
$texto = ""; $textoErr = "";
$cidade = ""; $cidadeErr = "";
$vehicle = ""; $vehicleErr = "";
$genero = ""; $generoErr = "";
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
    $uppercase = preg_match('@[A-Z]@', $senha);
    $lowercase = preg_match('@[a-z]@', $senha);
    $number    = preg_match('@[0-9]@', $senha);
    $specialChars = preg_match('@[^\w]@', $senha);

    if (empty($_POST["senha"])) {
        $senhaErr = "Esse campo é necessário.";
    } else {
        $senha = test_input($_POST["senha"]);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $senhaErr = "A senha precisa ter 8 caracteres, um maiusculo, um minusculo, um numero e um caracter especial.";
        }
    }

    if (empty($_POST["texto"])){
    $textoErr = "Esse campo é necessário.";
    } else {
        $texto = test_input($_POST["texto"]);
    }

    if (empty($_POST["cidade"])){
        $cidadeErr = "Esse campo é necessário.";
    } else {
            $cidade = test_input($_POST["cidade"]);
    }    

    if(!isset($_POST["vehicle1"]) && !isset($_POST["vehicle2"]) && !isset($_POST["vehicle3"]) && !isset($_POST["vehicle4"])){
        $vehicleErr = "Esse campo é necessário."; 
    }
    
    if (empty($_POST["genero"])) {
        $generoErr = "Esse campo é necessário.";
      } else {
        $genero = test_input($_POST["genero"]);
    }

    if($preenchido == false){
        echo "Faltou preencher todo o formulario";
    } else {
        //$consulta = 'INSERT INTO pessoa (nome, email) values (mysqli_real_escape_string($name), mysqli_real_escape_string($email))';
        //$consulta = 'INSERT INTO pessoa values (NULL, mysql_real_escape_string($name), mysql_real_escape_string($email))';
        //$resultado = mysqli_query ($conexao, $consulta);
        //echo $resultado;
        //echo $conexao -> info;

        $consulta = "INSERT INTO pessoa (nome, email) values ('$_POST[name]','$_POST[email]')";
        $resultado = mysqli_query ($conexao, $consulta);
        mysqli_error($conexao);
        if ($resultado)
            echo "Sucesso";
        else
            echo "Erro";

        echo "Email e senha salvos";
        $arquivo = fopen("autenticacao.txt", "a") or die ("Unable to open file!");
        $pulaLinha = "\n";
        $separador = "|";
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        fwrite($arquivo, $pulaLinha);
        fwrite($arquivo, $email);
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


?>
</body>

<p><a href="http://localhost/odaw/ex10-inserir.php">Inserir</a></p>
<p><a href="http://localhost/odaw/ex10-mostrar.php">Mostrar</a></p>
<p><a href="http://localhost/odaw/ex10-editar.php">Editar</a></p>
<p><a href="http://localhost/odaw/ex10-excluir.php">Excluir</a></p>
</html>
=======
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
>>>>>>> 409181a16383f8bd81431a3640e9b312fa6b7eb1
