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

    // Comprovem si la sessió és vàlida. Si no ho és, torna a l'index
    if ($_SESSION['LoggedIn'] == false) {
        header('Location:login.html');
    }


    // TRY CATCH amb la connexió a la BBDD
    try {
        $connexio = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);
        if ($connexio) {
            // Comprovem si la cookie està informada. Si no ho està es mostra la pàgina per defecte (cat)
            if (isset($_COOKIE["lang"])) {
                // Si la cookie té el valor "cat", es mostra la pàgina en català. El mateix amb la resta
                if ($_COOKIE["lang"] == "cat") {
                    if ($_SESSION["Rol"] == "alumnat") {
                        echo "<h2>Hola " . $_SESSION["Nom"] . ". Ets un alumne</h2>";
                    } else {
                        echo "<h2>Hola " . $_SESSION["Nom"] . ". Ets un professor</h2>";
                        echo "<a style='color: red' href='idioma.php?lang=cat'>Cat</a>" . " ";
                        echo "<a href='idioma.php?lang=es'>Es</a>" . " ";
                        echo "<a href='idioma.php?lang=en'>En</a>" . " ";
                        echo "<a href='delete.php'>Eliminar</a><br>";

                        // Enllaç a la pàgina info.php per mostrar informació de l'usuari amb el mètode GET per rebre l'ID
                        echo "<a href='info.php?user_id=" . $_SESSION['User_id'] . "'>Mostrar més informació</a><br>";
                        echo "<a href='logout.php'>Desconnectar-se</a><br>";

                        echo "<br>La llista d'usuaris de la base de dades és:<br> ";

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
                } else if ($_COOKIE["lang"] == "es") {
                    if ($_SESSION["Rol"] == "alumnat") {
                        echo "<h2>Hola " . $_SESSION["Nom"] . ". Eres un alumno</h2>";
                    } else {
                        echo "<h2>Hola " . $_SESSION["Nom"] . ". Eres un profesor</h2>";
                        echo "<a href='idioma.php?lang=cat'>Cat</a>" . " ";
                        echo "<a style='color: red' href='idioma.php?lang=es'>Es</a>" . " ";
                        echo "<a href='idioma.php?lang=en'>En</a>" . " ";
                        echo "<a href='delete.php'>Eliminar</a><br>";

                        // Enllaç a la pàgina info.php per mostrar informació de l'usuari amb el mètode GET per rebre l'ID
                        echo "<a href='info.php?user_id=" . $_SESSION['User_id'] . "'>Mostrar mas información</a><br>";
                        echo "<a href='logout.php'>Desconectarse</a><br>";

                        echo "<br>La lista de usuarios de la base de datos es:<br> ";

                        // S'ha de fer una altra query a la bbdd junt amb un foreach
                        $query2 = "SELECT * FROM user";
                        $user2 = mysqli_query($connexio, $query2);
                        echo "<table border='1'>";
                        echo "<tBody>";
                        foreach ($user2 as $use) {
                            echo "<tr>";
                            echo "<td>Nombre y apellido:</td> " . " <td>" . $use["name"] . " " . $use["surname"] . "</td>";
                        }
                        echo "</tBody>";
                        echo "</table>";
                    }
                } else if ($_COOKIE["lang"] == "en") {
                    if ($_SESSION["Rol"] == "alumnat") {
                        echo "<h2>Hello " . $_SESSION["Nom"] . ". You are a student</h2>";
                    } else {
                        echo "<h2>Hello " . $_SESSION["Nom"] . ". You are a teacher</h2>";
                        echo "<a href='idioma.php?lang=cat'>Cat</a>" . " ";
                        echo "<a href='idioma.php?lang=es'>Es</a>" . " ";
                        echo "<a style='color: red' href='idioma.php?lang=en'>En</a>" . " ";
                        echo "<a href='delete.php'>Delete</a><br>";

                        // Enllaç a la pàgina info.php per mostrar informació de l'usuari amb el mètode GET per rebre l'ID
                        echo "<a href='info.php?user_id=" . $_SESSION['User_id'] . "'>Show more information</a><br>";
                        echo "<a href='logout.php'>Disconnect</a><br>";

                        echo "<br>The list from the users in the database is: <br> ";

                        // S'ha de fer una altra query a la bbdd junt amb un foreach
                        $query2 = "SELECT * FROM user";
                        $user2 = mysqli_query($connexio, $query2);
                        echo "<table border='1'>";
                        echo "<tBody>";
                        foreach ($user2 as $use) {
                            echo "<tr>";
                            echo "<td>Name and surname:</td> " . " <td>" . $use["name"] . " " . $use["surname"] . "</td>";
                        }
                        echo "</tBody>";
                        echo "</table>";
                    }
                }

                // Per defecte, si la cookie no té cap valor, es mostra la pàgina en català
            } else {
                if ($_SESSION["Rol"] == "alumnat") {
                    echo "<h2>Hola " . $_SESSION["Nom"] . ". Ets un alumne</h2>";
                } else {
                    echo "<h2>Hola " . $_SESSION["Nom"] . ". Ets un professor</h2>";
                    echo "<a style='color: red' href='idioma.php?lang=cat'>Cat</a>" . " ";
                    echo "<a href='idioma.php?lang=es'>Es</a>" . " ";
                    echo "<a href='idioma.php?lang=en'>En</a>" . " ";
                    echo "<a href='delete.php'>Eliminar</a><br>";

                    // Enllaç a la pàgina info.php per mostrar informació de l'usuari amb el mètode GET per rebre l'ID
                    echo "<a href='info.php?user_id=" . $_SESSION['User_id'] . "'>Mostrar més informació</a><br>";
                    echo "<a href='logout.php'>Desconnectar-se</a><br>";

                    echo "<br>La llista d'usuaris de la base de dades és:<br> ";

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
            }
        } else {
            echo "connexio  incorrecte";
        }
    } catch (PDOException $e) {
        echo "Ha sorgit un error. Codi d'error: " . $e;
    }

    ?>
</body>

</html>