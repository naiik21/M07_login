<p>
    <?php
    //Inici sessió
    session_start();

    //Configuració de la BBDD
    include("dbConf.php");

    // Comprovem si el usuari es logged
    if ($_SESSION['LoggedIn'] == false) {
        header('Location:login.html');
    } else {
        // Funció que retorna tots els ususaris
        function allUsers($connect, $query2){
            $totsUse = mysqli_query($connect, $query2);
            return $totsUse;
        }

        try {
            $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
            if ($connect) {
                // comprvem si la cookie te algun idioma guardat
                if (isset($_COOKIE["lang"])) {
                    if ($_COOKIE['lang'] == "cat") {
                        if ($_SESSION['rol'] == "alumnat") {
                            echo "<h2>Hola " . $_SESSION['name'] . " " . $_SESSION['surname'] . ", ets alumne!</h2>";
                        } else {
                            echo "<h2>Hola " . $_SESSION['name'] . " " . $_SESSION['surname'] . ", ets professor!</h2>";
                            ?>
                            <table border="1">
                                <tr>
                                    <th>Nom</th>
                                    <th>Cognom</th>
                                    <th>Email</th>
                                </tr>
                            <?php
                            // Select de tots els usuaris
                            $query2 = "SELECT * FROM `user`";
                            $concat = '';
                            $totUse = allUsers($connect, $query2);
                            foreach ($totUse as $use) {
                                $concat .= '<tr>';
                                $concat .= '<td>' . $use['name'] . '</td>';
                                $concat .= '<td>' . $use['surname'] . '</td>';
                                $concat .= '<td>' . $use['email'] . '</td>';
                                $concat .= '</tr>';
                            }
                            echo $concat;
                            ?>
                            </table>
                            <?php
                        }
                    } else if ($_COOKIE["lang"] == "es") {
                        if ($_SESSION['rol'] == "alumnat") {
                            echo "<h2>Hola " . $_SESSION['name'] . " " . $_SESSION['surname'] . ", eres alumno!</h2>";
                        } else {
                            echo "<h2>Hola " . $_SESSION['name'] . " " . $_SESSION['surname'] . ", eres profesor!</h2>";
                            ?>
                            <table border="1">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                </tr>
                            <?php
                            // Select de tots els usuaris
                            $query2 = "SELECT * FROM `user`";
                            $concat = '';
                            $totUse = allUsers($connect, $query2);
                            foreach ($totUse as $use) {
                                $concat .= '<tr>';
                                $concat .= '<td>' . $use['name'] . '</td>';
                                $concat .= '<td>' . $use['surname'] . '</td>';
                                $concat .= '<td>' . $use['email'] . '</td>';
                                $concat .= '</tr>';
                            }
                            echo $concat;
                            ?>
                                </table>
                            <?php
                        }
                    } else if ($_COOKIE["lang"] == "en") {
                        if ($_SESSION['rol'] == "alumnat") {
                            echo "<h2>Hello " . $_SESSION['name'] . " " . $_SESSION['surname'] . ", you are studient!</h2>";
                        } else {
                            echo "<h2>Hello " . $_SESSION['name'] . " " . $_SESSION['surname'] . ", you are teacher!</h2>";
                            ?>
                            <table border="1">
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                </tr>
                            <?php
                            // Select de tots els usuaris
                            $query2 = "SELECT * FROM `user`";
                            $concat = '';
                            $totUse = allUsers($connect, $query2);
                            foreach ($totUse as $use) {
                                $concat .= '<tr>';
                                $concat .= '<td>' . $use['name'] . '</td>';
                                $concat .= '<td>' . $use['surname'] . '</td>';
                                $concat .= '<td>' . $use['email'] . '</td>';
                                $concat .= '</tr>';
                            }
                            echo $concat;
                            ?>
                                </table>
                            <?php
                        }
                    }
                } else {
                    if ($_SESSION['rol'] == "alumnat") {
                        echo "<h2>Hola " . $_SESSION['name'] . " " . $_SESSION['surname'] . ", ets alumne!</h2>";
                    } else {
                        echo "<h2>Hola " . $_SESSION['name'] . " " . $_SESSION['surname'] . ", ets professor!</h2>";
                        ?>
                        <table border="1">
                            <tr>
                            <th>Nom</th>
                            <th>Cognom</th>
                            <th>Email</th>
                        </tr>
                        <?php
                        // Select de tots els usuaris
                        $query2 = "SELECT * FROM `user`";
                        $concat = '';
                        $totUse = allUsers($connect, $query2);
                        foreach ($totUse as $use) {
                            $concat .= '<tr>';
                            $concat .= '<td>' . $use['name'] . '</td>';
                            $concat .= '<td>' . $use['surname'] . '</td>';
                            $concat .= '<td>' . $use['email'] . '</td>';
                            $concat .= '</tr>';
                        }
                        echo $concat;
                        ?>
                        </table>
                        <?php
                    }
                }
            }
        } catch (PDOException $e) {
            echo "Error de connecció en " . DB_NAME;
        } finally {
            //mysqli_close($connect);
        }
    }
?>
</p>

<?php
if (isset($_COOKIE["lang"])) {
    if ($_COOKIE["lang"] == 'cat') {
?>
        <a style="color: red" href="idioma.php?lang=cat">Cat</a>
        <a href="idioma.php?lang=es">Es</a>
        <a href="idioma.php?lang=en">En</a>
        <a href="eliminar.php
        ">Eliminar</a><br><br>

        <a href="info.php?user_id=<?php echo $_SESSION['user_id']; ?>">Mostra més informació</a>
        <a href="desconecta.php">Desconnectar</a>
    <?php
    } else if ($_COOKIE["lang"] == 'es') {
    ?>
        <a href="idioma.php?lang=cat">Cat</a>
        <a style="color: red" href="idioma.php?lang=es">Es</a>
        <a href="idioma.php?lang=en">En</a>
        <a href="eliminar.php">Eliminar</a><br><br>

        <a href="info.php?user_id=<?php echo $_SESSION['user_id']; ?>">Mostrar mas información</a>
        <a href="desconecta.php">Desconnectar</a>
    <?php
    } else if ($_COOKIE["lang"] == 'en') {
    ?>
        <a href="idioma.php?lang=cat">Cat</a>
        <a href="idioma.php?lang=es">Es</a>
        <a style="color: red" href="idioma.php?lang=en">En</a>
        <a href="eliminar.php">Delete</a><br><br>

        <a href="info.php?user_id=<?php echo $_SESSION['user_id']; ?>">Show more info</a>
        <a href="desconecta.php">Disconnect</a>
    <?php
    }
} else {
    ?>
    <a style="color: red" href="idioma.php?lang=cat">Cat</a>
    <a href="idioma.php?lang=es">Es</a>
    <a href="idioma.php?lang=en">En</a>
    <a href="eliminar.php">Eliminar</a><br><br>

    <a href="info.php?user_id=<?php echo $_SESSION['user_id']; ?>">Mostra més informació</a>
    <a href="desconecta.php">Desconnectar</a>
<?php
}

?>