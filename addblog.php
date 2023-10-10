<?php
include('connection.php');
session_start();
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $userid = $_SESSION['userid'];
    $created_at = date('Y-m-d');
    $qurey = "insert into tbl_blog values(0,'$title','$detail','$created_at','$userid',1)";
    $result = mysqli_query($connect,$qurey);
    if($result){
        echo "<script>alert('Blog Added Successfully');widows:location='home.php'</script>";
    }else{
        echo "<script>alert('Blog Added Failed')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
</head>
<body>
    <center>
        <h1>Welcome to Blog <?php echo $_SESSION['username']?> | <a href="index.php?lg=1">LogOut</a></h1>
        <h2><a href="home.php">View Blog</a></h2>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Bolg Title: </td>
                    <td><input type="text" name="title" require></td>
                </tr>
                
                <tr>
                    <td>Bolg Details: </td>
                    <td><textarea name="detail" id="1" cols="20" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td> </td>
                    <td><input type="submit" name="submit" value="Submit" require></td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>