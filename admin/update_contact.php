<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Centro de Donación de Sangre</title>
      <link rel="icon" href="../../../assets/img/logo.png">
      <link rel="apple-touch-icon" href="../../../assets/img/logo-grande.png">
      <link href="css/style.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <style>
          #sidebar {
              position: relative;
              margin-top: -20px;
          }
          #content {
              position: relative;
              margin-left: 210px;
          }
          @media screen and (max-width: 600px) {
              #content {
                  position: relative;
                  margin-left: auto;
                  margin-right: auto;
              }
          }
      </style>
  </head>
  <body style="color:black">
      <?php
      include 'conn.php';
      include 'session.php';
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      ?>
          <div id="header">
              <?php include 'header.php'; ?>
          </div>
          <div id="sidebar">
              <?php
              $active = "contact";
              include 'sidebar.php';
              ?>
          </div>
          <div id="content">
              <div class="content-wrapper">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-12 lg-12 sm-12">
                              <h1 class="page-title">Actualizar Información de Contacto</h1>
                          </div>
                      </div>
                      <hr>
                      <?php if (isset($_POST['update'])) {
                          $address = $_POST['address'];
                          $number = $_POST['email'];
                          $email = $_POST['contactno'];
                          $conn = mysqli_connect("localhost", "root", "", "general") or die("Error de conexión");
                          $sql = "update project_05_contact_info set contact_address='{$address}', contact_mail='{$email}', contact_phone='{$number}' where contact_id='1'";
                          $result = mysqli_query($conn, $sql) or die("Consulta no exitosa.");
                          echo '<div class="alert alert-success"><b>Detalles de Contacto Actualizados Exitosamente.</b></div>';
                          mysqli_close($conn);
                      }
                      ?>
                      <div class="row">
                          <div class="col-md-10">
                              <div class="panel panel-default">
                                  <div class="panel-heading">Detalles de Contacto</div>
                                  <div class="panel-body">
                                      <form method="post" name="change_contact" class="form-horizontal">
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Dirección</label>
                                              <div class="col-sm-8">
                                                  <textarea class="form-control" name="address" id="address" required></textarea>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Correo Electrónico</label>
                                              <div class="col-sm-8">
                                                  <input type="email" class="form-control" name="email" id="email" value="" required>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Número de Contacto</label>
                                              <div class="col-sm-8">
                                                  <input type="text" class="form-control" value="" name="contactno" id="contactno" required>
                                              </div>
                                          </div>
                                          <div class="hr-dashed"></div>
                                          <div class="form-group">
                                              <div class="col-sm-8 col-sm-offset-4">
                                                  <button class="btn btn-danger" name="update" type="submit">Actualizar Contenido</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      <?php
      } else {
          echo '<div class="alert alert-danger"><b>Por favor, inicia sesión primero para acceder al portal de administración.</b></div>';
          ?>
          <form method="post" name="" action="login.php" class="form-horizontal">
              <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-4" style="float:left">
                      <button class="btn btn-primary" name="submit" type="submit">Ir a la página de inicio de sesión</button>
                  </div>
              </div>
          </form>
      <?php }
      ?>
  </body>
</html>