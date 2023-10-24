<?php
// Fitxer de configuració
include "dbConf.php";

// CONNEXIÓ A LA BBDD
$connexio = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);

// VARIABLES PER REBRE ELS VALORS
$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['nom'];
$rol = $_POST['rol'];
$user_id = $_POST['user_id'];


session_start();

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
            foreach ($user as $us) {
                $_SESSION["LoggedIn"] = true;
                $_SESSION["Nom"] = $us["name"];
                $_SESSION["Rol"] = $us["rol"];
                $_SESSION["User_id"] = $us["user_id"];
            }
            header("Location: index.php");

            // Si l'usuari no existeix, s'inclou el formulari html i surt una frase d'avís dient que l'usuari no existeix
        } else {
            include "login.html";
            echo '<label style="color: red;">Aquest usuari no existeix!</label>';
        }
    } else {
        echo "ERROR: " . $user . "<br>" . mysqli_error($connexio);
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    mysqli_close($connexio);
}
