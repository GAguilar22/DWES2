<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php    

    $nom ="Joan";
    $curs = array("ASIX1", "ASIX2", "DAM1", "DAM2","DAW1", "DAW2", "SMX1", "SMX2");
    $cursRan = array_rand($curs);
    $cursRandom = $curs[$cursRan];

    switch($cursRandom){
        case "SMX1":
            echo "$nom no és alumne de cicle superior d'informàtica.";
            break;
        case "SMX2":
            echo "$nom no és alumne de cicle superior d'informàtica."; 
            break;
        case "DAM1":
            echo "$nom, alumne de Desenvolupament  d'Aplicacions Multiplataforma de primer.";
            break;
        case "DAM2":
            echo "$nom,  alumne de Desenvolupament  d'Aplicacions Multiplataforma de segon.";
            break;
        case "DAW1":
            echo "$nom, alumne de Desenvolupament d'Aplicacion Web de primer.";
            break;
        case "DAW2":
            echo "$nom, alumne de Desenvolupament d'Aplicacions Web de segon.";
            break;
        case "ASIX1":
            echo "$nom, alumne d'administració de Sistemes Informàtics en Xarxa de primer.";
            break;
        case "ASIX2":
                echo "$nom, alumne d'administració de Sistemes Informàtics en Xarxa de segon.";
            break;
    };

?>
</body>
</html>