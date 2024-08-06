<?php
session_start();
if (empty ($_SESSION['snm'])) {
    header("location:../login.php");
}
require_once ("../db/connection.php");
require_once ("das_header.php");
require_once ("admin_sidebar.php");

$id = $_GET['viewId'];
// echo ''.$id.'';

$query = "SELECT * FROM job WHERE id = '$id'";
$result = mysqli_query($connection, $query);

$data = mysqli_fetch_assoc($result);
// echo "<pre>";
// print_r($data);
?>




<!-- Content Start -->
<div class="content">
    <?php require_once ("mini_navbar.php") ?>
    <!-- Navbar End -->

    <div class="container">
        <h1 class="alert alert-primary mt-3 text-center">View job</h1>

        <div class="card mb-3">
            <div class="row  g-0">
                <div class="col-md-4">
                    <img class="rounded-start" height="500px" style="max-width: 100%;"
                        src="<?php echo 'uploads/' . $data['company_logo'] ?>" alt="">
                </div>


                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-title">
                            <span style="font-size:20px; color: blue; margin-right:250px;">Id :</span>
                            <?php echo $data['id'] ?>
                        </p>
                        <p class="card-text">
                            <span style="font-size:20px; color: blue; margin-right:120px;">Job Category :</span>
                            <?php echo $data['job_category'] ?>
                        </p>
                        <p class="card-title">
                            <span style="font-size:20px; color: blue; margin-right:178px;">Job Title :</span>
                            <?php echo $data['job_title'] ?>
                        </p>
                        <p class="card-text">
                            <span style="font-size:20px; color: blue; margin-right:201px;">Salary :</span>
                            <?php echo $data['salary'] ?>
                        </p>
                        <p class="card-text">
                            <span style="font-size:20px; color: blue; margin-right:150px;">Description :</span>
                            <?php echo $data['description'] ?>
                        </p>
                        <p class="card-text">
                            <span style="font-size:20px; color: blue; margin-right:179px; ">Location :</span>
                            <?php echo $data['location'] ?>
                        </p>
                        <p class="card-text">
                            <span style="font-size:20px; color: blue; margin-right:101px;">Company Name :</span>
                            <?php echo $data['company_name'] ?>
                        </p>
                        <p class="card-text">
                            <span style="font-size:20px; color: blue; margin-right:143px;">Company Url :</span>
                            <?php echo $data['company_url'] ?>
                        </p>
                        <p class="card-text">
                            <span style="font-size:20px; color: blue; margin-right:113px;">Company Email :</span>
                            <?php echo $data['company_email'] ?>
                        </p>
                        <p class="card-text">
                            <span style="font-size:20px; color: blue; margin-right:178px;">Job Shift:</span>
                            <?php echo $data['job_shift'] ?>
                        </p>

                        <a href="manage_job.php" class="btn btn-primary ">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
<!-- Content End -->



<?php require_once ("das_footer.php") ?>