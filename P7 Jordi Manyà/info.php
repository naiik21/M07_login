<?php

/********* FITXER QUE MOSTRA INFORMACIÓ DETALLADA DE L'USUARI AMB LA SEVA ID I EL MÈTODE GET *********/

// Inici sessió
session_start();

// Fitxer de configuració de la bbdd
include("dbConf.php");

// Si el valor de LoggedIn és false, redirigiex al menú de login
if ($_SESSION['LoggedIn'] == false) {
    header('Location:login.html');
} else {

    // Variable del ID d'usuari que hem obtingut amb el mètode GET
    $user_id = $_GET['user_id'];

    try {
        $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);
        if ($connect) {
            // Query a la base de dades
            $query = "SELECT * FROM `user` WHERE `user_id`='$user_id'";
            $users = mysqli_query($connect, $query);

            // Es mostra el contingut segons el valor de la cookie. Si no en té cap, es mostra en català
            if ($_COOKIE["lang"] == "es") {
                if (mysqli_num_rows($users) != 0) { // Si hi ha algún resultat a la BBDD es fa un foreach per mostrar les dades
                    foreach ($users as $user) {
                        echo "<h2>Información detallada del usuario</h2>";
                        echo "Id usuario: " . $user['user_id'] . "<br>";
                        echo "Nombre: " . $user['name'] . "<br>";
                        echo "Apellido: " . $user['surname'] . "<br>";
                        echo "Email: " . $user['email'] . "<br>";
                        echo "Rol: " . $user['rol'] . "<br>";
                        if ($user['Rol'] == 0) {
                            echo "Activo: si<br>";
                        } else {
                            echo "Activo: no<br>";
                        }
                    }
                }
                echo "<a href='index.php'>Volver</a>";
            } else if ($_COOKIE["lang"] == "en") {
                if (mysqli_num_rows($users) != 0) {
                    foreach ($users as $user) {
                        echo "<h2>Detailed information about the user</h2>";
                        echo "User ID: " . $user['user_id'] . "<br>";
                        echo "Name: " . $user['name'] . "<br>";
                        echo "Surname: " . $user['surname'] . "<br>";
                        echo "Email: " . $user['email'] . "<br>";
                        echo "Role: " . $user['rol'] . "<br>";
                        if ($user['Rol'] == 0) {
                            echo "Active: yes<br>";
                        } else {
                            echo "Active: no<br>";
                        }
                    }
                }
                echo "<a href='index.php'>Return</a>";
            } else {
                if (mysqli_num_rows($users) != 0) {
                    foreach ($users as $user) {
                        echo "<h2>Informació detallada de l'usuari</h2>";
                        echo "Id usuari: " . $user['user_id'] . "<br>";
                        echo "Nom: " . $user['name'] . "<br>";
                        echo "Cognom: " . $user['surname'] . "<br>";
                        echo "Email: " . $user['email'] . "<br>";
                        echo "Rol: " . $user['rol'] . "<br>";
                        if ($user['Rol'] == 0) {
                            echo "Actiu: si<br>";
                        } else {
                            echo "Actiu: no<br>";
                        }
                    }
                }
                echo "<a href='index.php'>Torna</a>";
            }
        }
    } catch (PDOException $e) {
        echo "Error de connexió en " . DB_NAME;
    } finally {
        mysqli_close($connect);
    }
}
