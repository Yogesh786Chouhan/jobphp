<?php
require_once ('../db/connection.php');
$loc_name = $_GET['location_name'];
if ($loc_name == "Any Where") {
    $q = mysqli_query($connection, "SELECT * FROM job ");
} else {
    $q = mysqli_query($connection, "SELECT * FROM job WHERE location = '$loc_name' ");
}

$arr = [];
while ($data = mysqli_fetch_assoc($q)) {
    array_push($arr, $data);
}
echo json_encode($arr);

?>