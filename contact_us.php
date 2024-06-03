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
    <?php $active ='contact';
    include 'head.php'; ?>
    <?php
    if(isset($_POST["send"])){
      $name=$_POST['fullname'];
      $number=$_POST['contactno'];
      $email=$_POST['email'];
      $message=$_POST['message'];
      $conn=mysqli_connect("localhost","root","","general") or die("Error de conexión");
      $sql= "insert into project_05_contact_query (query_name,query_mail,query_number,query_message) values('{$name}','{$number}','{$email}','{$message}')";
      $result=mysqli_query($conn,$sql) or die("Consulta sin éxito.");
      echo '<div class="alert alert-success alert_dismissible"><b><button type="button" class="close" data-dismiss="alert">&times;</button></b><b>Mensaje enviado, nos pondremos en contacto contigo en breve. </b></div>';
    }
    ?>
    <div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
      <div class="container">
        <div id="content-wrap" style="padding-bottom:50px;">
          <h1 class="mt-4 mb-3">Contáctanos</h1>
          <div class="row">
            <div class="col-lg-8 mb-4">
              <h3>Envíanos un mensaje</h3>
              <form name="sentMessage"  method="post">
                <div class="control-group form-group">
                  <div class="controls">
                    <label>Nombre completo:</label>
                    <input type="text" class="form-control" id="name" name="fullname" required>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="control-group form-group">
                  <div class="controls">
                    <label>Número de telefónico:</label>
                    <input type="tel" class="form-control" id="phone" name="contactno"  required >
                  </div>
                </div>
                <div class="control-group form-group">
                  <div class="controls">
                    <label>Dirección de correo electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                  </div>
                </div>
                <div class="control-group form-group">
                  <div class="controls">
                    <label>Mensaje:</label>
                    <textarea rows="10" cols="100" class="form-control" id="message" name="message" required  maxlength="999" style="resize:none"></textarea>
                  </div>
                </div>
                <button type="submit" name="send"  class="btn btn-primary">Enviar Mensaje</button>
              </form>
            </div>
            <div class="col-lg-4 mb-4">
              <h2>Detalles de Contacto</h2>
              <?php
              include 'conn.php';
              $sql= "select * from project_05_contact_info";
              $result=mysqli_query($conn,$sql);
              if(mysqli_num_rows($result)>0)   {
                while($row = mysqli_fetch_assoc($result)) { ?>
                  <br>
                  <p>
                    <h4>Dirección:</h4><?php echo $row['contact_address']; ?>
                  </p>
                  <p>
                    <h4>Número de contacto:</h4><?php echo $row['contact_phone']; ?>
                  </p>
                  <p>
                    <h4>Correo electrónico:</h4><a href="#"><?php echo $row['contact_mail']; ?></a>
                  </p>
                <?php }
              } ?>
            </div>
          </div>  
        </div>
        <br>
      </div>
      <?php include 'footer.php' ?>
    </div>
  </body>
</html>