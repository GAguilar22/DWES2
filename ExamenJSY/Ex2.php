<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activitat 3 - PHP</title>
</head>
<body>

<form method="POST">
    <label>Introdueix la teva data de naixement (DD-MM-AAAA):</label><br>
    <input type="text" name="data" required>
    <button type="submit">Enviar</button>
</form>

<?php

$valida = false;
$dia = 0;
$mes = 0;
$any = 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $data = $_POST["data"] ?? "";
    $valida = false;

    // Comprovar format i validar la data
    $parts = explode("-", $data);

    if (count($parts) === 3) {
        $dia = intval($parts[0]);
        $mes = intval($parts[1]);
        $any = intval($parts[2]);

        // Validació de la data amb checkdate
        $valida = checkdate($mes, $dia, $any);
    }
}

    if (!$valida) {
        echo "<h3 style='color:red;'>Format incorrecte. Escriu-ho com DD-MM-AAAA.</h3>";
    } else {

        // Determinar signe del zodíac
        $signe = "";

        if (($mes == 3 && $dia >= 21) || ($mes == 4 && $dia <= 20)) {
            $signe = "Àries";
        } 
        else if (($mes == 4 && $dia >= 21) || ($mes == 5 && $dia <= 20)) {
            $signe = "Taure";
        } 
        else if (($mes == 5 && $dia >= 21) || ($mes == 6 && $dia <= 21)) {
            $signe = "Bessons";
        } 
        else if (($mes == 6 && $dia >= 22) || ($mes == 7 && $dia <= 21)) {
            $signe = "Cranc";
        } 
        else if (($mes == 7 && $dia >= 22) || ($mes == 8 && $dia <= 23)) {
            $signe = "Lleó";
        } 
        else if (($mes == 8 && $dia >= 24) || ($mes == 9 && $dia <= 23)) {
            $signe = "Verge";
        } 
        else if (($mes == 9 && $dia >= 24) || ($mes == 10 && $dia <= 22)) {
            $signe = "Balança";
        } 
        else if (($mes == 10 && $dia >= 23) || ($mes == 11 && $dia <= 22)) {
            $signe = "Escorpí";
        } 
        else if (($mes == 11 && $dia >= 23) || ($mes == 12 && $dia <= 21)) {
            $signe = "Sagitari";
        } 
        else if (($mes == 12 && $dia >= 22) || ($mes == 1 && $dia <= 20)) {
            $signe = "Capricorni";
        } 
        else if (($mes == 1 && $dia >= 21) || ($mes == 2 && $dia <= 19)) {
            $signe = "Aquari";
        } 
        else if (($mes == 2 && $dia >= 20) || ($mes == 3 && $dia <= 20)) {
            $signe = "Peixos";
        } 
        else {
            $signe = "Data invàlida";
        }

        echo "<h2>El teu signe del zodíac és: $signe</h2>";
    }

?>

</body>
</html>
