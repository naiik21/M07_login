<?php
// Fitxer de configuració
include "dbConf.php";

// CONNEXIÓ A LA BBDD
$connexio = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);

// VARIABLES PER REBRE ELS VALORS
$email = $_POST['email'];
$password = $_POST['password'];

// CONDICIONAL PER SABER SI LA CONNEXIÓ ÉS CORRECTA
if (!$connexio) {
    echo "Error de connexió " . mysqli_connect_error();
}

// Try catch per fer la connexió amb la bbdd
try {
    // Sentència SQL per comprovar l'existència de l'usuari
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password';";

    // Mètode per fer la query a la bbdd
    $user = mysqli_query($connexio, $query);

    // Si la conexió és true segueix el procés
    if ($user) {

        // Mètode que comprova si hi ha alguna fila de retorn. Si no hi ha cap salta error
        $num = mysqli_num_rows($user);
        if ($num > 0) {

            // Bucle foreach per mostrar les dades
            foreach ($user as $us) {

                // Si l'usuari és alumne, es retornen les seves dades personals
                if ($us["rol"] == "alumnat") {
                    echo "Hola Alumne!<br>";
                    echo "\tNom: " . $us["name"] . "<br>";
                    echo "\tCognom: " . $us["surname"] . "<br>";
                    echo "\tEmail: " . $us["email"] . "<br>";

                    // Si l'usuari és professor, es retornen tots els usuaris de la base de dades
                } else {
                    echo "Hola " . $us["name"] . ", ets professor!<br>";
                    echo "<br>La llista d'usuaris de la base de dades és:<br> ";

                    // S'ha de fer una altra query a la bbdd junt amb un foreach
                    $query2 = "SELECT * FROM user";
                    $user2 = mysqli_query($connexio, $query2);
                    foreach ($user2 as $use) {
                        echo "Nom i cognom: " . $use["name"] . " " . $use["surname"] . "<br>";
                    }
                }
            }

            // Si l'usuari no existeix, s'inclou el formulari html i surt una frase d'avís dient que l'usuari no existeix
        } else {
            include "login.html";
            echo '<label style="color: red;">Aquest usuari no existeix!</label>';
        }
    } else {
        echo "ERROR: " . $user . "<br>" . mysqli_error($connexio);
    }
} catch (Exception $e) {
    echo "Error: " - $e->getMessage();
} finally {
    mysqli_close($connexio);
}
