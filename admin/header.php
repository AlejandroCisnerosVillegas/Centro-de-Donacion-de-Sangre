<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" id="qq" href="dashboard.php">Centro de Donación de Sangre</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" id="qw" data-toggle="dropdown" href="#">
          <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;
          <?php
          include 'conn.php';
          $username=$_SESSION['username'];
          $sql="select * from project_05_admin_info where admin_username='$username'";
          $result=mysqli_query($conn,$sql) or die("La consulta falló.");
          $row=mysqli_fetch_assoc($result);
          echo "Hola, ".$row['admin_name'];
          ?>
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="change_password.php">Cambiar Contraseña</a></li>
          <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>