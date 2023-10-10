<?php
include('connection.php');
if(isset($_POST['Submit'])){
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $qurey = "select * from tbl_user where emailid='$email'";
    $result = mysqli_query($connect,$qurey);
    $row = mysqli_num_rows($result);
    if($row >0){
        echo "<script>alert('Email Id Already Exist')</script>";
    }else{
        $sql = "insert into tbl_user values(0,'$fname','$lname','$address','$mobile','$email','$password')";
        $res = mysqli_query($connect,$sql);
        if($res){
            echo "<script>alert('Registration Successfull')</script>";
        }else{
            echo "<script>alert('Registration Failed')</script>";
        }
    }
}

if(isset($_GET['lg'])){
    session_start();
    session_destroy();
    header('location:login.php');
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
                    <td>First Name: </td>
                    <td><input type="text" name="firstName" require></td>
                </tr>
                <tr>
                    <td>Last Name: </td>
                    <td><input type="text" name="lastName" require></td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td><textarea name="address" id="1" cols="20" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Mobile No: </td>
                    <td><input type="number" name="mobile" require></td>
                </tr>
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