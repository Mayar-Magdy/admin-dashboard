<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css">
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
    <h2>Add User</h2>
    <form action="create.php"  method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Confirm Password: </td>
                <td> <input type="password" name="confirm_password" required></td>
            </tr>
            <tr>
                <td>Room No.: </td>
                <td><select name="room">
                        <option value="Application1">Application1</option>
                        <option value="Application2">Application2</option>
                        <option value="Cloud">Cloud</option>
                    </select></td>
            </tr>
            <tr>
                <td>Ext.: </td>
                <td> <input type="text" name="ext" required></td>
            </tr>
            <tr>
                <td>Profile Picture: </td>
                <td> <input type="file" name="profile_picture" accept="image/*" ></td>
            </tr>
            <tr>
                <td><input type="submit" name="btn"> </td>
                <td><input type="reset"></td>

            </tr>
        </table>
    </form>
</body>

</html>