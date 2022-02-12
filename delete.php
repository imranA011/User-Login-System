<?php

session_start();
include_once 'core/db_config.php';

//GET DATA FROM URL
if (isset($_GET['status'])) {
    if ($_GET['status'] = 'delete') {
        $delete_id = $_GET['id'];
        $sql = "DELETE FROM users WHERE id=$delete_id";
        $result = mysqli_query($conn, $sql);
        session_unset();
        session_destroy();
        
    }   
}
header ("location:index.php"); 




?>