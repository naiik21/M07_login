<?php
session_start();
$_SESSION['LoggedIn']=false;
// eliminiem totes les variables sessions
session_unset();

// eliminem la sessió
session_destroy();

header('Location:login.html');
?>