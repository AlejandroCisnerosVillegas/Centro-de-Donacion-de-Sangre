<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Centro de Donación de Sangre</title>
      <link rel="icon" href="../../assets/img/logo.png">
      <link rel="apple-touch-icon" href="../../assets/img/logo-grande.png">
      <link href="css/style.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
      <?php
      $active ='donate';
      include('head.php');
      ?>
      <div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
          <div class="container">
              <div id="content-wrap" style="padding-bottom:50px;">
                  <div class="row">
                      <div class="col-lg-6">
                          <h1 class="mt-4 mb-3">Registrarse como voluntario</h1>
                      </div>
                  </div>
                  <form name="donor" action="savedata.php" method="post">
                      <div class="row">
                          <div class="col-lg-4 mb-4">
                              <div class="font-italic">Nombre completo:<span style="color:red">(*)</span></div>
                              <div><input type="text" name="fullname" class="form-control" required></div>
                          </div>
                          <div class="col-lg-4 mb-4">
                              <div class="font-italic">Número telefónico:<span style="color:red">(*)</span></div>
                              <div><input type="text" name="mobileno" class="form-control" required></div>
                          </div>
                          <div class="col-lg-4 mb-4">
                              <div class="font-italic">Correo electrónico:<span style="color:red">(*)</span></div>
                              <div><input type="email" name="emailid" class="form-control"></div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-4 mb-4">
                              <div class="font-italic">Edad:<span style="color:red">(*)</span></div>
                              <div><input type="text" name="age" class="form-control" required></div>
                          </div>
                          <div class="col-lg-4 mb-4">
                              <div class="font-italic">Género:<span style="color:red">(*)</span></div>
                              <div>
                                  <select name="gender" class="form-control" required>
                                      <option value="">Seleccionar</option>
                                      <option value="Masculino">Masculino</option>
                                      <option value="Femenino">Femenino</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-lg-4 mb-4">
                              <div class="font-italic">Grupo sanguíneo:<span style="color:red">(*)</span></div>
                              <div>
                                  <select name="blood" class="form-control" required>
                                      <option value="" selected disabled>Seleccionar</option>
                                      <?php
                                      include 'conn.php';
                                      $sql= "select * from project_05_blood";
                                      $result=mysqli_query($conn,$sql) or die("consulta sin éxito.");
                                      while($row=mysqli_fetch_assoc($result)){
                                      ?>
                                          <option value="<?php echo $row['blood_id'] ?>"><?php echo $row['blood_group'] ?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-4 mb-4">
                              <div class="font-italic">Dirección:<span style="color:red">(*)</span></div>
                              <div><textarea class="form-control" name="address" required></textarea></div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-4 mb-4">
                              <div><input type="submit" name="submit" class="btn btn-primary" value="Registrarse" style="cursor:pointer"></div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
          <?php include('footer.php') ?>
      </div>
  </body>
</html>