<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $botiga = array(
        "sabata" => array ("preu" =>5, "quantitat" => 45),
        "babutxa" => array ("preu" => 2, "quantitat" => 20),
        "bota" => array ("preu" =>4, "quantitat" => 150),
    );
    print "<h1>Sabateria Gerard</h1>";
    foreach ($botiga as $item =>$quantitat){
        print "<li>$item</li>";
        print"<ul>";
        foreach ($quantitat as $preu){
            print "<li>$preu</li>";
        }
        print"</ul>";
        
    }

    $botiga["sabata"]["preu"]=55;
    unset($botiga["babutxa"]);
    array_pop($botiga);
    $botiga["bambes"]=array("preu"=>160,"quantitat"=>2);

    echo "<h1>Sabateria Gerard preus 2025</h1>";
    foreach ($botiga as $item=>$valors_sabata){
        print "<h2>$item</h2>";
        print"<ul>";
        foreach ($valors_sabata as $propietat=>$valor){
            print "<li>$valor</li>";
        }
    print "</ul>";
    }   

    ?>
</body>
</html>