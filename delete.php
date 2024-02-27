<?php
    include_once("Mysql.php");
    $user_id = $_GET["uid"]; 
    $query = "delete from users where id = $user_id";
    mysqli_query($conn, $query);
    header("Location: view.php");