<?php
// Declarem la cookie amb el nom "lang" que rep per GET el valor i té una durada de 10 minuts (60 secs per 10)
setcookie("lang", $_GET["lang"], time() + 60*10);
header("Location: index.php");
?>