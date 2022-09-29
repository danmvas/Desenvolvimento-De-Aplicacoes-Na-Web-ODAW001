
<!DOCTYPE html>
<meta charset="UTF-8">

<html>
<head>
    <title>ODAW - Exercício 7 - PHP</title>
</head>

<body>
<?php
// define variables and set to empty values
$name = ""; $nameErr = "";
$email = ""; $emailErr = "";
$senha = ""; $senhaErr = "";
$texto = ""; $textoErr = "";
$cidade = ""; $cidadeErr = "";
$vehicle = ""; $vehicleErr = "";
$genero = ""; $generoErr = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Este é um campo necessário.";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Apenas preencha o campo com letras e espaços.";
        }
    }
  
    if (empty($_POST["email"])) {
        $emailErr = "Este é um campo necessário.";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Formato do email está incorreto.";
        }
    }
    $uppercase = preg_match('@[A-Z]@', $senha);
    $lowercase = preg_match('@[a-z]@', $senha);
    $number    = preg_match('@[0-9]@', $senha);
    $specialChars = preg_match('@[^\w]@', $senha);

    if (empty($_POST["senha"])) {
        $senhaErr = "Este é um campo necessário.";
    } else {
        $senha = test_input($_POST["senha"]);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $senhaErr = "É necessário que a senha tenha 8 caracteres: no mínimo um maiúsculo, um minúsculo, um numeral e um caracter especial.";
        }

    }


    if (empty($_POST["texto"])){
    $textoErr = "Este é um campo necessário.";
    } else {
        $texto = test_input($_POST["texto"]);
    }

    if (empty($_POST["cidade"])){
        $cidadeErr = "Este é um campo necessário.";
    } else {
            $cidade = test_input($_POST["cidade"]);
    }    

    if(!isset($_POST["vehicle1"]) && !isset($_POST["vehicle2"]) && !isset($_POST["vehicle3"]) && !isset($_POST["vehicle4"])){
        $vehicleErr = "Este é um campo necessário."; 
    }
    
    if (empty($_POST["genero"])) {
        $generoErr = "Este é um campo necessário.";
      } else {
        $genero = test_input($_POST["genero"]);
    }

    
    if (empty($_POST["email"]) || empty($_POST["senha"])) {
        $preenchido = false;
        echo $preenchido;
    } else {
        $preenchido = true;
    }
    if($preenchido == false){
        echo "Há alguns itens obrigatórios que não foram preenchidos.";
    } else {
        echo "Email e senha salvos";
        $arquivo = fopen("autenticacao.txt", "a") or die ("Não foi possível de abrir o arquivo.");
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

<h2>PHP Form Validation Example</h2>
<p><span class="error">******</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Name: <input type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>

    Email: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>

    Senha: <input type="password" name="senha">
        <span class="error">* <?php echo $senhaErr;?></span>
        <br><br>
    

    Texto: <textarea name="texto" rows="8" cols="50"><?php echo $texto;?></textarea>
        <span class="error">* <?php echo $textoErr;?></span>
        <br><br>

    Cidade: <select name="cidade" id="cidade" value="<?php echo $cidade;?>">
        <option value=""> </option>
        <option value="joinville">Joinville</option>
        <option value="blumenau">Blumenau</option>
        <option value="florianopolis">Florianópolis</option>
        <option value="curitiba">Curitiba</option>
        </select>
        <span class="error">* <?php echo $cidadeErr;?></span>
        <br><br>

    Veículo: <br>
        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bicicleta">
        <label for="vehicle1"> Eu tenho uma bicicleta</label><br>
        <input type="checkbox" id="vehicle2" name="vehicle2" value="Carro">
        <label for="vehicle2"> Eu tenho um carro</label><br>
        <input type="checkbox" id="vehicle3" name="vehicle3" value="Outro">
        <label for="vehicle3"> Outro</label><br>
        <input type="checkbox" id="vehicle4" name="vehicle4" value="Nenhum">
        <label for="vehicle4"> Nenhum</label><br>     
        <span class="error">* <?php echo $vehicleErr;?></span><br>    
        <br><br>

    Gênero:
        <input type="radio" name="genero" <?php if (isset($genero) && $genero=="homem") echo "checked";?> value="homem">Homem
        <input type="radio" name="genero" <?php if (isset($genero) && $genero=="mulher") echo "checked";?> value="mulher">Mulher
        <input type="radio" name="genero" <?php if (isset($genero) && $genero=="outro") echo "checked";?> value="outro">Outro  
        <span class="error">* <?php echo $generoErr;?></span>
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
echo "senha: " . $senha;
echo "<br>";
echo "texto: " . $texto;
echo "<br>";
echo "cidade: " . $cidade;
echo "<br>";
echo "veiculo: " . $vehicle;
echo "<br>";
echo "genero: " . $genero;
echo "<br>";
?>
</body>

</html>