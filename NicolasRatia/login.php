<?php
//Configuració de la BBDD
include("dbConf.php");


//Variables de les dades 
$email=$_POST['email'];
$password=$_POST['password'];
//$remember=$_POST['remember'];


//Comprovació de connecció
try{
    $connect= mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
    if($connect){
            $query= "SELECT * FROM `user` WHERE 'email'='$email' AND 'password'='$password';";
            $users= mysqli_query($connect, $query);
            if($users){
                foreach($users as $i => $user){
                    echo $user['name'];
                }
            }else{
                include('login.php');
                echo "Els valors son incorrectes";
        }
    }

}catch(PDOException $e){
    echo"Error de connecció en ".DB_NAME;
}finally{
    mysqli_close($connect);
}
?>