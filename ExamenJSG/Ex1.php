<?php
// Pangrama vocálico
// Este ejercicio pide una frase y comprueba si contiene todas las vocales (a, e, i, o, u).
// Muestra si la frase es un pangrama vocálico o no.
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Pangrama Vocàlic</title>
</head>
<body>

    <h2>Comprovar si una frase és un pangrama vocàlic</h2>

    <form action="" method="POST">
        <label for="frase">Introdueix una frase:</label><br><br>
        <input type="text" name="frase" id="frase" required>
        <button type="submit">Comprovar</button>
    </form>

    <hr>

    <?php
    // Només executa el codi si el formulari s'ha enviat
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Obtenir la frase del formulari
        $frase = $_POST["frase"];

        // Convertim a minúscules
        $frase = strtolower($frase);

        // Comprovem si hi ha totes les vocals
        $teA = str_contains($frase, "a");
        $teE = str_contains($frase, "e");
        $teI = str_contains($frase, "i");
        $teO = str_contains($frase, "o");
        $teU = str_contains($frase, "u");

        // Mostrar resultat
        if ($teA && $teE && $teI && $teO && $teU) {
            echo "<p><strong>És un pangrama vocàlic</strong></p>";
        } else {
            echo "<p><strong>No és un pangrama vocàlic</strong></p>";
        }
    }
    ?>

</body>
</html>
