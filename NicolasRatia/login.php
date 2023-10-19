<?php
//Configuració de la BBDD
include("dbConf.php");


//Variables de les dades 
$email=$_POST['email'];
$password=$_POST['password'];

// Funció que comproba si es alumne o profesor
function comprovacio($user, $connect){
    if($user['rol']=="alumnat"){
        echo "Hola ".$user['name']." ets alumne<br>";
        echo "nom: ". $user['name']."<br>";
        echo "cognom: ". $user['surname']."<br>";
        echo "email: ". $user['email']."<br>";
    }else{
        echo "Hola ".$user['name']." ".$user['surname'].", ets professor!";
        // Select de tots els usuaris
        $query2= "SELECT * FROM `user`";
        foreach(mysqli_query($connect, $query2) as $use){
            echo "<br>nom i cognom: ". $use['name']." ".$use['surname'];
        }
    }

}

//Comprovació de connecció
try{
    $connect= mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
    if($connect){
            // Select del usuari
            $query= "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password';";
            $users= mysqli_query($connect, $query);
            if(mysqli_num_rows($users)!=0){
                foreach($users as $user){
                    comprovacio($user, $connect);
                }
            }else{
                include('login.html');
                echo "Els valors son incorrectes";
        }
    }

}catch(PDOException $e){
    echo"Error de connecció en ".DB_NAME;
}finally{
    mysqli_close($connect);
}
?>