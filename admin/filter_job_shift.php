<?php
require_once ('../db/connection.php');
if (isset($_POST['filters'])) {
    $filters = $_GET['filters'];
    $filter_string = implode("', '", $filters);
    $query = "SELECT * FROM job WHERE job_shift IN ('$filter_string')";
    $result = mysqli_query($connection, $query);
    echo "<pre>";
    print_r(mysqli_fetch_assoc($result));

    $arr = [];
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            array_push($arr, $data);
        }
    }
    echo json_encode($arr);
}
?>