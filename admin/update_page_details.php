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
      <script type="text/javascript" src="nicEdit.js"></script>
      <style>
          #sidebar {
              position: relative;
              margin-top: -20px
          }
          #content {
              position: relative;
              margin-left: 210px
          }
          @media screen and (max-width: 600px) {
              #content {
                  position: relative;
                  margin-left: auto;
                  margin-right: auto;
              }
              #area1,
              #area4 {
                  width: 70vw;
                  min-height: 50vh;
                  font-family: tahoma;
              }
              .nicEdit-panel>div>* {
                  opacity: 1 !important;
              }
              .nicEdit-buttonContain {
                  padding: .5em;
              }
              .nicEdit-panelContain {}

              .nicEdit-selectContain {
                  margin-top: 8px;
                  padding: .5em
              }
              .nicEdit-selectTxt {
                  font-family: Tahoma !important;
                  font-size: 12px !important;
              }
              .nicEdit-main {
                  outline: 0;
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
              <?php $active = "";
              include 'sidebar.php'; ?>
          </div>
          <div id="content">
              <div class="content-wrapper">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-12 lg-12 sm-12">
                              <h1 class="page-title">Actualizar Detalles de la Página</h1>
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-md-10">
                              <div class="panel panel-default">
                                  <div class="panel-heading">Detalles de la Página</div>
                                  <div class="panel-body">
                                      <form name="updata_page" method="post">
                                          <div class="hr-dashed"></div>
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Página Seleccionada:</label>
                                              <?php
                                              include 'conn.php';
                                              switch ($_GET['type']) {
                                                  case "aboutus":
                                                      echo "Sobre Nosotros";
                                                      break;
                                                  case "donor":
                                                      echo "¿Por qué convertirse en donante?";
                                                      break;
                                                  case "needforblood":
                                                      echo "La Necesidad de Sangre";
                                                      break;
                                                  case "bloodtips":
                                                      echo "Consejos sobre la sangre";
                                                      break;
                                                  case "whoyouhelp":
                                                      echo "¿A quién podrías ayudar?";
                                                      break;
                                                  case "bloodgroups":
                                                      echo "Grupos sanguíneos";
                                                      break;
                                                  case "universal":
                                                      echo "Donantes y receptores universales";
                                                      break;
                                              }
                                              ?>
                                          </div>
                                          <div class="form-group">
                                              <label class="col-sm-4 control-label">Detalles de la Página:</label>
                                              <div class="col-sm-4">
                                                  <div id="sample">
                                                      <textarea cols="60" rows="10" id="area4" name="data"></textarea>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-sm-8 col-sm-offset-4"><br>
                                                  <button class="btn btn-danger" name="submit" type="submit">Actualizar Contenido</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <?php if (isset($_POST['submit'])) {
                          $type = $_GET['type'];
                          $data = $_POST['data'];
                          $conn = mysqli_connect("localhost", "root", "", "general") or die("Error de conexión");
                          $sql = "update project_05_pages set page_data='{$data}'where page_type='{$type}'";
                          $result = mysqli_query($conn, $sql) or die("Consulta no exitosa.");
                          echo '<div class="alert alert-success"><b>Datos de la Página Actualizados Exitosamente.</b></div>';
                      }
                      ?>
                  </div>
              </div>
          </div>
      <?php } else {
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