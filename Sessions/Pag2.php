<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $usuaris = array(
            "admin" => "3f026ca5d2d4d6010ba81df2128a93edb552a6b36fe88d499f83fad75076133c180f0ef7a070b3b505a506d1b3961ff220443b95d7bed852099981f0a1953e5b",
            "root" =>"48bfad2c1c443cd6f90653ed2da4667a29f72d9e56ba294f60822cf2b1092abd44f02200ffe861794f738c53f07030151658eb6a1d6fcf7b6d78370c7f0681ad"
        ); 

        $frase= 'AvuiFaBonsolNosabran%Dequevaaquestacontrasenya-#^';
        if(isset($_POST["usuari"]) && isset($_POST["password"])){
            $user = $_POST["usuari"];
            $pass = $_POST["password"];
            $missatgeDigest = hash('sha512', $pass.$frase);  //Prèviament hem utilitzat la mateixa frase per a generar la contrasenya i desar-la a la taula $usuaris
                        
            if($usuaris[$user] == $missatgeDigest){
                echo "<h1>Benvingut $user</h1>";
            }else{
                header('Location: Pag1.php');
            }
        }

    ?>
    
</body>
</html>