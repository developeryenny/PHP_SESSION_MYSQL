<?php
    session_start();//reanuda la session abierta y luego cierra la session abierta.
    session_destroy();//destruye la session abierta
    header("location:index.php");

?>
