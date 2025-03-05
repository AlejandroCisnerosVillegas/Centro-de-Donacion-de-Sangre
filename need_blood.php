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
      $active ='need';
      include('head.php') 
      ?>
      <div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
          <div class="container">
              <div id="content-wrap" style="padding-bottom:50px;">
                  <div class="row">
                      <div class="col-lg-6">
                          <h1 class="mt-4 mb-3">Registro de abastecimientos</h1>
                      </div>
                  </div>
                  <form name="needblood" action="" method="post">
                      <div class="row">
                          <div class="col-lg-4 mb-4">
                              <div class="font-italic">Grupo sanguíneo:<span style="color:red">(*)</span></div>
                              <div>
                                  <select name="blood" class="form-control" required>
                                      <option value="" selected disabled>Seleccionar:</option>
                                      <?php
                                      include 'conn.php';
                                      $sql= "select * from project_05_blood";
                                      $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
                                      while($row=mysqli_fetch_assoc($result)){
                                      ?>
                                          <option value="<?php echo $row['blood_id'] ?>"><?php echo $row['blood_group'] ?></option>
                                      <?php } ?>
                                  </select>
                              </div>
                          </div>
                          <div class="col-lg-4 mb-4">
                              <div class="font-italic">Motivo por el cual necesitas sangre<span style="color:red">(*)</span></div>
                              <div><textarea class="form-control" name="address" required></textarea></div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-4 mb-4">
                              <div><input type="submit" name="search" class="btn btn-primary" value="Buscar registro" style="cursor:pointer"></div>
                          </div>
                      </div>
                      <div class="row">
                          <?php if(isset($_POST['search'])){
                          $bg=$_POST['blood'];
                          $sql= "select * from project_05_donor_details join project_05_blood where project_05_donor_details.donor_blood=project_05_blood.blood_id AND donor_blood='{$bg}' order by rand() limit 5";
                          $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
                          if(mysqli_num_rows($result)>0)   {
                          while($row = mysqli_fetch_assoc($result)) {
                          ?>
                          <div class="col-lg-4 col-sm-6 portfolio-item"><br>
                              <div class="card" style="width:300px">
                                  <img class="card-img-top" src="image\user.png" alt="Card image" style="width:100%;height:300px">
                                  <div class="card-body">
                                      <h3 class="card-title"><?php echo $row['donor_name']; ?></h3>
                                      <p class="card-text">
                                          <b>Grupo Sanguíneo: </b> <b><?php echo $row['blood_group']; ?></b><br>
                                          <b>Número de Teléfono: </b> <?php echo $row['donor_number']; ?><br>
                                          <b>Género: </b><?php echo $row['donor_gender']; ?><br>
                                          <b>Edad: </b> <?php echo $row['donor_age']; ?><br>
                                          <b>Dirección: </b> <?php echo $row['donor_address']; ?><br>
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <?php
                          }
                          }
                          else
                          {
                              echo '<div class="alert alert-danger">No se encontró ningún donante para el grupo sanguíneo buscado</div>';
                          }
                          } ?>
                      </div>
                  </form>
              </div>
              <br><br>
          </div>
          <?php include 'footer.php' ?>
      </div>
  </body>
</html>