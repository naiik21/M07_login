<?php
//Constant de la BBDD
define("DB_HOST", "localhost");
define("DB_NAME", "users");
define("DB_USER", "root");
define("DB_PSW", "");
define("DB_PORT", "3306");


//Connexió a la BBDD
$connect= mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);

//Variables de les dades 
$user_id=$_POST['id'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$password=$_POST['password'];
$email=$_POST['email'];
$rol=$_POST['rol'];
$active=$_POST['active'];


//Comprovació de connecció
if(!$connect){
    echo "Error de connexió: " .mysqli_connect_error();
}else{

    /*INSERT INTO `user`(`user_id`, `name`, `surname`, `password`, `email`, `rol`, `active`) VALUES ('1', 'Nicolas', 'Ratia', '1234', 'fg@gmail.com', '1', 'true');
    */
    $query= "INSERT INTO `user`(`user_id`, `name`, `surname`, `password`, `email`, `rol`, `active`) VALUES ('$user_id', '$name', '$surname', '$password', '$email', '$rol', '$active');";
    $users= mysqli_query($connect, $query);
    header('Location: resultat.php');
}
?>