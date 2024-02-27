<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Created Suscssufully</title>
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
      
        button {
    background-color:  #2773B2;;
    color: white;
    padding: 15px 32px;
    text-align: center;
    display: inline-block;
    cursor: pointer;
    position: absolute;
    top: 60%;
    left: 70%;
    transform: translate(-50%, -50%);
}
    </style>
    <link rel="icon" href="logo.png">

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
    <div> <img src='https://cdn.dribbble.com/users/282053/screenshots/2468949/media/e70d5f8de9004f2fcb6ffd02aa04af26.gif'></div>
    <?php
     echo "  <h1 style= ' color:#2773B2 ; margin-top:-200px; margin-left:800px;'> User Created Suscssufully !</h1>";
     ?>
   <a href="view.php">
    <button>View Users List</button>
     </a>

</body>

</html>
