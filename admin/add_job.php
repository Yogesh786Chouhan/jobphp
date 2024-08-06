<?php
session_start();
if (empty ($_SESSION['snm'])) {
    header("location:../login.php");
}
require_once ("../db/connection.php");
require_once ("das_header.php");
require_once ("admin_sidebar.php");


$query = mysqli_query($connection, "SELECT * FROM job_category");



if (!empty ($_POST['jobBtn'])) {
    $job_category = $_POST['job_category'];
    $job_title = $_POST['job_title'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];
    $location = $_POST['location'];
    $company_name = $_POST['company_name'];
    $company_url = $_POST['company_url'];
    $company_email = $_POST['company_email'];
    $job_shift = $_POST['job_shift'];


    // -------------Image Section start-----------------
    $company_logo = $_FILES['company_logo'];
    // echo "<pre>";
    // print_r($company_logo);
    // print_r($company_logo['name']);
    $file_name = $company_logo['name'];
    // echo $file_name;
    $imagename = rand(0, 9999) . '.' . $file_name;
    // echo $imagename;
    $temp = $company_logo['tmp_name'];
    // echo $temp;
    // move_uploaded_file('source', 'destination');
    move_uploaded_file($temp, 'uploads/' . $imagename);
    // -------------Image Section end--------------------



    // Insert Query
    $query = "INSERT INTO job(job_category,job_title,description,salary,location,company_name,company_url,company_email,job_shift,company_logo) VALUES('$job_category','$job_title','$description','$salary','$location','$company_name','$company_url','$company_email','$job_shift','$imagename')";

    $result = mysqli_query($connection, $query);
    if ($result == 1) {
        echo "success";
        header("location: add_job.php");

    } else {
        echo "error";
    }
}

?>


<!-- Content Start -->
<div class="content">
    <?php require_once ("mini_navbar.php") ?>
    <!-- Navbar End -->
    <!-- Form Start -->
    <div class="job-box w-50 mx-auto">
        <div class="container ">
            <h1 class="alert alert-primary mt-3 text-center">ADD JOB</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">

                        <!-- Select Category -->
                        <div class="mb-3">
                            <label class="form-label" required>Category :</label>
                            <select name="job_category" class="form-select" required>
                                <option selected>category</option>
                                <?php while ($result = mysqli_fetch_assoc($query)) { ?>
                                    <option value="<?php echo $result['category_name'] ?>">
                                        <?php echo $result['category_name'] ?>
                                    </option>
                                    <?php
                                } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Job Title :</label>
                            <input type="text" class="form-control" placeholder="Enter job title" name="job_title"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description :</label>
                            <input type="text" class="form-control" placeholder="Enter description" name="description"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Salary :</label>
                            <input type="text" class="form-control" placeholder="Enter salary" name="salary" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location :</label>
                            <input type="text" class="form-control" placeholder="Enter location" name="location"
                                required>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Company Name :</label>
                            <input type="text" class="form-control" placeholder="Enter company name" name="company_name"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL :</label>
                            <input type="url" class="form-control" placeholder="Enter company url" name="company_url"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comapny Email :</label>
                            <input type="email" class="form-control" placeholder="Enter company email"
                                name="company_email" required>
                        </div>
                        <!-- <div class="mb-3">
                            <label class="form-label">Comapny Address :</label>
                            <input type="text" class="form-control" placeholder="Enter company address"
                                name="company_address" required>
                        </div> -->

                        <div class="mb-3">
                            <label class="form-label" required>Category :</label>
                            <select name="job_shift" class="form-select" required>
                                <option selected>Job Shift</option>
                                <option value="part-time">Part Time</option>
                                <option value="full-time">Full Time</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Comapny Logo :</label>
                            <input type="file" class="form-control" placeholder="Enter company logo" name="company_logo"
                                required>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="jobBtn" value="Add job">
                </div>
            </form>
        </div>
    </div>

    <!-- Form Start -->




</div>
<!-- Content End -->



<?php require_once ("das_footer.php") ?>