<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptar segments d'una hora - PHP</title>
</head>
<body>

<form method="POST">
    <label>Introdueix una hora en format HH:MM:SS:</label><br>
    <input type="text" name="hora" required>
    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $hora = $_POST["hora"] ?? "";
    $valida = false;

    // Comprovem que la cadena contingui dos punts i tres blocs
    $dades = explode(":", $hora);
    if (count($dades) === 3) {
        $h = intval($dades[0]);
        $m = intval($dades[1]);
        $s = intval($dades[2]);

        // Validem format i rang de valors
        if (strlen($dades[0]) == 2 && strlen($dades[1]) == 2 && strlen($dades[2]) == 2 &&
            $h >= 0 && $h <= 23 &&
            $m >= 0 && $m <= 59 &&
            $s >= 0 && $s <= 59) {
            $valida = true;
        }
    }

    if (!$valida) {
        echo "<h3 style='color:red;'>Format incorrecte. Escriu l'hora com HH:MM:SS.</h3>";
    } else {
        // Array amb nombre de segments de cada dígit
        $segments = [6, 2, 5, 5, 4, 5, 6, 3, 7, 6];
        $contador = 0;

        // Comptem els segments de cada dígit
        foreach ($dades as $part) {
            for ($i = 0; $i < strlen($part); $i++) {
                $digit = intval($part[$i]);
                $contador += $segments[$digit];
            }
        }

        echo "<h3>L'hora $hora té un total de $contador segments</h3>";
    }
}
?>

</body>
</html>
