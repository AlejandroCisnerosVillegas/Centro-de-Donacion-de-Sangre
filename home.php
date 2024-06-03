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
      <div class="header">
          <?php
          $active = "home";
          include('head.php');
          ?>
      </div>
      <?php include 'ticker.php'; ?>
      <div id="page-container" style="margin-top: 50px; position: relative; min-height: 84vh;">
          <div class="container">
              <div id="content-wrap" style="padding-bottom: 75px;">
                  <div id="demo" class="carousel slide" data-ride="carousel">
                      <ul class="carousel-indicators">
                          <li data-target="#demo" data-slide-to="0" class="active"></li>
                          <li data-target="#demo" data-slide-to="1"></li>
                      </ul>
                      <div class="carousel-inner">
                          <div class="carousel-item active">
                              <img src="image\carousel-01.png" alt="imagen 1" width="100%" height="500">
                          </div>
                          <div class="carousel-item">
                              <img src="image\carousel-02.png" alt="imagen 2" width="100%" height="500">
                          </div>
                      </div>
                      <a class="carousel-control-prev" href="#demo" data-slide="prev">
                          <span class="carousel-control-prev-icon"></span>
                      </a>
                      <a class="carousel-control-next" href="#demo" data-slide="next">
                          <span class="carousel-control-next-icon"></span>
                      </a>
                  </div>
                  <br>
                  <h1 style="text-align:center;font-size:45px;">Bienvenido al Centro de Donación de Sangre</h1>
                  <br>
                  <div class="row">
                    <div class="col-lg-4 mb-4">
                      <div class="card">
                        <h4 class="card-header card bg-info text-white">La necesidad de sangre</h4>
                        <div class="card-body" style="max-height: 250px; overflow-y: auto; text-align: left; margin-bottom: 0;">
                            <?php
                            include 'conn.php';
                            $sql = "SELECT * FROM project_05_pages WHERE page_type='needforblood'";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo $row['page_data'];
                                }
                            }
                            ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                      <div class="card">
                          <h4 class="card-header card bg-info text-white">Consejos sobre la sangre</h4>
                          <div class="card-body" style="padding-left: 2%; max-height: 250px; overflow-y: auto;">
                              <?php
                              include 'conn.php';
                              $sql = "SELECT * FROM project_05_pages WHERE page_type='bloodtips'";
                              $result = mysqli_query($conn, $sql);
                              if(mysqli_num_rows($result) > 0) {
                                  while($row = mysqli_fetch_assoc($result)) {
                                      echo $row['page_data'];
                                  }
                              }
                              ?>
                          </div>
                      </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                      <div class="card">
                        <h4 class="card-header card bg-info text-white">¿A quién puedes ayudar?</h4>
                        <div class="card-body" style="max-height: 250px; overflow-y: auto; text-align: left; padding-left: 2%;">
                            <?php
                            include 'conn.php';
                            $sql = "SELECT * FROM project_05_pages WHERE page_type='whoyouhelp'";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo $row['page_data'];
                                }
                            }
                            ?>
                        </div>
                      </div>
                    </div>
                  <h2>Nombres de donantes de sangre</h2>
                  <div class="container">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            include 'conn.php';
                            $sql = "SELECT * FROM project_05_donor_details JOIN project_05_blood ON project_05_donor_details.donor_blood = project_05_blood.blood_id ORDER BY RAND()";
                            $result = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($result);
                            $elements_per_slide = 3;
                            $chunks = array_chunk(mysqli_fetch_all($result, MYSQLI_ASSOC), $elements_per_slide);
                            foreach ($chunks as $index => $chunk) {
                                ?>
                                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                    <div class="row">
                                        <?php foreach ($chunk as $row) { ?>
                                            <div class="col-lg-4 col-sm-6 portfolio-item">
                                                <br>
                                                <div class="card" style="width:300px">
                                                    <img class="card-img-top" src="image\user.png" alt="Imagen de sangre" style="width:100%;height:300px">
                                                    <div class="card-body" style="max-height: 250px; overflow-y: auto; text-align: left; padding-left: 2%;">
                                                        <h3 class="card-title"><?php echo $row['donor_name']; ?></h3>
                                                        <p class="card-text">
                                                            <b>Grupo sanguíneo: </b> <b><?php echo $row['blood_group']; ?></b><br>
                                                            <b>Número de teléfono: </b> <?php echo $row['donor_number']; ?><br>
                                                            <b>Género: </b><?php echo $row['donor_gender']; ?><br>
                                                            <b>Edad: </b> <?php echo $row['donor_age']; ?><br>
                                                            <b>Dirección: </b> <?php echo $row['donor_address']; ?><br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true" style="color: black;"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true" style="color: black;"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>
                  <div class="row">
                      <div class="col-lg-6">
                          <h2><br>GRUPOS SANGUÍNEOS</h2>
                          <p>
                              <?php
                              include 'conn.php';
                              $sql = "SELECT * FROM project_05_pages WHERE page_type='bloodgroups'";
                              $result = mysqli_query($conn, $sql);
                              if(mysqli_num_rows($result) > 0) {
                                  while($row = mysqli_fetch_assoc($result)) {
                                      echo $row['page_data'];
                                  }
                              }
                              ?>
                          </p>
                      </div>
                      <div class="col-lg-6">
                      <br><br><img class="img-fluid rounded" src="image\home-page.png" alt="Imagen de donación de sangre" >
                      </div>
                  </div>
                  <hr>
                  <div class="row mb-4">
                      <div class="col-md-8">
                          <h4>RECEPTORES Y DONANTES UNIVERSALES</h4>
                          <p>
                              <?php
                              include 'conn.php';
                              $sql = "SELECT * FROM project_05_pages WHERE page_type='universal'";
                              $result = mysqli_query($conn, $sql);
                              if(mysqli_num_rows($result) > 0) {
                                  while($row = mysqli_fetch_assoc($result)) {
                                      echo $row['page_data'];
                                  }
                              }
                              ?>
                          </p>
                      </div>
                      <div class="col-md-4">
                          <a class="btn btn-lg btn-secondary btn-block" href="donate_blood.php" style="align:center; background-color:#E74C3C;color:#FFF;">Conviértete en donante</a>
                      </div>
                  </div>
              </div>
          </div>
          <?php include 'footer.php';?>
      </div>
  </body>
</html>