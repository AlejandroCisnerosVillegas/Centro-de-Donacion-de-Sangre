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
    $active ='why';
    include('head.php');
    ?>
    <div id="page-container" style="margin-top:50px; position: relative; min-height: 84vh;">
        <div class="container">
            <div id="content-wrap" style="padding-bottom:50px;">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="mt-4 mb-3">¿Por qué donar sangre?</h1>
                        <p>
                            <?php
                            include 'conn.php';
                            $sql=$sql= "select * from project_05_pages where page_type='donor'";
                            $result=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result)>0)   {
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo $row['page_data'];
                                }
                            }
                            ?>
                        </p>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                        <img class="img-fluid rounded" src="image\why_donate_blood.png" style="height:600px; width:500px" alt="error"  >
                    </div>
                </div>
            </div>
            <br><br>
        </div>
        <?php include('footer.php') ?>
    </div>
  </body>
</html>