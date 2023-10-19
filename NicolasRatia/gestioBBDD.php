<?php
//Configuració de la BBDD
include("dbConf.php");


//Variables de les dades 
$user_id=$_POST['id'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$password=$_POST['password'];
$email=$_POST['email'];
$rol=$_POST['rol'];
$active=$_POST['active'];


//Comprovació de connecció
try{
    $connect= mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
    if($connect){
        //Insert
        try{
            $query= "INSERT INTO `user`(`user_id`, `name`, `surname`, `password`, `email`, `rol`, `active`) VALUES ('$user_id', '$name', '$surname', '$password', '$email', '$rol', '$active');";
            $users= mysqli_query($connect, $query);
            include('formulari.html');
            echo "Usuari registrat";
        }catch(mysqli_sql_exception $e){
            include('formulari.html');
            echo ''. $e->getMessage();

        }
    }

}catch(PDOException $e){
    echo"Error de connecció en ".DB_NAME;
}finally{
    mysqli_close($connect);
}

?>