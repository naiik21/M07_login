<?php

/********* FITXER QUE ES MOSTRA UN COP L'USUARI HA INICIAT SESSIÓ *********/
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WENO</title>
</head>

<body>
    <?php
    include "dbConf.php";
    echo "<h2>Hola " . $_SESSION["Nom"] . ". El teu rol és: " . $_SESSION["Rol"] . "</h2>";

    // Enllaç a la pàgina info.php per mostrar informació de l'usuari amb el mètode GET per rebre l'ID
    echo "<a href='info.php?user_id=" . $_SESSION['User_id'] . "'>Mostrar més informació</a><br>";
    echo "<a href='logout.php'>Desconnectar-se</a><br>";

    if ($_SESSION["Rol"] == "professorat") {
        echo "<br>La llista d'usuaris de la base de dades és:<br> ";
        $connexio = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);
        // S'ha de fer una altra query a la bbdd junt amb un foreach
        $query2 = "SELECT * FROM user";
        $user2 = mysqli_query($connexio, $query2);
        echo "<table border='1'>";
        echo "<tBody>";
        foreach ($user2 as $use) {
            echo "<tr>";
            echo "<td>Nom i cognom:</td> " . " <td>" . $use["name"] . " " . $use["surname"] . "</td>";
        }
        echo "</tBody>";
        echo "</table>";
    }

    ?>
</body>

</html>