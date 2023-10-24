<?php
session_start();

$_SESSION["LoggedIn"] = true;
$_SESSION["Nom"] = $name;
$_SESSION["Rol"] = $rol;
$_SESSION["User_id"] = $user_id;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>

<body>
    <div class="content">
        <h1 style="text-align: center">LOGIN</h1>
        <form name="Formulari usuaris" action="validar.php" method="post">

            <label for="email">Email:</label><br>
            <input type="text" name="email" required><br>

            <label for="password">Contrasenya:</label><br>
            <input type="password" name="password" required><br>

            <input type="checkbox" name="remember">
            <label for="remember">Recorda'm</label><br><br>

            <input type="button" value="Crear un usuari" onclick="window.location.href='formulari.html'"><br><br>

            <input type="submit" value="Submit"><br>
        </form>
    </div>
</body>

</html>