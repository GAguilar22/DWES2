<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
    <form action="respostaFormulari2.php" method="post">

    <h1><strong>Comprador principal</strong></h1>

    <label>
        <p>Nom <input type="text" name="nomtitular" id="nomtitular" required></p>
    </label>

    <label>
        <p>Cognoms <input type="text" name="cognomtitular" id="cognomtitular" required></p>
    </label>
    
    <label>
        <p>Edat <input type="number" name="anys" id="anys" required></p>
    </label>

    <h2>Ets estudiant?</h2>
    <label>
        <p>Estudiant <input type="radio" name="esEstudiant" id="esEstudiant" value="estudiant" required></p>
    </label>

    <label>
        <p>No Estudiant <input type="radio" name="esEstudiant" id="noEstudiant" value="noestudiant"></p>
    </label>

    
    <p>-----------------------------------</p>
   

    

    <h2>Altres entrades:</h2>

    <?php
    
        $n=1;
        for($n =1; $n < 4; $n++){
            echo "<label><p>Nom <input type='text' name='nom$n' id='nom$n'></p></label>";
            echo "<label><p>Cognoms <input type='text' name='cognom$n' id='cognom$n'></p></label>";
            echo "<label><p>Edat <input type='number' name='anys$n' id='anys$n'></p></label>";
            echo "<label><p>Estudiant <input type='radio' name='estudiant$n' id='estudiant$n' value='estudiant'></p></label>";
            echo "<label><p>No Estudiant <input type='radio' name='estudiant$n' id='noesestudiant$n' value='noestudiant'></p></label>";   
            
            echo"<p>-----------------------------------</p>";
        }
       
    ?>

   
    
    <input type="submit" value="Pagar">

    </form>


</body>
</html>