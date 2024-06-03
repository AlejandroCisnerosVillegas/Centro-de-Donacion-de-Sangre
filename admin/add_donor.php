<?php include 'session.php'; ?>
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
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      ?>
          <div id="header">
              <?php $active = "add";
              include 'header.php';
              ?>
          </div>
          <div id="sidebar">
              <?php include 'sidebar.php'; ?>
          </div>
          <div id="content">
              <div class="content-wrapper">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-12 lg-12 sm-12">
                              <h1 class="page-title">Agregar Donante</h1>
                          </div>
                      </div>
                      <hr>
                      <form name="donor" action="save_donor_data.php" method="post">
                          <div class="row">
                              <div class="col-lg-4 mb-4"><br>
                                  <div class="font-italic">Nombre completo:<span style="color:red">(*)</span></div>
                                  <div><input type="text" name="fullname" class="form-control" required></div>
                              </div>
                              <div class="col-lg-4 mb-4"><br>
                                  <div class="font-italic">Número de teléfono:<span style="color:red">(*)</span></div>
                                  <div><input type="text" name="mobileno" class="form-control" required></div>
                              </div>
                              <div class="col-lg-4 mb-4"><br>
                                  <div class="font-italic">Correo electrónico:<span style="color:red">(*)</span></div>
                                  <div><input type="email" name="emailid" class="form-control"></div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-4 mb-4"><br>
                                  <div class="font-italic">Edad:<span style="color:red">(*)</span></div>
                                  <div><input type="text" name="age" class="form-control" required></div>
                              </div>
                              <div class="col-lg-4 mb-4"><br>
                                  <div class="font-italic">Género:<span style="color:red">(*)</span></div>
                                  <div>
                                      <select name="gender" class="form-control" required>
                                          <option value="">Seleccionar</option>
                                          <option value="Masculino">Masculino</option>
                                          <option value="Femenino">Femenino</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-lg-4 mb-4"><br>
                                  <div class="font-italic">Grupo sanguíneo:<span style="color:red">(*)</span></div>
                                  <div>
                                      <select name="blood" class="form-control" required>
                                          <option value="" selected disabled>Seleccionar</option>
                                          <?php
                                          include 'conn.php';
                                          $sql = "select * from project_05_blood";
                                          $result = mysqli_query($conn, $sql) or die("consulta sin éxito.");
                                          while ($row = mysqli_fetch_assoc($result)) {
                                          ?>
                                              <option value="<?php echo $row['blood_id'] ?>"><?php echo $row['blood_group'] ?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <br>
                          <div class="row">
                              <div class="col-lg-4 mb-4">
                                  <div class="font-italic">Dirección:<span style="color:red">(*)</span></div>
                                  <div><textarea class="form-control" name="address" required></textarea></div>
                              </div>
                          </div>
                          <br>
                          <div class="row">
                              <div class="col-lg-4 mb-4">
                                  <div><input type="submit" name="submit" class="btn btn-danger" value="Registrar" style="cursor:pointer" onclick="popup()"></div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      <?php
      } else {
          echo '<div class="alert alert-danger"><b> Por favor, inicie sesión primero para acceder al Portal de Administración.</b></div>';
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
      <script>
          function popup() {
              alert("Datos agregados exitosamente.");
          }
      </script>
  </body>
</html>