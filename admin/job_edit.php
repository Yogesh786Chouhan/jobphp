<?php
session_start();
if (empty ($_SESSION['snm'])) {
    header("location:../login.php");
}
require_once ("../db/connection.php");
require_once ("das_header.php");
require_once ("admin_sidebar.php");


// Select category
$category_selector = mysqli_query($connection, "SELECT * FROM job_category");

$id = $_GET['editId'];
// echo $id;
$query = mysqli_query($connection, "SELECT * FROM job WHERE id = '$id'");
$result = mysqli_fetch_assoc($query);
// echo "<pre>";
// print_r($result);

if (isset ($_POST["jobUpdate"])) {

    $job_category = $_POST['job_category'];
    $job_title = $_POST['job_title'];
    $description = $_POST['description'];
    $salary = $_POST['salary'];
    $location = $_POST['location'];
    $company_name = $_POST['company_name'];
    $company_url = $_POST['company_url'];
    $company_email = $_POST['company_email'];
    $job_shift = $_POST['job_shift'];
    $job_update_id = $_POST['jobUpdateId'];

    // Image section
    $file_name = $_FILES['company_logo']['name'];
    $new_image_name = rand(0, 9999) . '.' . $file_name;
    $temp = $_FILES['company_logo']['tmp_name'];
    move_uploaded_file($temp, 'uploads/' . $new_image_name);


    $old_image = $_POST['company_logo_old'];

    if ($new_image_name != '') {
        $update_filename = $new_image_name;

        if (file_exists("uploads" . $file_name)) {
            // header("location:manage_job.php");   
        }
    } else {
        $update_filename = $old_image;
    }

    // Update Query
    $update_query = "UPDATE job SET job_category='$job_category', job_title='$job_title', description='$description', salary='$salary', location='$location', company_name='$company_name', company_url='$company_url', company_email ='$company_email',job_shift='$job_shift',company_logo='$update_filename'  WHERE id = '$job_update_id'";

    $update_image_query_run = mysqli_query($connection, $update_query) or die (mysqli_error($connection));


    if ($update_image_query_run != '') {
        move_uploaded_file($temp, "uploads/" . $file_name);
        unlink("uploads/" . $old_image);
        echo "<script>alert('image and data updated')</script>";
        // header("location:manage_job.php");
        ?>
        <script>window.location.href = "http://localhost/job-portal/admin/manage_job.php"</script>
        <?php
    } else {
        echo "<script>alert('image not updated')</script>";
        // header("location:job_edit.php");
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
            <h1 class="alert alert-primary mt-3 text-center">EDIT JOB</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <!-- <form action="" method="post"> -->
                <div class="row">
                    <div class="col-sm-6">

                        <!-- Select Category -->
                        <div class="mb-3">
                            <input type="hidden" value="<?php echo $id ?>" name="jobUpdateId">
                            <label class="form-label">Category :</label>
                            <select name="job_category" class="form-select" required>
                                <!-- <option selected>category</option> -->
                                <option selected>
                                    <?php echo $result['job_category'] ?>
                                </option>

                                <?php while ($select_category = mysqli_fetch_assoc($category_selector)) { ?>
                                    <option value="<?php echo $select_category['category_name'] ?>">
                                        <?php echo $select_category['category_name'] ?>
                                    </option>
                                    <?php
                                } ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Job Title :</label>
                            <input type="text" class="form-control" value="<?php echo $result['job_title'] ?>"
                                placeholder="Enter job title" name="job_title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description :</label>
                            <input type="text" class="form-control" value="<?php echo $result['description'] ?>"
                                placeholder="Enter description" name="description" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Salary :</label>
                            <input type="text" class="form-control" value="<?php echo $result['salary'] ?>"
                                placeholder="Enter salary" name="salary" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Location :</label>
                            <input type="text" class="form-control" value="<?php echo $result['location'] ?>"
                                placeholder="Enter location" name="location" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Company Name :</label>
                            <input type="text" class="form-control" value="<?php echo $result['company_name'] ?>"
                                placeholder="Enter company name" name="company_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL :</label>
                            <input type="url" class="form-control" value="<?php echo $result['company_url'] ?>"
                                placeholder="Enter company url" name="company_url" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comapny Email :</label>
                            <input type="email" class="form-control" value="<?php echo $result['company_email'] ?>"
                                placeholder="Enter company email" name="company_email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Job Shift :</label>
                            <select name="job_shift" class="form-select" required>
                                <!-- <option selected>category</option> -->
                                <option selected>
                                    <?php echo $result['job_shift'] ?>
                                </option>
                                <option value="part-time">Part Time</option>
                                <option value="full-time">Full Time</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comapny Logo :</label>
                            <img class="rounded-start" height="25px" style="max-width: 100%;"
                                src="<?php echo 'uploads/' . $result['company_logo'] ?>" alt="">

                            <input type="file" class="form-control" placeholder="Enter company logo"
                                name="company_logo">
                            <input type="hidden" value="<?php echo $result['company_logo'] ?>" name="company_logo_old">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" name="jobUpdate" value="Update job">
                </div>
            </form>
        </div>
    </div>

    <!-- Form Start -->




</div>
<!-- Content End -->



<?php require_once ("das_footer.php") ?>