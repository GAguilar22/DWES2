<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <table>
        <tr>
            <th>SIN</th>
            <th>COS</th>
        </tr>   

    <?php

        // Recorremos x de 0 a 2 con paso 0.01 y mostramos sin y cos
        for($x = 0; $x <= 2; $x = $x + 0.01) {
            $sin = sin($x);
            $cos = cos($x);

            // Formatear los números a 4 decimales para que la tabla sea legible
            $x_fmt = number_format($x, 2);
            $sin_fmt = number_format($sin, 4);
            $cos_fmt = number_format($cos, 4);

            echo "<tr>"; 
            if ($sin >= 0){
                echo "<td style='color: blue'> SIN($x): $sin</td>";
            }
            else{
                echo "<td style='color:red'> SIN($x): $sin</td";
            }


            if ($cos < 0) {
                echo "<td style='color: red'>COS($x_fmt): $cos_fmt</td>";
            } else {
                echo "<td style='color: blue'>COS($x_fmt): $cos_fmt</td>";
            }

            echo "</tr>";
        }

    ?>
    
    </table>
</body>
</html>