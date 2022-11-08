
<!DOCTYPE html>
<meta charset="UTF-8">
<?php
    $cookie_name = "user";
    $cookie_value = "Daniella Martins Vasconcellos";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<html>
<head>
    <title>ODAW - Exercício 7 - Parte 2 - PHP</title>
</head>

<body>
<?php
$email = ""; $emailErr = "";
$senha = ""; $senhaErr = "";
$msgLogin = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userN = $_POST["email"];
    $passW = $_POST["senha"];
    $userlist = file ("autenticacao.txt");

    $email = "";
    $senha = "";
    
    $success = false;
 
    foreach ($userlist as $user) {
        $user_details = explode("|", $user);

        if ($user_details[0] == $userN && password_verify($passW , $user_details[1])) {
            $success = true;
            break;
        }
    }
    
    if ($success) {
        $msgLogin = "Olá, você logou com sucesso no email $userN";
    } else {
        $msgLogin = "Você inseriu incorretamente o nome de usuário ou senha. Tente novamente.";
    }
    
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<h2>Login em PHP</h2>
<p><span class="error"></span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Email: <input type="text" name="email" value="<?php echo $email;?>">
        
    <br><br>

    Senha: <input type="password" name="senha">
        
    <br><br>
    <input type="submit" name="submit">  
    <br><br>
    <span> <?php echo $msgLogin;?></span>
</form>


</body>

</html>