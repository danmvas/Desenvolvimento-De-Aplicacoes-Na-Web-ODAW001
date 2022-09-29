
<!DOCTYPE html>
<meta charset="UTF-8">

<html>
<head>
    <title>ODAW - Exercício 6 - PHP</title>
</head>

<body>
<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    echo "Hoje é " . date("d/m/Y") .  " e agora são " . date("H:i") . "h" . "<br>";
    
    olaMundo();

    $str = "bom dia";
    $str2 = "boa tarde";
    $str3 = "boa noite";

    echo "str: " . ($str). "<br>";
    echo "str2: " . ($str2). "<br>";
    echo "str3: " . ($str3). "<br>";
    echo "str3 com primeiro caracter uppercase: " . ucfirst($str3). "<br>";
    
    $str4 = $str;
    $str4 .= $str2;
    echo "str+str2: " . ($str4) . "<br>";
    
    echo "<br>" . "<br>" . "<br>";
    function olaMundo() {
        echo "Olá mundo!<br>";
      }

      $filename = "contador.txt";
      $number = file_get_contents($filename);
      $cookie_name = "usuario";
      $cookie_value = $number+1;
      setcookie($cookie_name, $cookie_value, time() + (10), "/"); // 86400 = 1 day
      if(!isset($_COOKIE[$cookie_name])) {
      echo "O Cookie '" . $cookie_name . "' ainda não foi setado!";
      } else {
      echo "Cookie '" . $cookie_name . "' foi setado!<br>";
      echo "O valor é o visitante: " . $_COOKIE[$cookie_name];
      }
?> 
</body>

</html>