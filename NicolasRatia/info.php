<p>
    <?php
    //Inici sessió
    session_start();

    //Configuració de la BBDD
    include("dbConf.php");

    if ($_SESSION['LoggedIn'] == false) {
        header('Location:login.html');
    } else {
        $email = "";
        $password = "";

        $ID = $_GET['user_id'];

        try {
            $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
            if ($connect) {
                // Select del usuari
                $query = "SELECT * FROM `user` WHERE `user_id`='$ID'";
                $users = mysqli_query($connect, $query);

                if (isset($_COOKIE['lang'])) {
                    if ($_COOKIE['lang'] == "cat") {
                        if (mysqli_num_rows($users) != 0) {
                            foreach ($users as $user) {
                                echo "<h2>Informació detallada de l'usuari</h2>";
                                echo "Id usuari: " . $user['user_id'] . "<br>";
                                echo "Nom: " . $user['name'] . "<br>";
                                $email = $user['email'];
                                $password = $user['password'];
                                echo "Cognom: " . $user['surname'] . "<br>";
                                echo "Email: " . $user['email'] . "<br>";
                                echo "Rol: " . $user['rol'] . "<br>";
                                if ($user['active'] == 0) {
                                    echo "Actiu: si<br>";
                                } else {
                                    echo "Actiu: no<br>";
                                }
                            }
                        }
                 ?>
                        <a href="index.php">Torna</a>
                    <?php
                    } else if ($_COOKIE['lang'] == "es") {
                        if (mysqli_num_rows($users) != 0) {
                            foreach ($users as $user) {
                                echo "<h2>Información detallada del usuario</h2>";
                                echo "Id usuario: " . $user['user_id'] . "<br>";
                                echo "Nombre: " . $user['name'] . "<br>";
                                $email = $user['email'];
                                $password = $user['password'];
                                echo "Apellido: " . $user['surname'] . "<br>";
                                echo "Email: " . $user['email'] . "<br>";
                                echo "Rol: " . $user['rol'] . "<br>";
                                if ($user['active'] == 0) {
                                    echo "Activo: si<br>";
                                } else {
                                    echo "Activo: no<br>";
                                }
                            }
                        }
                    ?>
                        <a href="index.php">Volver</a>
                    <?php
                    } else if ($_COOKIE['lang'] == "en") {
                        if (mysqli_num_rows($users) != 0) {
                            foreach ($users as $user) {
                                echo "<h2>Informacion of the user</h2>";
                                echo "Id user: " . $user['user_id'] . "<br>";
                                echo "Name: " . $user['name'] . "<br>";
                                $email = $user['email'];
                                $password = $user['password'];
                                echo "Surname: " . $user['surname'] . "<br>";
                                echo "Email: " . $user['email'] . "<br>";
                                echo "Rol: " . $user['rol'] . "<br>";
                                if ($user['active'] == 0) {
                                    echo "Active: yes<br>";
                                } else {
                                    echo "Active: no<br>";
                                }
                            }
                        }
                    ?>
                        <a href="index.php">Return</a>
                    <?php
                    }
                } else {
                    if (mysqli_num_rows($users) != 0) {
                        foreach ($users as $user) {
                            echo "<h2>Informació detallada de l'usuari</h2>";
                            echo "Id usuari: " . $user['user_id'] . "<br>";
                            echo "Nom: " . $user['name'] . "<br>";
                            $email = $user['email'];
                            $password = $user['password'];
                            echo "Cognom: " . $user['surname'] . "<br>";
                            echo "Email: " . $user['email'] . "<br>";
                            echo "Rol: " . $user['rol'] . "<br>";
                            if ($user['active'] == 0) {
                                echo "Actiu: si<br>";
                            } else {
                                echo "Actiu: no<br>";
                            }
                        }
                    }
                    ?>
                    <a href="index.php">Torna</a>
    <?php
                }
            }
        } catch (PDOException $e) {
            echo "Error de connecció en " . DB_NAME;
        } finally {
            mysqli_close($connect);
        }
    }
    ?>
</p>