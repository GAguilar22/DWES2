<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activitat 1 - PHP</title>
</head>
<body>

<!-- Formulari per introduir la data de naixement -->
<form method="POST">
    <label>Introdueix la teva data de naixement (DD-MM-AAAA):</label><br>
    <input type="text" name="data" required>
    <button type="submit">Calcular</button>
</form>

<?php
// Comprovem si el formulari ha estat enviat
// $_SERVER["REQUEST_METHOD"] és el mètode HTTP amb què s'ha fet la petició
// En aquest cas volem processar només si s'ha fet POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recollim la data del formulari; si no existeix, assignem cadena buida
    $data = $_POST["data"] ?? "";
    $valida = false;

    // Comprovem que la data tingui el format mínim amb "-"
    if (strpos($data, "-") !== false) {
        $parts = explode("-", $data); // Separem dia, mes i any

        if (count($parts) === 3) {
            $dia = intval($parts[0]);   // Convertim a enter
            $mes = intval($parts[1]);
            $any = intval($parts[2]);

            // Validació real de la data amb la funció checkdate(mes, dia, any)
            // Retorna true si la data és correcta
            if (checkdate($mes, $dia, $any)) {
                $valida = true;
            }
        }
    }

    // Si la data no és vàlida, mostrem un missatge d'error
    if (!$valida) {
        echo "<h3 style='color:red;'>Format incorrecte. Escriu-ho com DD-MM-AAAA.</h3>";
    } else {
        // Creem objectes DateTime per a la data de naixement i la data actual
        $dataNaix = new DateTime("$any-$mes-$dia");
        $ara = new DateTime();

        // Diferència en segons entre avui i la data de naixement
        $diffSegons = $ara->getTimestamp() - $dataNaix->getTimestamp();

        // Convertim segons a dies, hores, minuts i anys
        $dies = $diffSegons / (60 * 60 * 24);
        $hores = $diffSegons / (60 * 60);
        $minuts = $diffSegons / 60;
        $anys = $dies / 365.25; // Inclou anys de traspàs
        $segons = $diffSegons;

        // Mostrem els resultats
        echo "<h3>Diferència respecte avui:</h3>";
        echo "<ul>";
        // number_format() s'utilitza per limitar els decimals i millorar la presentació
        echo "<li>Anys: " . number_format($anys, 2) . "</li>";
        echo "<li>Dies: " . number_format($dies, 2) . "</li>";
        echo "<li>Hores: " . number_format($hores, 2) . "</li>";
        echo "<li>Minuts: " . number_format($minuts, 2) . "</li>";
        echo "<li>Segons: " . number_format($segons, 2) . "</li>";
        echo "</ul>";
    }
}
?>

</body>
</html>
