<?php
//Inici sessió
session_start();

//Configuració de la BBDD
include ("dbConf.php");

//Variables de les dades 
$password=$_POST['password'];
$email=$_POST['email'];

//Comprovació de connecció
try{
    $connect= mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
    if($connect){
        // Select del usuari
        $query= "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password';";
        $users= mysqli_query($connect, $query);
        if(mysqli_num_rows($users)!=0){
            foreach($users as $user){
                $_SESSION['LoggedIn']=true;
                $_SESSION['name']=$user['name'];
                $_SESSION['surname']=$user['surname'];
                $_SESSION['email']=$user['email'];
                $_SESSION['rol']=$user['rol'];
                $_SESSION['user_id']=$user['user_id'];
                }
            header('Location:index.php');
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