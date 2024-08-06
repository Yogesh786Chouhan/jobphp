<?php
session_start();
if (empty ($_SESSION['snm'])) {
    header("location:../login.php");
}
require_once ("../db/connection.php");
require_once ("das_header.php");
require_once ("admin_sidebar.php");
$id = $_GET['editId'];
// echo $id;
$query = mysqli_query($connection, "SELECT * FROM job_category WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);


if (isset ($_POST["catUpdate"])) {
    $category_name = $_POST['category_name'];
    $id = $_POST['uid'];
    mysqli_query($connection, "UPDATE job_category SET category_name = '$category_name' WHERE id = '$id'");
    header("location:manage_category.php");
}



?>

<!-- Content Start -->
<div class="content">
    <?php require_once ("mini_navbar.php") ?>
    <!-- Navbar End -->

    <div class="cat-box d-flex justify-content-center align-items-center mt-5">
        <div class="container w-50">
            <h2 class="alert alert-primary mt-2 text-center">Edit category</h2>

            <form action="" method="post">
                <div class="mb-3">
                    <input type="hidden" value="<?php echo $id ?>" name="uid">
                    <label class="form-label">Category :</label>
                    <input type="text" class="form-control" placeholder="Enter category"
                        value="<?php echo $data['category_name'] ?>" name="category_name">
                </div>

                <input type="submit" class="btn btn-primary" name="catUpdate" value="Update category">
            </form>

        </div>
    </div>

</div>
<!-- Content End -->



<?php require_once ("das_footer.php") ?>