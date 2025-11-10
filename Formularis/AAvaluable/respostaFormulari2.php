<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Client principal</h1>
    <?php

    //Dades del client principal
    $nom = $_POST["nomtitular"];
    $cognom = $_POST["cognomtitular"];
    $edat = $_POST["anys"];

    //Fem un boolean per a la variable estudiant del client principal
    $estudiant = $_POST["esEstudiant"];

    if($estudiant == "estudiant"){
        $esEstudiant = true;
    }else{
        $esEstudiant = false;
    }

    // Creem les variables per a que conti cuantes persones hi ha en total
    $contMenor = 0;
    $contMajor = 0;
    $contAdultDesc = 0;


    //Comprovem l'edat del client principal
    if ($edat < 12) {
        $contMenor++;   //Autoincrementem la variable del contador si es menor
    } else if ($esEstudiant) {
        $contAdultDesc++;//Autoincrementem la variable del contador si es adult estudiant
    } else {
        $contMajor++;//Autoincrementem la variable del contador si es adult
    }

    //Monstrem les dades del client principal
    echo "<p><strong> Client principal: </strong> $nom $cognom</p>";


    //Comprovem les altres persones
    for ($n = 1; $n < 4; $n++) {
        if (!empty($_POST["nom$n"])) { // Comprovem hi ha dades d'altres clients
            $edatAfegida = $_POST["anys$n"];
            //Comprovem si la persona afegida es estudiant o no
            //En la primera part, mirem si hi ha dades a la variable "esestudiant"
            //En la segona part, mirem si ha clicat a la opcio "esestudiant" o a la "noestudiant"
            $esEstudiantAfegida = isset($_POST["estudiant$n"]) && $_POST["estudiant$n"] == "estudiant";
            if(isset($_POST["estudiant$n"]) && $_POST["estudiant$n"] == "estudiant"){
                $esEstudiantAfegida = true;
            }
            //Mirem si es menor de 12 anys 
            if ($edatAfegida < 12) {
                $contMenor++; //Incrementem la variable

            } // Mirem si es major de 12 anys i alhora estudiant
            elseif ($edatAfegida >= 12 && $esEstudiantAfegida) {
                $contAdultDesc++; //Incrementem la variable

            } //Nomes entrará si és adult sense descompte
            else {
                $contMajor++; // Incrementem la variable
            }
        }
    }

    //Mostrem el número total de compradors per cada grup edat
    echo "<p><strong>Numero total entrades: </strong> $contMenor   entrades de menors de 12 anys,   $contAdultDesc  entrades d'adult estudiant, i   $contMajor   entrada d'adult <p>";
   

    //Llista de preus
    $preuMenor = 3.50;
    $preuAdultDesc = 3.50;
    $preuMajor = 5;

    //Calculem els preus totals
    $preuMenorTotal = $preuMenor * $contMenor;
    $preuDescTotal = $preuAdultDesc * $contAdultDesc;
    $preuMajorTotal = $preuMajor * $contMajor;
    $preuTotalEntrades = $preuMenorTotal + $preuDescTotal + $preuMajorTotal;

    //Mostrem el preu per franges d'edat o condicions
    echo "<p><strong> Preu per cada grup d'edat: </strong> " . $contMenor.  " menors de 12 anys: total " . $preuMenorTotal . "€, ";
    echo " $contAdultDesc adults estudiants: total " . $preuDescTotal . "€, ";
    echo " $contMajor adults : total ". $preuMajorTotal . "€ </p>";

    //Mostrem el preu total de les entrades
    echo"<p><strong> Preu total: </strong>" . $preuTotalEntrades . "€</p>";

    ?>

</body>

</html>