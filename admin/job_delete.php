<?php require_once("../db/connection.php");

$id = $_GET['deleteId'];
// echo ''.$id.'';

$result = mysqli_query($connection, "DELETE FROM job WHERE id = '$id'");

if ($result) {
    echo "<script>alert('job successfully deleted')</script>";
    header("location:manage_job.php");
}
?>