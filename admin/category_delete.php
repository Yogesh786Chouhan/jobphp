<?php
$connection = mysqli_connect("localhost", "root", "", "job_portal_db");
$id = $_GET['deleteId'];
// echo $id;
$result = mysqli_query($connection, "DELETE FROM job_category WHERE id = '$id'");

if ($result) {
    echo "<script>alert('category successfully deleted')</script>";
    header("location:manage_category.php");
}
?>