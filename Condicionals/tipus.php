<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


        $x = 10;    //integer
        $y = "10";  //string
        $z = $x * 2;    //integer
        $a = "23 anys"; //string
        $b = $x + 11;   //integer
        $c = 1.234; //double
        $d = 1.2e3; //double
        $e = 7E-10; // double
        $f = NULL;  //null


        echo gettype($x) . "<br>";
        echo gettype($y) . "<br>";
        echo gettype($z) . "<br>";
        echo gettype($a) . "<br>";
        echo gettype($b) . "<br>";
        echo gettype($c) . "<br>";
        echo gettype($d) . "<br>";
        echo gettype($e) . "<br>";
        echo gettype($f) . "<br>";



        $tipus = gettype($x);
        if ($tipus == "integer" || $tipus =="string" || $tipus == "float"){
            echo "Número <br>";
        }
        $tipus = gettype($y);
        if ($tipus == "integer" || $tipus =="string" || $tipus == "float"){
            echo "Número <br>";        
        }
        $tipus = gettype($z);
        if ($tipus == "integer" || $tipus =="string" || $tipus == "float"){
            echo "Número <br>";
        }
        $tipus = gettype($a);
        if ($tipus == "integer" || $tipus =="string" || $tipus == "float"){
            echo "Número <br>";
        }
        $tipus = gettype($b);
        if ($tipus == "integer" || $tipus =="string" || $tipus == "float"){
            echo "Número <br>";
        }
        $tipus = gettype($c);
        if ($tipus == "integer" || $tipus =="string" || $tipus == "float"){
            echo "Número <br>";       
         }
        $tipus = gettype($d);
        if ($tipus == "integer" || $tipus =="string" || $tipus == "float"){
            echo "Número <br>";
        }
        $tipus = gettype($e);
        if ($tipus == "integer" || $tipus =="string" || $tipus == "float"){
            echo "Número <br>";       
         }
        $tipus = gettype($f);
        if ($tipus == "integer" || $tipus =="string" || $tipus == "float"){
            echo "Número <br>";
        }

            
    ?>
</body>
</html>