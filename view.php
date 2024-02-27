<?php 
    include_once("Mysql.php"); 
    $query = "SELECT * FROM users";
    $data = mysqli_query($conn, $query); 
?>
<!DOCTYPE html>
<html >
<head>
    <link rel="icon" href="logo.png">
    <style>
        nav {
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
}
   a {
    text-decoration: none;
}

button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

</style>
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
    <h1>Users List</h1>
    <center> 
        <table border="1" >
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Room</th>
                <th>Ext</th>
                <th>Profile Picture</th>
                <th>Delete User</th>
                <th>Edit User</th>
            </tr>
                <?php 
            for(;$info = mysqli_fetch_assoc($data);)
{                       echo "<tr>";
                       echo "<td>".$info["name"]."</td>";
                       echo "<td>".$info["email"]."</td>"; 
                       echo "<td>".$info["password"]."</td>";
                       echo "<td>".$info["room"]."</td>";
                       echo "<td>".$info["ext"]."</td>";
                       echo "<td><img src='".$info["profile_picture"]."' width='60' height='50'></td>";
                       echo "<td><a href='delete.php?uid=$info[id]'>Delete</a></td>";
                       echo "<td><a href='edit.php?uid=$info[id]'>Edit</a></td>";
                       echo "</tr>";
                    }
                ?>
        </table>

    <a href="createForm.php">
    <button>Add Users</button>
     </a>
</center>
</body>
</html>

