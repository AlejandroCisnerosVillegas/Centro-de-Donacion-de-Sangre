<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Centro de Donación de Sangre</title>
    <link rel="icon" href="../../../assets/img/logo.png">
    <link rel="apple-touch-icon" href="../../../assets/img/logo-grande.png">
    <link href="css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <h1 class="mt-4 mb-3">
            Centro de Donación de Sangre
              <br>Inicio de Sesión de Administrador
            </h1>
          </div>
        </div>
        <div class="card" style="background-image: url('image/form.png');">
          <div class="card-body">
            <div class="row justify-content-center">
              <div class="col-lg-10 mb-3 ">
                <div class="font-italic">Nombre de Usuario<span style="color:red">*</span></div>
                <div><input type="text" name="username" placeholder="Ingrese su nombre de usuario" class="form-control" value="" required></div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-10 mb-3 "><br>
                <div class="font-italic">Contraseña<span style="color:red">*</span></div>
                <div><input type="password" name="password" placeholder="Ingrese su Contraseña" class="form-control" value="" required></div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-6 mb-4 " style="text-align:center"><br>
                <div><input type="submit" name="login" class="btn btn-danger" value="Iniciar Sesión" style="cursor:pointer"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <?php
        include 'conn.php';
        if(isset($_POST["login"])){
          $username=mysqli_real_escape_string($conn,$_POST["username"]);
          $password=mysqli_real_escape_string($conn,$_POST["password"]);
          $sql="SELECT * from project_05_admin_info where admin_username='$username' and admin_password='$password'";
          $result=mysqli_query($conn,$sql) or die("la consulta falló.");
          if(mysqli_num_rows($result)>0) {
            while($row=mysqli_fetch_assoc($result)){
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION["username"]=$username;
              header("Location: dashboard.php");
            }
          }
          else {
            echo '<div class="alert alert-danger" style="font-weight:bold"> El nombre de usuario y la contraseña no coinciden!</div>';
          }
        }
      ?>
    </form>
  </body>
</html>