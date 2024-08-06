<?php
session_start();
if (empty ($_SESSION['snm'])) {
    header("location:../login.php");
}

// Show data
require_once ("../db/connection.php");
require_once ("das_header.php");
require_once ("admin_sidebar.php");


$query = mysqli_query($connection, "SELECT * FROM job_category ORDER BY id DESC");
?>

<!-- Content Start -->
<div class="content">
    <?php require_once ("mini_navbar.php") ?>
    <!-- Navbar End -->



    <div class="container w-75 ">
        <h1 class="alert alert-primary mt-2 text-center">Manage category</h1>
        <form action="" method="post">

            <table id="example" class=" display table table-striped text-center">
                <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    while ($result = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr class="text-center">
                            <td>
                                <?php echo ++$i ?>
                            </td>
                            <!-- <td>
                            <?php echo $result['id'] ?>
                        </td> -->
                            <td>
                                <?php echo $result['category_name'] ?>
                            </td>
                            <td>
                                <a href="category_delete.php?deleteId=<?php echo $result['id'] ?>"
                                    class="btn btn-danger">Delete</a>
                                <a href="category_edit.php?editId=<?php echo $result['id'] ?>"
                                    class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>


</div>
<!-- Content End -->



<?php require_once ("das_footer.php") ?>