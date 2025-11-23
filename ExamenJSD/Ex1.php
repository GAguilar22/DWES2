<?php
// Generador de número aleatorio con fondo de color
// Este ejercicio genera un número aleatorio entre 1 y 100,
// comprueba si es par o impar, y cambia el color de fondo de la página:
// verde si es par, rojo si es impar.
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número aleatori</title>
</head>
<?php
// Generem un número aleatori entre 1 i 100
$numero = rand(1, 100);

// Comprovem si és parell o senar i assignem color de fons
if ($numero % 2 === 0) {
    $colorFons = "green"; // Parell -> Verd
} else {
    $colorFons = "red";   // Senar -> Vermell
}
?>
<body style="background-color: <?php echo $colorFons; ?>;">
    <p>El número generat és: <?php echo $numero; ?></p>
</body>
</html>
