<?php

session_start();
include_once 'core/db_config.php';
include_once 'core/functions.php';
include_once 'header.php';

//GET DATA FROM URL
if (isset($_GET['status'])) {
    if ($_GET['status'] = 'view') {
        $view_id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id=$view_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }   
}

?>

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">
            <h4 class="text-center text-primary py-4"><?php echo $_SESSION['name'];?> Information</h4>
            <table class="table table-striped table-bordered mt-2 shadow align-middle">
                
                <tr>
                    <td>Full Name</td>
                    <td><?= $row['fullname']; ?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?= $row['username']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $row['email']; ?></td>
                </tr>
                
            </table>
        </div>
    </div>
</div>


<?php

include_once 'footer.php';

?>