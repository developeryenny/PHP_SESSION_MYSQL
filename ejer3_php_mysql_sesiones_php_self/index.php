<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Solo para usuarios registrados</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css" type="text/css" media=screen>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
        <?php
        if(isset($_POST["enviar"])){
        try {
            $conectar = new PDO("mysql:host=localhost; dbname=login", "root", "");
            //PDO::ATTR_ERRMODE: Reporte de errores.
            $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "select * from usuarios_login where usuarios= :login and password= :password";
            $resul = $conectar->prepare($sql); //function prepare de php Prepara una sentencia SQL para su ejecución
            //addslashes() Escapa un string con barras invertidas
            $login = htmlentities(addslashes($_POST["login"]));
            $password = htmlentities(addslashes($_POST["password"]));
            $resul->bindValue(":login", $login); //bindValue se asigna el valor que tenga en ese momento
            $resul->bindValue(":password", $password);
            $resul->execute();
            $numero_registro = $resul->rowCount(); //rowCountsi existe el usuario devolvera 1 fila si no 0
            if ($numero_registro != 0) {
                session_start();
                // si existe el usuario entra. //variable global session_start["usuario"]
                $_SESSION["usuario"] = $_POST["login"];
               
            } else {
                echo "Error, usuario no registrado o contraseña incorrecta";
            }
        } catch (exception $e) {
            die("Error:" . $e->getMessage());
        }
    }
        ?>
<?php
if(!isset($_SESSION["usuario"])){
    include("form.php");
}else{?>
    
    <div class="container">

            <div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="titulo" class="col-xs-12 col-md-6 col-md-offset-2">
                            <h1>Bienvenido</h1> <span>
                                <?php
                                echo "Usuario:" . $_SESSION["usuario"];
                                ?>
                            </span>
                            <p>¡¡¡Esto es  solo para usuarios registrados!!!.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    
  
<?php
}
?>
        <!-- Modal HTML -->

        <div class="modal-dialog modal-login">
           
            <h2>Nuestros mejores platos</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row"><img src="img/cafe.jpg" class="img-thumbnail" alt="Responsive image"></th>
                        <td><img src="img/pastel.png" class="img-thumbnail" alt="Responsive image"></td>

                    </tr>
                    <tr>
                        <th scope="row"><img src="img/lechona.jpg" class="img-thumbnail" alt="Responsive image"></th>
                        <td><img src="img/fotoasado.jpg" class="img-thumbnail" alt="Responsive image"></td>

                    </tr>

                </tbody>
            </table>



        </div>
    </body>
</html>                            