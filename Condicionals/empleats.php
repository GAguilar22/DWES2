<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    if (($empleat<2) || ($hores <20)) {
        echo "Principiant";
    } elseif (($empleat <=5) || ($hores <= 40)){
        echo"Intermedi";
    }else {
        echo "Expert";
    }
        
    ?>
</body>
</html>