<?php
/********* FITXER PER A DESCONNECTAR DE LA SESSIÓ A L'USUARI *********/

session_start();

// Canviem l'estat de loggedIn de true a false
$_SESSION['LoggedIn']=false;

// Mètode per eliminar les variables de sessió
session_unset();

// Mètode per eliminar la sessió
session_destroy();

// Redirecció al menú de login
header('Location:login.html');
?>