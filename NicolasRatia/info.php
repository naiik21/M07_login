<p>
<?php   
//Inici sessió
session_start();
//Configuració de la BBDD
include("dbConf.php"); 

if($_SESSION['LoggedIn']==false){
    header('Location:login.html');
}else{


$email="";
$password= "";


$ID=$_GET['user_id'];

try{
    $connect= mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
    if($connect){
            // Select del usuari
            $query= "SELECT * FROM `user` WHERE `user_id`='$ID'";
            $users= mysqli_query($connect, $query);
            if(mysqli_num_rows($users)!=0){
                foreach($users as $user){
                    echo "<h2>Informació detallada de l'usuari</h2>";
                    echo "Id usuari: ".$user['user_id']."<br>";
                    echo "Nom: ".$user['name']."<br>";
                    $email=$user['email'];
                    $password= $user['password'];
                    echo "Cognom: ".$user['surname']."<br>";
                    echo "Email: ".$user['email']."<br>";
                    echo "Rol: ".$user['rol']."<br>";
                    if($user['active']==0){
                        echo "Actiu: si<br>";  
                    }else{
                        echo "Actiu: no<br>"; 
                    }
                }
            }
        ?>
                        <a href="index.php">Torna</a>
<?php
    }

}catch(PDOException $e){
    echo"Error de connecció en ".DB_NAME;
}finally{
    mysqli_close($connect);
}
}
?>    
</p>