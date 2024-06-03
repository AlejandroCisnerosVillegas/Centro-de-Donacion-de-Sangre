<?php
include 'conn.php';
if(isset($_GET['id'])) {
    $que_id = $_GET['id'];
    $sql = "UPDATE project_05_contact_query SET query_status = 1 WHERE query_id = {$que_id}";
    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: pending_query.php");
        exit;
    } else {
        echo "Error al actualizar el registro.";
    }
} else {
    echo "ID no recibido.";
}
mysqli_close($conn);
?>