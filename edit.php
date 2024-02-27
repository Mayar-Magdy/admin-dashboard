<?php
    include_once("Mysql.php");
    $id = $_GET["uid"];
    $query = "SELECT * FROM users WHERE id = $id";
    $data = mysqli_query($conn,$query);
    $user_info = mysqli_fetch_assoc($data);

    if(isset($_POST["btn"])){
        $name=$_POST['name'];
        $email = $_POST['email'];
        $password =($_POST['password']=== $user_info["password"] ?$user_info["password"] : md5($_POST['password']));
        $room = $_POST['room'];
        $ext = $_POST['ext'];
           // Email validation - Method 2
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: error.php?error=Invalid Email');
            exit();
        }

        // Password validation
        if (!preg_match('/^[a-z 0-9_]*$/', $password)) {
            header('Location: error.php?error=Invalid Password');
            exit();
        }

    //piccccccccccc
if( isset($_FILES['profile_picture'] ) && $_FILES['profile_picture']['error'] == 0){
    $profile_picture = $_FILES['profile_picture']; //arr
    $file_tem_path = $profile_picture["tmp_name"];
    $file_name =  $profile_picture["name"];
     //get the ext
    $my_array = explode(".", $file_name);
    $my_ext = end($my_array);

    // Profile picture validation
    $allowed_ext = ["png","jpg", "jpeg","svg"];
    if (!in_array($my_ext,$allowed_ext )) {
        header('Location: error.php?error=Invalid Profile Picture');
        exit();
    }
    
        move_uploaded_file($file_tem_path, "img/".time().$file_name);      
        $profile_picture="img/".time().$file_name;
} else {
    // If no file was uploaded, keep the current profile picture
    $profile_picture = $user_info['profile_picture'];
}

//mysql
$query = "UPDATE users SET name='$name', email='$email', password='$password', room='$room', ext='$ext', profile_picture='$profile_picture' WHERE id = $id";
mysqli_query($conn , $query);
header("Location: view.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="logo.png">
  <link rel="stylesheet" href="edit_page_style.css">
</head>
<body> 
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="not_found.html">Products</a></li>
            <li><a href="users.php">Users</a></li>
        </ul>
        <div class="admin">
             <a href="index.php"> <img src="admin.jpg" alt="Admin"></a>
            <a href="index.php">Admin</a>
        </div>
    </nav>
          <!-- <h1 >Thanks</h1> -->

<img src='https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExejQ4OHZjYzg5OWtneHJnNnR6bjhqZTBiNGIxZzAxYjQzanI4YXZwayZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/LHZyixOnHwDDy/giphy.gif' alt="GIF">
    <form method="post" enctype="multipart/form-data">
        <table>
            <tr> <td class="def"><h4><?php echo " Edit  ". $user_info["name"] ;?></h4>  </td>

                 <td></td>

            </tr>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="name" value="<?php echo $user_info["name"] ?>"></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="email" value="<?php echo $user_info["email"] ?>"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" value="<?php echo $user_info["password"] ?>"></td>
            </tr>
            <tr>
                <td>Room: </td>
                <td><input type="text" name="room" value="<?php echo $user_info["room"] ?>"></td>
            </tr>
            <tr>
                <td>Ext: </td>
                <td><input type="text" name="ext"   value="<?php echo $user_info["ext"] ?>"></td>
            </tr>
            <tr>
                <td>Profile Picture: </td>
                <td>
                    <input type="file" name="profile_picture" ><?php echo explode("/", $user_info['profile_picture'])[1]; ?>
                </td>
            </tr>
            <tr>
           <td><input type="submit" name="btn" value="Save"> </td>
            </tr>
            
        </table>
    </form>
</body>
</html>
