<?php
include 'conn.php';
  $donor_id = $_GET['id'];
$sql= "DELETE FROM project_05_donor_details where donor_id={$donor_id}";
$result=mysqli_query($conn,$sql);
header("Location: donor_list.php");
mysqli_close($conn);
 ?>