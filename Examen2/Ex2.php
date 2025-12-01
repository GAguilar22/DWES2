<!--
Crear una cadena de 25 caracters amb lletres
Afegir un factor de sintesi del 1-5
Aminoacids: L,M,P,R,S
La cadena ha de contenir almenys un cop cadascun dels aminoàcids
Si no es compleix sha de tornar a generar
-->

<?php 

$cadena = "";
$aminoacids = ['L', 'M', 'P', 'R', 'S'];
do {
    $cadena = "";
    $teL = false;
    $teM = false;
    $teP = false;
    $teR = false;
    $teS = false;

    for ($i = 0; $i < 25; $i++) {
        $char = chr(rand(65, 90)); // Generem una lletra amb la taula ascii
        $cadena .= $char;
        //Utilitzo el ".= " per concatenar caracters a la cadena

        if ($char === 'L'){
          $teL = true;  
        } 
        if ($char === 'M'){
            $teM = true;
        }
        if ($char === 'P'){
            $teP = true;
        } 
        if ($char === 'R'){
            $teR = true;
        } 
        if ($char === 'S'){
            $teS = true;
        } 
    }
} while (!($teL && $teM && $teP && $teR && $teS)); 

$factorSintesi = rand(1, 5);
echo "<p>Cadena generada: $cadena</p>";
echo "<p>Factor de síntesi: $factorSintesi</p>";








?>