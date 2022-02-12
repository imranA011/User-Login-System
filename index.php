<?php

session_start();
include_once 'header.php';
include_once 'core/db_config.php';

?>


<section>
    <div class="container">
        <div class="text-center">
            <h2 class="text-primary py-5">Recent User</h2>
        </div>
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-dark text-light ">

                <?php

                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn, $sql);

                ?>

                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    $x = 1;
                    while ($row = mysqli_fetch_assoc($result)) :
                ?>
                    <tr>
                        <td><?php echo $x;  $x++;?></td>
                        <td><?php echo $row['fullname'];?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['email'];?></td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

    </div>
</section>


<?php

include_once 'footer.php';

?>