<?php

//DATA CHECKING
function dataCheck($conn, $col_name, $table, $data){
    $sql = "SELECT $col_name FROM $table WHERE $col_name='$data'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    if($row > 0){
        return false;
    }else{
        return true;
    } 
}

//SHOW FIELD DATA
function showFieldData($field_data){
    if (isset($_POST[$field_data])){
        echo $_POST[$field_data];
    }
}

//SHOW SUCCESSFUL MESSAGES
function setMsg($msg){
    setcookie('msg', $msg, time()+5);
}

function getMsg(){
    if(isset($_COOKIE['msg'])){
        echo $_COOKIE['msg'];
    }
}

?>


