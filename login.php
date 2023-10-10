<?php
include('connection.php');
session_start();
if(isset($_POST['Submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $qurey = "select * from tbl_user where emailid='$email' and password='$password'";
    $result = mysqli_query($connect,$qurey);
    $count = mysqli_num_rows($result);
    if($count > 0){
        $row = mysqli_fetch_array($result);
        $_SESSION['username'] = $row[1];
        $_SESSION['userid'] = $row[0];
        header('location:home.php');
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>db_Exam</title>
</head>
<body>
    <center>
        <h1>--Blog Web--</h1>
        <h3><a href="login.php">Login</a> | <a href="index.php">Registration</a></h3>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Email Id: </td>
                    <td><input type="email" name="email" require></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" require></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Submit" require></td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>