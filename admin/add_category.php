<?php
session_start();
if (empty ($_SESSION['snm'])) {
    header("location:../login.php");
}
require_once ("../db/connection.php");
require_once ("das_header.php");
require_once ("admin_sidebar.php");




if (!empty ($_POST['catBtn'])) {
    $category_name = $_POST['category_name'];
    $query = "INSERT INTO job_category(category_name) VALUES('$category_name')";
    $result = mysqli_query($connection, $query);
    if ($result == 1) {
        echo "success";
        header("location: add_category.php");

    } else {
        echo "error";
    }
}



?>

<!-- Content Start -->
<div class="content">
    <?php require_once ("mini_navbar.php") ?>
    <!-- Navbar End -->

    <div class="cat-box d-flex justify-content-center align-items-center mt-5">
        <div class="container w-50">
            <h2 class="alert alert-primary mt-2 text-center">Add category</h2>

            <form action="add_category.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Category :</label>
                    <input type="text" class="form-control" placeholder="Enter category" name="category_name" required>
                </div>
                <input type="submit" class="btn btn-primary" name="catBtn" value="Add category">
            </form>
        </div>
    </div>
</div>
<!-- Content End -->



<?php require_once ("das_footer.php") ?>