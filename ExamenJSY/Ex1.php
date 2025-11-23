<?php
// Calculadora de edad
// Este ejercicio pide una fecha de nacimiento en formato DD-MM-AAAA,
// la valida y calcula la diferencia respecto a la fecha actual en años, días, horas, minutos y segundos.
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activitat 1 - PHP</title>
</head>
<body>

<form method="POST">
    <label>Introdueix el missatge en minúscules:</label><br>
    <input type="text" name="missatge" required><br><br>
    <button type="submit">Xifrar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $missatge = $_POST["missatge"] ?? "";
    $resultat = "";
    $alfabet = "abcçdefghijklmnopqrstuvwxyz";
    $desplacament = 5;

    for ($i = 0; $i < strlen($missatge); $i++) {
        $lletra = $missatge[$i];
        $posicio = strpos($alfabet, $lletra);

        if ($posicio === false) {
            // No és una lletra
            $resultat .= $lletra;
        } else {
            $novaPos = ($posicio + $desplacament) % strlen($alfabet);
            $resultat .= $alfabet[$novaPos];
        }
    }

    echo "<h3>Frase original: $missatge</h3>";
    echo "<h3>Frase xifrada: $resultat</h3>";
}
?>

</body>
</html>
