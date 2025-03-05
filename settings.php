<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Portal de ventas online</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <link rel="icon" href="../../assets/img/logo.png">
        <link rel="apple-touch-icon" href="../../assets/img/logo-grande.png">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h1>Modificar contraseña</h1>
                        <form method="post" action="setting_script.php">
                            <div class="form-group">
                                <input type="password" class="form-control" name="oldPassword" placeholder="Contraseña antigua">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="newPassword" placeholder="Nueva contraseña">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="retype" placeholder="Confirma nueva contraseña">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Actualizar registro">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br><br><br><br><br>
           <footer class="footer">
               <div class="container">
               <center>
                    <p>&copy; Copyright <strong><span>2024</span></strong>   <a href="https://www.linkedin.com/in/alejandro-programmer/" target="_blank"><b>Alejandro Cisneros Villegas</b></a>   v2.0.1</p>
                    <p>Todos los derechos reservados.</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
