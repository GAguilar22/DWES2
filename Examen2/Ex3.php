<!--
Crear Simulador de UF amb condicions a 2 dels 3 requisits per a poder aprovar
Afegir diferents missatges de sortida, depenent del que tingui suspes
Depenent si la nota fa mitja de 5+ o 5- mostrar missatges Apte o No apte
-->

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador UF</title>
</head>
<body>

<h2>Simulador UF amb percentatges</h2>

<form action="" method="POST">
    <label>Nota del treball</label><br>
    <input type="number" name="notaTreb" min="0" max="10" required><br><br>

    <label>Nota de l'examen:</label><br>
    <input type="number" name="notaExamen" min="0" max="10" required><br><br>

    <label>Nota de les pràctiques:</label><br>
    <input type="number" name="notaPract" min="0" max="10" required><br><br>

    <button type="submit">Calcular</button>
</form>


<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $notaTreb = $_POST["notaTreb"];
    $notaExamen = $_POST["notaExamen"];
    $notaPract = $_POST["notaPract"];

    $mitjanaSus1 = "No es pot fer la mitjana si la nota de pràctiques és inferior a 3.";
    $mitjanaSus2 = "No es pot fer la mitjana si la nota de l'examen és inferior a 4.";

    if ($notaPract < 3) {

        echo "<p>$mitjanaSus1</p>";
        echo "<p><strong>NO APTE</strong></p>";

    } else if($notaExamen < 4){

        echo "<p>$mitjanaSus2</p>";
        echo "<p><strong>NO APTE</strong></p>";

    }else {

        $mitjanaApte = ($notaTreb + $notaExamen + $notaPract) / 3;

        echo "<p>La nota mitjana és: $mitjanaApte</p>";
        if($mitjanaApte >= 5){
            echo "<p><strong>APTE</strong></p>";
        }else{
            echo "<p><strong>NO APTE</strong></p>";
        }
    }
}
?>

</body>
</html>
