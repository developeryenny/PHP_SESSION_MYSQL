<?php

try {
    $conectar= new PDO("mysql:host=localhost; dbname=login", "root", "");
    //PDO::ATTR_ERRMODE: Reporte de errores.
    $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "select * from usuarios_login where usuarios= :login and password= :password";
    $resul =$conectar->prepare($sql); //function prepare de php Prepara una sentencia SQL para su ejecución
    //addslashes() Escapa un string con barras invertidas
    $login=htmlentities(addslashes($_POST["login"]));
    $password= htmlentities(addslashes($_POST["password"]));
    $resul->bindValue(":login", $login); //bindValue se asigna el valor que tenga en ese momento
    $resul->bindValue(":password", $password);
    $resul->execute();
    $numero_registro=$resul->rowCount();//rowCountsi existe el usuario devolvera 1 fila si no 0
    if($numero_registro!= 0){
        session_start();
        // si existe el usuario entra. //variable global session_start["usuario"]
        $_SESSION["usuario"]=$_POST["login"];
        header ("Location: welcome.php"); 
    }else{
        header("Location: index.php");
    }
}catch(exception $e){
    die("Error:" . $e->getMessage());
}


?>