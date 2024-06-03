<?php
include 'conn.php';
if(isset($_GET['id'])) {
    $que_id = $_GET['id'];
    $sql = "DELETE FROM project_05_contact_query WHERE query_id={$que_id}";
    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: query.php");
        exit;
    } else {
        echo "Error al eliminar el registro.";
    }
} else {
    echo "ID no recibido.";
}
mysqli_close($conn);
?>