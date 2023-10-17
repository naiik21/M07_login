<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de dades</title>
</head>

<body>
    <?php
    // CONSTANTS DE LA CONNEXIÓ A LA BASE DE DADES
    define("DB_HOST", "localhost");
    define("DB_NAME", "Users");
    define("DB_USER", "root");
    define("DB_PSW", "");

    // CONNEXIÓ A LA BBDD
    $connexio = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);

    var_dump($connexio);

    // VARIABLES PER REBRE ELS VALORS
    $user_id = $_POST['user_id'];
    $name = $_POST['nom'];
    $surname = $_POST['cognom'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $active = $_POST['active'];

    // CONDICIONAL PER SABER SI LA CONNEXIÓ ÉS CORRECTA
    if (!$connexio) {
        echo "Error de connexió " . mysqli_connect_error();
    }
    try {
        $query = "INSERT INTO user (user_id, name, surname, password, email, rol, active) VALUES ($user_id, '$name', '$surname', '$password', '$email', '$rol', $active)";
        if ($user = mysqli_query($connexio, $query)) {
            header('Location: resultat.php');
        } else {
            echo "ERROR: " . $user . "<br>" . mysqli_error($connexio);
        }
        mysqli_close($connexio);

    } catch (Exception $e) {
        echo "Error: " - $e -> getMessage();
    }

    

    ?>
</body>

</html>