<?php require_once ('header.php'); ?>
<?php require_once ('navbar.php'); ?>
<?php
require_once ('db/connection.php');
// $name = $_POST['name'];

$message = "";
if (!empty ($_GET['msg'])) {
    $message = $_GET['msg'];
}

session_start();
if (!empty ($_POST['btnLogin'])) {
    $pwd = $_POST['password'];
    $email = $_POST['email'];
    // $_SESSION['snm'] = $name;
    // header('location: logout.php');


    $q = mysqli_query($connection, "SELECT * FROM admin_login WHERE email='$email' AND password='$pwd'");
    if (mysqli_num_rows($q) > 0) {
        $data = mysqli_fetch_assoc($q);
        $_SESSION['snm'] = $data['name'];
        $_SESSION['seid'] = $data['email'];
        $_SESSION['slogo'] = $data['company_logo'];
        header("location:./admin/index.php");




    } else {
        header("location:login.php?msg=Invalid user");
    }
}

?>
<main>



    <form action="login.php
    " method="post" class="w-50 mx-auto">
        <h1 class="alert alert-primary text-center">LOG IN FORM</h1>

        <?php
        if (!empty ($message)) {
            ?>
            <div class='alert alert-danger'>
                <?php echo $message; ?>
            </div>
            <?php
        }
        ?>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        </div>
        <input type="submit" class="btn btn-primary mt-1 mb-1" value="Login" name="btnLogin">
    </form>
    </div>



</main>

<?php require_once ('footer.php'); ?>