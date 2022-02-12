<?php

session_start();
include_once 'core/db_config.php';
include_once 'core/functions.php';
include_once 'header.php';

//DASHBOARD PAGE SECUIRITY 
if (!isset($_SESSION['id'])){
    header("Location:login.php");
}

?>

    <section>
        <div class="container">
            <div class="text-center">
                <h2 class="text-primary py-5" >User Information</h2>
            </div>
            
            <?php getMsg(); ?>

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
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                <?php   
                
                $x=1;
                while($row = mysqli_fetch_assoc($result)): 
                
                ?>

                    <tr>                      
                        <td><?php echo $x;  $x++;?></td>
                        <td><?php echo $row['fullname'];?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['email'];?></td>
                        
                        <!-- CHECKING USER UPDATE OPTION-->
                        <?php if (isset($_SESSION['id']) && $_SESSION['id'] == $row['id']) : ?>

                        <td>                     
                            <a href="view.php?status=view&&id=<?=$row['id'];?>"><i class="fas fa-eye text-primary"></i></a>
                            <a href="edit.php?status=edit&&id=<?=$row['id'];?>"><i class="fas fa-edit text-warning px-3"></i></a>
                            <a href="delete.php?status=delete&&id=<?=$row['id'];?>" onclick="return confirm('Are You Sure?')"><i class="fas fa-trash-alt text-danger"></i></a>
                        </td>
                        <?php endif; ?>

                    </tr>

                    <?php endwhile; ?>

                </tbody>
            </table>

        </div>
    </section>


<?php

    include_once 'footer.php';

?>