<?php

include_once 'core/db_config.php';
include_once 'core/functions.php';
include_once 'header.php';

if (isset($_POST['register'])) {

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['confirm_pass'];
    if ($password == $c_password) {
        $confirm_password = true;
    } else {
        $confirm_password = false;
    }
    //PASSWORD HASHING
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    //USERNANE CHECKING
    $username_check = dataCheck($conn, 'username', 'users', $username);

    //EMAIL CHECKING
    $email_check = dataCheck($conn, 'email', 'users', $email);

    //VALIDATION
    if (empty($username) || empty($email) || empty($password) || empty($c_password)) {
        $msg = '<div class="alert alert-warning alert-dismissible text-danger text-center">
        <strong>You must filled up required field.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    } elseif (strlen($username) < 5) {
        $usermsg = '<div class="text-danger">
            <small>Username at least 5 characters.</small>
            </div>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailmsg = '<div class="text-danger">
            <small>Invalid email address.</small></div>';
    } elseif (strlen($password) < 5) {
        $passmsg = '<div class="text-danger">
            <small>Password at least 5 characters.</small>
            </div>';
    } elseif ($confirm_password == false) {
        $passmatch = '<div class="text-danger">
            <small>Password not matched.</small>
            </div>';
    } elseif ($username_check == false) {
        $usermsg = '<div class="text-danger">
            <small>Username already exists.</small>
            </div>';
    } elseif ($email_check == false) {
        $emailmsg = '<div class="text-danger">
            <small>Email already exists.</small>
            </div>';
    } else {
        $sql = "INSERT INTO users (fullname, username, email, password) VALUES ('$fullname','$username','$email','$hash_password')";
        $result = mysqli_query($conn, $sql);
        if ($result == true) {
            setMsg('<div class="alert alert-warning alert-dismissible text-primary text-center">
            <strong>Registration Successfull.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
            header("Location:register.php");
        }
    }
}

?>


<section class="registerForm">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h4 class="card-title text-center text-primary p-1">Registration Form</h4>
                    </div>

                    <?php if (isset($msg)) {
                        echo $msg;
                    } ?>
                    <?php getMsg(); ?>

                    <form action="" method="POST" id="addform">
                        <div class="card-body">
                            <div class="mb-3">
                                <span><i class="fas fa-user-alt text-primary"></i></span>
                                <label for="userInputFullname" class="form-label">Full Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="fullname" value="<?php showFieldData('fullname'); ?>" placeholder="Enter Your Full Name">
                                </div>
                            </div>
                            <div class="mb-3">
                                <span><i class="fas fa-user-alt text-primary"></i></span>
                                <label for="userInputUsername" class="form-label">Username</label>
                                <span class="error fw-bold">*</span>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="username" value="<?php showFieldData('username'); ?>" placeholder="Enter Your Username">
                                </div>
                                <span><?php if (isset($usermsg)) {
                                            echo $usermsg;
                                        } ?></span>
                            </div>
                            <div class="mb-3">
                                <span><i class="fas fa-envelope-open text-primary"></i></span>
                                <label for="userInputEmail" class="form-label">Email</label>
                                <span class="error fw-bold">*</span>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" value="<?php showFieldData('email'); ?>" placeholder="Enter Your Email">
                                </div>
                                <span><?php if (isset($emailmsg)) {
                                            echo $emailmsg;
                                        } ?></span>
                            </div>
                            <div class="mb-3">
                                <span><i class="fas fa-user-alt text-primary"></i></span>
                                <label for="userInputPassword" class="form-label">Password</label>
                                <span class="error fw-bold">*</span>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
                                </div>
                                <span><?php if (isset($passmsg)) {
                                            echo $passmsg;
                                        } ?></span>
                            </div>
                            <div class="mb-3">
                                <span><i class="fas fa-user-alt text-primary"></i></span>
                                <label for="userInputPassword" class="form-label">Confirm Password</label>
                                <span class="error fw-bold">*</span>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="confirm_pass" placeholder="Retype Your Password">
                                </div>
                                <span><?php if (isset($passmatch)) {
                                            echo $passmatch;
                                        } ?></span>
                            </div>
                        </div>
                        <div class="card-footer text-center d-grid py-3">
                            <input type="submit" class="btn btn-primary" name="register" value="Register Now">
                        </div>
                        <div class="text-center py-3">
                            <p class="pt-2">Already Registered?<a href="http://localhost/ctg403/admin/login.php"> Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<?php

include_once 'footer.php';

?>