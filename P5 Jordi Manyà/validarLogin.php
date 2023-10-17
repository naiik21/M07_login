<?php
// Fitxer de configuració
require 'dbConf.php';

// CONNEXIÓ A LA BBDD
$connexio = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);

var_dump($connexio);

// VARIABLES PER REBRE ELS VALORS
$email = $_POST['email'];
$password = $_POST['password'];

// CONDICIONAL PER SABER SI LA CONNEXIÓ ÉS CORRECTA
if (!$connexio) {
    echo "Error de connexió " . mysqli_connect_error();
}
try {
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password';";
    $user = mysqli_query($connexio, $query);
    if ($user) {
        header('Location: resultat.php');
    } else {
        echo "ERROR: " . $user . "<br>" . mysqli_error($connexio);
    }
} catch (Exception $e) {
    echo "Error: " - $e->getMessage();
} finally {
    mysqli_close($connexio);
}
