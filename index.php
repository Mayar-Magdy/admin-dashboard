<?php
    include_once("Mysql.php"); 
    $query = "SELECT * FROM users";
    $data = mysqli_query($conn, $query); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>nav {
    background-color: #f9f9f9;
    border-bottom: 2px solid #ccc;
    display: flex;
    justify-content: space-between;
    padding: 10px 50px;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

nav li {
    display: inline;
    margin-right: 15px;
}
nav a {
    text-decoration: underline;
    color: black;
}

nav a:hover {
    color: blue;
    cursor: pointer;
}

nav .admin {
    display: flex;
    align-items: center;
}

nav .admin img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 5px;
}</style>
<!-- <link rel="icon" href="logo.png"> -->
<link rel="shortcut icon" type="image/png" href="logo.png"/>
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
    <h1>Admin Page</h1>
    <h2>Our Pages</h2>
    <ul>
        <li><a href="createForm.php">Add Users</a></li>
        <li><a href="view.php">Show Users Information</a></li>
        <li><a href="viewbyoop.php">Show Users Information Using Oop</a></li>
        
        
        <li>
            <a href="#">Edit User</a>
            <form action="edit.php" method="get">
                <label >Choose an ID to edit:</label>
                <select name="uid" id="uid">
          <?php 
                 while($info = mysqli_fetch_assoc($data)){
                   echo "<option value=\"{$info['id']}\">{$info['id']}</option>";
                }
                ?>
                </select>
                <input type="submit" value="Edit">
            </form>
        </li>


      <li>
            <a href="#">Delete User</a>
            <form action="delete.php" method="get">
                <label >Choose an ID to delete:</label>
                <select name="uid" id="uid">
                <?php 
                  $data = mysqli_query($conn, $query); 
                  for(;$info = mysqli_fetch_assoc($data);)
                        echo "<option value=\"{$info['id']}\">{$info['id']}</option>";
                ?>
                </select>
                <input type="submit" value="Delete">
            </form>
        </li>
    </ul>
</body>
</html>