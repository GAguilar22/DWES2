<!--
Crea un programa per generar un codi de llançament
-->
<?php
$num1 = rand(100, 999);
$num2 = rand(100,999);
$num3 = rand(100,999);

$lletra = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$lletra = substr($lletra, 0, 1);

// $lletra = $lletra[rand(0, strlen($lletra) - 1)];

$seguretat = rand(0,9);
echo "<p>Codi de llançament generat: </p>";
echo "<p>Seccions: " . $num1 . " - " . $num2 . " - " . $num3 .  "</p>";
echo "<p>Lletra de control: " . $lletra . "</p>";
echo "<p>Codi de seguretat: " . $seguretat . "</p>";

?>