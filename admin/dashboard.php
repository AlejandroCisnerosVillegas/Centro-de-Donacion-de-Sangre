<!DOCTYPE html>
<html lang="es">
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
  </head>
  <body style="color: #333;">
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
      $active = "dashboard";
      include 'sidebar.php'; ?>
    </div>
    <div id="content">
      <div class="content-wrapper">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 lg-12 sm-12">
              <h1 class="page-title">Pagina Principal</h1>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-3">
                  <div class="panel panel-default panel-info" style="border-radius:50px;">
                    <div class="panel-body panel-info bk-primary text-light">
                      <div class="stat-panel text-center">
                        <?php
                        $sql = " SELECT * from project_05_donor_details ";
                        $result = mysqli_query($conn, $sql) or die("La consulta falló.");
                        $row = mysqli_num_rows($result);
                        ?>
                        <div class="stat-panel-number h1"><?php echo $row ?></div>
                        <div class="stat-panel-title text-uppercase">Donantes de Sangre Disponibles</div>
                        <br>
                        <button class="btn btn-danger" onclick="window.location.href = 'donor_list.php';">
                          Detalle Completo <i class="fa fa-arrow-right"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="panel panel-default panel-info" style="border-radius:50px;">
                    <div class="panel-body panel-info bk-primary text-light">
                      <div class="stat-panel text-center">
                        <?php
                        $sql1 = " SELECT * from project_05_contact_query ";
                        $result1 = mysqli_query($conn, $sql1) or die("La consulta falló.");
                        $row1 = mysqli_num_rows($result1);
                        ?>
                        <div class="stat-panel-number h1 "><?php echo $row1 ?></div>
                        <div class="stat-panel-title text-uppercase">Todas las Consultas de Usuario</div>
                        <br>
                        <button class="btn btn-danger" onclick="window.location.href = 'query.php';">
                          Detalle Completo <i class="fa fa-arrow-right"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="panel panel-default panel-info" style="border-radius:50px;">
                      <div class="panel-body panel-info bk-primary text-light">
                          <div class="stat-panel text-center">
                              <?php
                              $sql3 = "SELECT COUNT(*) AS null_count FROM project_05_contact_query WHERE query_status IS NULL";
                              $result3 = mysqli_query($conn, $sql3) or die("La consulta falló.");
                              $row3 = mysqli_fetch_assoc($result3);
                              $null_count = $row3['null_count'];
                              ?>
                              <div class="stat-panel-number h1 "><?php echo $null_count ?></div>
                              <div class="stat-panel-title text-uppercase">Todas las consultas pendientes</div>
                              <br>
                              <button class="btn btn-danger" onclick="window.location.href = 'pending_query.php';">
                                  Detalle Completo <i class="fa fa-arrow-right"></i>
                              </button>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
    } else {
      echo '<div class="alert alert-danger"><b>Por favor, inicie sesión primero para acceder al portal de administración.</b></div>';
      ?>
      <form method="post" name="" action="login.php" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-8 col-sm-offset-4" style="float:left">
            <button class="btn btn-primary" name="submit" type="submit">Ir a la Página de Inicio de Sesión</button>
          </div>
        </div>
      </form>
      <?php }
    ?>
  </body>
</html>