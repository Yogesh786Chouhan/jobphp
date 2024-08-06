<?php
session_start();
if (empty ($_SESSION['snm'])) {
    header("location:../login.php");
}
require_once ("../db/connection.php");
require_once ("das_header.php");
require_once ("admin_sidebar.php");

$query = mysqli_query($connection, "SELECT * FROM job ORDER BY id DESC");


?>

<!-- Content Start -->
<div class="content">
    <?php require_once ("mini_navbar.php") ?>
    <!-- Navbar End -->

    <section class="show-job">
        <div class="container">
            <h1 class="alert alert-primary text-center mt-3">Manage job</h1>

            <table id="example" class="display table " style="font-size:15px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>COMPANY LOGO</th>
                        <th>JOB CATEGORY</th>
                        <th>JOB TITLE </th>
                        <th>SALARY</th>
                        <th>LOCATION</th>
                        <th>COMPANY NAME</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    while ($result = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td>
                                <?php echo ++$i ?>
                            </td>
                            <!-- <td>
                                <?php echo $result['id'] ?>
                            </td> -->
                            <td>

                                <img width="50px" style="border-radius:50%;" height="50px"
                                    src="<?php echo 'uploads/' . $result['company_logo'] ?>" alt="">

                            </td>
                            <td>
                                <?php echo $result['job_category'] ?>
                            </td>
                            <td>
                                <?php echo $result['job_title'] ?>
                            </td>
                            <td>
                                <?php echo $result['salary'] ?>
                            </td>
                            <td>
                                <?php echo $result['location'] ?>
                            </td>
                            <td>
                                <?php echo $result['company_name'] ?>
                            </td>

                            <td>
                                <a href="job_delete.php?deleteId=<?php echo $result['id'] ?>"
                                    class="btn btn-danger">Delete</a>
                                <a href="job_edit.php?editId=<?php echo $result['id'] ?>" class="btn btn-primary">Edit</a>
                                <a href="job_view.php?viewId=<?php echo $result['id'] ?>" class="btn btn-info">View</a>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>




</div>
<!-- Content End -->



<?php require_once ("das_footer.php") ?>