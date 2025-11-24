<?php
// Calculadora de nota final
// Este ejercicio pide tres notas (actividades, examen y portafolio),
// comprueba si alguna de las dos primeras es menor que 4 (NO APTE),
// y si ambas son 4 o más, calcula y muestra la media (APTE).
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Càlcul de nota</title>
</head>
<body>

<h2>Calculadora de nota final</h2>

<form action="" method="POST">
    <label>Nota de les activitats:</label><br>
    <input type="number" name="notaAct" min="0" max="10" required><br><br>

    <label>Nota de l'examen:</label><br>
    <input type="number" name="notaExamen" min="0" max="10" required><br><br>

    <label>Nota del portafolis:</label><br>
    <input type="number" name="notaPorta" min="0" max="10" required><br><br>

    <button type="submit">Calcular</button>
</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recollim les dades del formulari directament
    $notaAct = $_POST["notaAct"];
    $notaExamen = $_POST["notaExamen"];
    $notaPorta = $_POST["notaPorta"];

    $mitjanaSus = "No s'ha pogut calcular la nota mitjana perquè no has arribat als mínims.";

    echo "<p>La nota de les activitats és: $notaAct</p>";
    echo "<p>La nota de l'examen és: $notaExamen</p>";
    echo "<p>La nota del portfolis és: $notaPorta</p>";

    // Condicions iguals que en JavaScript
    if ($notaAct < 4 || $notaExamen < 4) {

        echo "<p><strong>NO APTE</strong></p>";
        echo "<p>$mitjanaSus</p>";

    } else {

        $mitjanaApte = ($notaAct + $notaExamen + $notaPorta) / 3;

        echo "<p><strong>APTE</strong></p>";
        echo "<p>La nota mitjana és: $mitjanaApte</p>";
    }
}
?>

</body>
</html>
