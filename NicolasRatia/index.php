<p>
<?php   
//Inici sessió
session_start();
//Configuració de la BBDD
include ("dbConf.php");

if($_SESSION['LoggedIn']==false){
    header('Location:login.html');
}else{
    

// Funció que retorna tots els ususaris
function allUsers($connect, $query2){
    $totsUse= mysqli_query($connect, $query2);
    return $totsUse;
 
}

try{
    $connect= mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME, DB_PORT);
    if($connect){
        if($_SESSION['rol']=="alumnat"){
            echo "<h2>Hola ".$_SESSION['name']." ".$_SESSION['surname'].", ets alumne!</h2>";
        }else{
            echo "<h2>Hola ".$_SESSION['name']." ".$_SESSION['surname'].", ets professor!</h2>";
?>
            <table border="1">
                <tr>
                    <th>Nom</th>
                    <th>Cognom</th>
                    <th>Email</th>
                </tr>
<?php
                // Select de tots els usuaris
                $query2= "SELECT * FROM `user`";
                $concat = '';
                $totUse= allUsers($connect, $query2);
                foreach($totUse as $use){
                    $concat .= '<tr>';
                    $concat .= '<td>' . $use['name'] .'</td>';
                    $concat .= '<td>' . $use['surname'] .'</td>';
                    $concat .= '<td>' . $use['email'] .'</td>';
                    $concat .= '</tr>';
                }
                echo $concat;
?>
            </table>
<?php
        }
    }
}catch(PDOException $e){
    echo"Error de connecció en ".DB_NAME;
}finally{
    //mysqli_close($connect);
}
}
?>    
</p>
<a href="info.php?user_id=<?php echo $_SESSION['user_id']; ?>">Mostra més informació</a>
<a href="desconecta.php">Desconnectar</a>