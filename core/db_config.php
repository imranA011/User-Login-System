<?php

$db_name = "admin_login_system";

$conn = mysqli_connect('localhost', 'root', '', $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }






?>