<?php
require_once ('../db/connection.php');
$cnm = $_GET['category_name'];
if ($cnm == "All Category") {
    $q = mysqli_query($connection, "SELECT * FROM job ");
} else {
    $q = mysqli_query($connection, "SELECT * FROM job WHERE job_category = '$cnm' ");
}

$arr = [];
while ($data = mysqli_fetch_assoc($q)) {
    array_push($arr, $data);
}
echo json_encode($arr);

?>