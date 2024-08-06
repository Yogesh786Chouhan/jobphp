<?php

$connection = mysqli_connect("localhost", "root", "", "job_portal_db");

if ($connection == true) {
    // echo "connected successfully";
} else {
    echo "connection failed";
}

?>