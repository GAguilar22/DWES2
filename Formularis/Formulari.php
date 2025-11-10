<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
    <form action="respostaFormulari.php" method="post">

    <h1><strong>Comprador principal</strong></h1>

    <label>
        <p>Nom <input type="text" name="nomTitular" id="nomTitular" required></p>
    </label>

    <label>
        <p>Cognoms <input type="text" name="cognomTitular" id="cognomTitular" required></p>
    </label>
    
    <label>
        <p>Edat <input type="number" name="anysTitular" id="anysTitular" required></p>
    </label>

    <h2>Ets estudiant?</h2>
    <label>
        <p>Estudiant <input type="radio" name="esEstudiant" id="esEstudiant" value="estudiant" required></p>
    </label>

    <label>
        <p>No Estudiant <input type="radio" name="esEstudiant" id="noEsEstudiant" value="noestudiant"></p>
    </label>

    
   
    <h2>Altres entrades:</h2>

    <?php
        for($n = 1; $n < 4; $n++){
            echo"<p>-----------------------------------</p>";

            echo "<label><p>Nom <input type='text' name='nomPersona{$n}' id='nomPersona{$n}'></p></label>";
            echo "<label><p>Cognoms <input type='text' name='cognomPersona{$n}' id='cognomPersona{$n}'></p></label>";
            echo "<label><p>Edat <input type='number' name='anysPersona{$n}' id='anysPersona{$n}'></p></label>";
            echo "<label><p>Estudiant <input type='radio' name='esEstudiantPersona{$n}' id='esEstudiantPersona{$n}' value='estudiant'></p></label>";
            echo "<label><p>No Estudiant <input type='radio' name='esEstudiantPersona{$n}' id='noEsEstudiantPersona{$n}' value='noestudiant'></p></label>";   
            
        }
    ?>

    <input type="submit" value="Pagar">

    </form>


</body>
</html>
