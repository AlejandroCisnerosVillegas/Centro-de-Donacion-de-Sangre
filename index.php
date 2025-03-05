<?php
session_start();
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
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>Tu destino digital, para tu compra ideal</h1>
                       <p>Ahorra hasta un 40%</p>
                       <a href="products.php" class="btn btn-danger">Descubre nuestros productos</a>
                   </div>
                   </center>
               </div>
           </div>
           <div class="container">
               <div class="row">
                   <div class="col-xs-4">
                       <div  class="thumbnail">
                           <a href="products.php">
                                <img src="img/hp-01.jpg" alt="Audífonos">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize">Audífonos</p>
                                        <p>Escoge entre los más destacados a nivel global.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="img/kb-04.jpg" alt="Teclados">
                           </a>
                           <center>
                                <div class="caption">
                                    <p id="autoResize">Teclados</p>
                                    <p>Teclados auténticos de las marcas líderes.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="img/lcd-01.jpg" alt="Pantallas">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Pantallas</p>
                                   <p>Explora nuestra selecta variedad de pantallas.</p>
                               </div>
                           </center>
                       </div>
                   </div>
               </div>
           </div>
            <br><br> <br><br><br><br>
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