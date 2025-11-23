<?php
// Generador de número aleatorio con fondo de color
// Este ejercicio genera un número aleatorio entre 1 y 100,
// comprueba si es par o impar, y aplica el color de fondo dinámicamente:
// verde si es par, rojo si es impar.
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número aleatori</title>
</head>
<body 
<?php
    // Generar número aleatori entre 1 i 100
    $random = rand(1, 100);

    // Comprovar si és parell o senar i posar el color de fons
    if ($random % 2 == 0) {
        echo 'style="background-color: green;"';
    } else {
        echo 'style="background-color: red;"';
    }
?>
>
    <h2>El número generat és: <?php echo $random; ?></h2>
</body>
</html>
