
<!DOCTYPE html>
<meta charset="UTF-8">

<html>
<head>
    <title>ODAW - Exercício 6 - PHP</title>
</head>

<body>
<?php

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
    echo "str+str4: " . ($str4) . "<br>";
    
    echo "<br>" . "<br>" . "<br>";
    function olaMundo() {
        echo "Olá mundo!<br>";
      }

    $handle = fopen("contador.txt", "r");
    if(!$handle){
        echo "Erro ao abrir o arquivo." ;
    } 
    else { 
        $counter = (int ) fread($handle,20); 
        fclose ($handle); $counter++; 
        echo" <strong> Essa página foi visitada ". $counter . " vezes. </strong> " ; 
        $handle = fopen("counter.txt", "w" ); 
        fwrite($handle,$counter); 
        fclose ($handle); 
    }
?> 
</body>

</html>