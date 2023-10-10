<?php
$connect = mysqli_connect('localhost','root','','db_exam');
if(!$connect){
    die ("Error connect to database". mysqli_connect_error());
}
?>