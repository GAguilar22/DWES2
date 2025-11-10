<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Mètode enviament POST =>Dades dades no es veuen a la URL i "Action" => arxiu on s'enviaran els resultats.-->
    <form method="post" action="recollida1.php">

    <!-- Camp de text: nom de l'usuari. El placeholder mostra un exemple d'entrada. -->
        <label for="nom">Nom: </label> <input type="text" name="nom" id="nom" placeholder="Posa el teu nom">
            <br /><br />

    <!-- Camp email: el navegador pot validar el format automàticament si el type és email. -->
        <label for="email">Email: </label> <input type="email" name="email" id="email" placeholder="asdasd@gmail.com">
            <br /><br />

            <!-- Camp contrasenya: sempre validar i fer hash al servidor; mai emmagatzemar en text pla. -->
            <label for="password">Contrasenya: </label> <input type="password" name="password" id="password">
                <br /><br />
        
    <!-- Àrea de text: comentaris de l'usuari. No deixis contingut entre les etiquetes perquè el placeholder es mostri. -->
        <label for="comentaris">Comentaris: </label> 
            <br /><br />
                <textarea name="comentaris" id="comentaris" placeholder="Escriu el teu comentari"></textarea>
            <br /><br />

        <!-- Grup de radio buttons (gènere): comparteixen 'name' però tenen ids únics -->
        <label>Genere: </label> 
        <br /><br />
        <input type="radio" name="genere" id="genere_home" value="home">
        <label for="genere_home">Home</label>
        <input type="radio" name="genere" id="genere_dona" value="dona">
        <label for="genere_dona">Dona</label>
        <br /><br />

        <!-- Checkboxes: permetre múltiples seleccions amb ids únics -->
        <label>Aficions:</label>
        <br/><br/>
        <input type="checkbox" name="aficions[]" id="aficio_videojocs" value="videojocs">
        <label for="aficio_videojocs">Videojocs</label>
        <input type="checkbox" name="aficions[]" id="aficio_esports" value="esports">
        <label for="aficio_esports">Esports</label>
        <input type="checkbox" name="aficions[]" id="aficio_musica" value="musica">
        <label for="aficio_musica">Música</label>
        <br /><br />

    <!-- Select: triar una opció entre diverses. Al servidor es rebrà el value de l'opció seleccionada. -->
        <label for="curs">Curs: </label>
            <select name="curs" id="curs">
                <option value="DAW">DAW</option>
                <option value="DAM">DAM</option>
                <option value="ASIX">ASIX</option>
            </select>
        <br /><br/>

        <label for="color">Color: </label>
            <input type="color" name="color" id="color">
            <br/><br/>

        <input type="submit" name="submit" value="Enviar">

    </form>

</body>

</html>