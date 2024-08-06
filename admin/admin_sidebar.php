<?php require_once ('../db/connection.php'); ?>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.php" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <!-- <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;"> -->
                    <img class="rounded-circle" src="<?php echo 'uploads/' . $_SESSION['slogo'] ?>" alt=""
                        style="width: 40px; height: 40px;">

                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <!-- <h6 class="mb-0">Jhon Doe</h6> -->
                    <!-- <span>Admin</span> -->
                    <span>
                        <?php echo $_SESSION['snm'] ?>
                    </span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="index.php" class="nav-item nav-link active"><i
                        class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fa fa-laptop me-2"></i>Category</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="add_category.php" class="dropdown-item">Add category</a>
                        <a href="manage_category.php" class="dropdown-item">Manage category</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                            class="fa fa-laptop me-2"></i>Job</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="add_job.php" class="dropdown-item">Add Job</a>
                        <a href="manage_job.php" class="dropdown-item">Manage Job</a>
                    </div>
                </div>
            </div>
    </div>
    </nav>
</div>
<!-- Sidebar End -->