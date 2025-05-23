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
        #he {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            padding: 3px 7px;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            align: center;
            background-color: #bf0000; /* Rojo oscuro */
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
        <?php $active = "consulta";
        include 'sidebar.php'; ?>
    </div>
    <div id="content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 lg-12 sm-12">
                        <h1 class="page-title">Consulta de Usuario</h1>
                    </div>
                </div>
                <hr>
                <script>
                    function clickme(query_id) {
                        if (confirm("¿Realmente quieres marcar como leída esta consulta?")) {
                            $.ajax({
                                url: 'update_query_status.php',
                                type: 'POST',
                                data: { query_id: query_id },
                                success: function(response) {
                                    if (response == 'success') {
                                        $('#status_' + query_id).text('Leído');
                                    } else {
                                        alert('Hubo un error al actualizar el estado.');
                                    }
                                }
                            });
                        }
                    }
                </script>
                <?php
                include 'conn.php';

                $limit = 10;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;
                $count = $offset + 1;
                $sql = "SELECT * FROM project_05_contact_query LIMIT {$offset},{$limit}";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered" style="text-align:center">
                            <thead style="text-align:center">
                            <th style="text-align:center">Núm.</th>
                            <th style="text-align:center">Nombre</th>
                            <th style="text-align:center">Correo Electrónico</th>
                            <th style="text-align:center">Número de Teléfono</th>
                            <th style="text-align:center">Mensaje</th>
                            <th style="text-align:center">Fecha de Publicación</th>
                            <th style="text-align:center">Estado</th>
                            <th style="text-align:center">Acción</th>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $row['query_name']; ?></td>
                                    <td><?php echo $row['query_mail']; ?></td>
                                    <td><?php echo $row['query_number']; ?></td>
                                    <td><?php echo $row['query_message']; ?></td>
                                    <td><?php echo $row['query_date']; ?></td>
                                    <?php if ($row['query_status'] == 1) { ?>
                                        <td>Leído<br></td>
                                    <?php } else { ?>
                                        <td><a href="update_query.php?id=<?php echo $row['query_id'];?>" onclick="clickme(<?php echo $row['query_id']; ?>)"><b id="status_<?php echo $row['query_id']; ?>">Pendiente</b></a><br></td>
                                    <?php } ?>
                                    <td id="he" style="width:100px">
                                        <a style="background-color: aqua" href='delete_query.php?id=<?php echo $row['query_id']; ?>'>Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
                <div class="table-responsive" style="text-align:center;align:center">
                    <?php
                    $sql1 = "SELECT * FROM project_05_contact_query";
                    $result1 = mysqli_query($conn, $sql1) or die("Consulta fallida.");
                    if (mysqli_num_rows($result1) > 0) {
                        $total_records = mysqli_num_rows($result1);
                        $total_page = ceil($total_records / $limit);
                        echo '<ul class="pagination admin-pagination">';
                        if ($page > 1) {
                            echo '<li><a href="query.php?page=' . ($page - 1) . '">Anterior</a></li>';
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i == $page) {
                                $active = "active";
                            } else {
                                $active = "";
                            }
                            echo '<li class="' . $active . '"><a href="query.php?page=' . $i . '">' . $i . '</a></li>';
                        }
                        if ($total_page > $page) {
                            echo '<li><a href="query.php?page=' . ($page + 1) . '">Siguiente</a></li>';
                        }

                        echo '</ul>';
                    }
                    ?>
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
    <?php
}
?>
</body>
</html>
