<?php

include_once 'core/db_config.php';
include_once 'core/functions.php';
include_once 'header.php';

if (isset($_POST['login'])) {
    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    if (empty($user_email) || empty($password)) {
        $msg = '<div class="alert alert-warning alert-dismissible text-danger text-center">
        <strong>You must filled up required field.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    } else {
        $sql = "SELECT * FROM users WHERE username='$user_email' OR email='$user_email'";
        $result = mysqli_query($conn, $sql);
        $login_user_data = mysqli_fetch_assoc($result);
        $row_count = mysqli_num_rows($result);
        if ($row_count == 1) {
            if (password_verify($password, $login_user_data['password']) == true) {
                session_start();
                $_SESSION['id'] = $login_user_data['id'];
                $_SESSION['name'] = $login_user_data['fullname'];
                header("Location:dashboard.php");
            } else {
                $passmsg = '<div class="text-danger">
                <small>Worng Password.</small>
                </div>';
            }
        } else {
            $usermsg = '<div class="text-danger">
            <small>Username or email not matched.</small>
            </div>';
        }
    }
}

?>


<section class="loginForm">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h4 class="card-title text-center text-primary p-1">Login Form</h4>
                    </div>

                    <?php if (isset($msg)) {
                        echo $msg;
                    } ?>

                    <form action="" method="POST" id="addform">
                        <div class="card-body">
                            <div class="mb-3">
                                <span><i class="fas fa-envelope-open text-primary"></i></span>
                                <label for="userInputUserEmail" class="form-label">Username or Email</label>
                                <span class="error fw-bold">*</span>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="user_email" placeholder="Enter Your Username or Email">
                                </div>
                                <span><?php if (isset($usermsg)) {
                                            echo $usermsg;
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
                            <div class="mt-5">
                                <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                <label class="form-check-label" for="inlineFormCheck">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <div class="card-footer text-center d-grid py-3">
                            <input type="submit" class="btn btn-primary" name="login" value="Login">
                        </div>
                        <div class="text-center py-3">
                            <p class="pt-2">Not a member?<a href="http://localhost/ctg403/admin/register.php"> Register</a></p>
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