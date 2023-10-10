<?php
include('connection.php');
session_start();
if(isset($_GET['bid'])){
    $bid = $_GET['bid'];
    $act = $_GET['act'];
    if($act == 1)
        $update = "update tbl_blog set status=0 where blog_id=$bid";
    else
        $update="update tbl_blog set status=1 where blog_id=$bid";

    mysqli_query($connect,$update);
    header('location:home.php');
}

if(isset($_GET['deleteId'])){
    $deleteId = $_GET['deleteId'];
    $qurey = "delete from tbl_blog where blog_id=$deleteId";
    mysqli_query($connect,$qurey);
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <center>
        <h1>Welcome to Blog <?php echo $_SESSION['username']?> | <a href="index.php?lg=1">LogOut</a></h1>
        <h2><a href="addblog.php">Add Blog</a></h2>
        <table border='1'>
            <tr>
                <td>No.</td>
                <td>Title</td>
                <td>Details</td>
                <td>Date</td>
                <td>Status</td>
                <td>Update</td>
                <td>Delete</td>
            </tr>
            <?php
            $i = 0;
            $qurey = "select * from tbl_blog where user_id=$_SESSION[userid] order by blog_id desc";
            $result = mysqli_query($connect,$qurey);
            while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $row[1]?></td>
                    <td><?php echo $row[2]?></td>
                    <td><?php echo $row[3]?></td>
                    <td><?php 
                     if($row[5] == 1)
                        echo "<a href=home.php?bid=$row[0]&act=$row[5]>Disable</a>";
                    else
                        echo "<a href=home.php?bid=$row[0]&act=$row[5]>Enable</a>"; ?></td>
                    <td><?php echo "<a href=updateblog.php?bid=$row[0]>Update</a>"?></td>
                    <td><?php echo "<a href=home.php?deleteId=$row[0]>Delete</a>"?></td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
    </center>
</body>
</html>