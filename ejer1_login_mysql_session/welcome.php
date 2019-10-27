<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuario registrado</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css" type="text/css" media=screen>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    //reanudamos la session del usuario creada anteriormente, 
    session_start();
    if(!isset($_SESSION["usuario"])) {// si hay algo aqui
        header("Location: index.php");//si no hay nada redirigimos a login
    }
    ?>
        <div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="titulo" class="col-xs-12 col-md-6 col-md-offset-2">
                        <h1>Bienvenido</h1> <span>
                    <?php 
                        echo "Hola:" . $_SESSION["usuario"];
                    ?>
                    </span>
                    <p>¡¡¡Esto es  solo para usuarios registrados!!!.</p>
                 </div>
                </div>
            </div>
        </div>
</body>

</html>