<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activitat 2 - PHP</title>
</head>
<body>

<h2>Taula de valors del sinus i cosinus (0 a 2)</h2>

<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>x</th>
        <th>sin(x)</th>
        <th>cos(x)</th>
    </tr>

<?php
for ($x = 0; $x <= 2; $x += 0.01) {

    $sin = sin($x);
    $cos = cos($x);

    // Assignem color amb if/else segons el valor
    if ($sin >= 0) {
        $colorSin = "blue";
    } else {
        $colorSin = "red";
    }

    if ($cos >= 0) {
        $colorCos = "blue";
    } else {
        $colorCos = "red";
    }

    echo "<tr>";
    echo "<td>" . number_format($x, 2) . "</td>";
    echo "<td style='color:$colorSin'>" . number_format($sin, 4) . "</td>";
    echo "<td style='color:$colorCos'>" . number_format($cos, 4) . "</td>";
    echo "</tr>";
}
?>
</table>

</body>
</html>
