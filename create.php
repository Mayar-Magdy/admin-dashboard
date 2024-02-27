<?php 
   include_once("Mysql.php");

  if(isset($_POST["btn"])){
    $name=$_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirmed=$_POST['confirm_password'];
    $room = $_POST['room'];
    $ext = $_POST['ext'];
    $profile_picture = $_FILES['profile_picture']; //arr
    $file_tem_path = $profile_picture["tmp_name"];
    $file_name =  $profile_picture["name"];

    // Email validation - Method 2
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: error.php?error=Inv alid Email');
        exit();
    }

    // Password validation
    if (!preg_match('/^[a-z 0-9_]*$/', $password)) {
        header('Location: error.php?error=Invalid Password');
        exit();
    }
    // Password Confirmation
    if($password !== $password_confirmed)
    {
        header('Location: error.php?error=Not Same Password');
        exit();
    }

    //get the ext
    $my_array = explode(".", $file_name);
    $my_ext = end($my_array);

    // Profile picture validation
    $allowed_ext = ["png", "jpg", "jpeg","svg"];
    if (!in_array($my_ext,$allowed_ext )) {
        header('Location: error.php?error=Invalid Profile Picture');
        exit();
    }
    //hasing
  $password =md5( $password);
  move_uploaded_file($file_tem_path, "img/".time().$file_name);      
  $profile_picture="img/".time().$file_name;
  $query = "INSERT INTO users (name, email, password, room, ext, profile_picture)
  VALUES ('$name', '$email', '$password', '$room', '$ext', '$profile_picture')";
  (mysqli_query($conn, $query));
  header("Location: massege.php");
  
        }
