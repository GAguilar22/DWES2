<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php    

    $intent = 0;
    $numerorand = random_int(0,25);

    do{

        echo "<p> Intent numero $intent: El valor ha sigut: $numerorand </p>";
        
        $numerorand = random_int(0,25);
        $intent++;


    }while($numerorand != 15);
    
    echo "<p> Intent numero $intent: El valor ha sigut: $numerorand </p>";
    
    ?>
</body>
</html>