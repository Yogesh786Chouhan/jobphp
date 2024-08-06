<?php
session_start();
if (empty ($_SESSION['snm'])) {
    header("location:../login.php");
}
require_once ("../db/connection.php");
require_once ("das_header.php");
require_once ("admin_sidebar.php");
?>
<!-- Content Start -->
<div class="content">
    <?php require_once ("mini_navbar.php") ?>
    <!-- Navbar End -->
    <h1>Admin dashboard</h1>

</div>
<!-- Content End -->
<?php require_once ("das_footer.php") ?>