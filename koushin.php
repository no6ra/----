<?php
include_once('db.php');
$link  = connectDB();


$id = $_POST['id'];
$gb = $_POST['gb'];
$kaimono = $_POST['kaimono'];
$chian = $_POST['chian'];
$yachin = $_POST['yachin'];

$sql = "update result set gb='$gb' , kaimono='$kaimono' , chian='$chian' , yachin='$yachin' where id =$id";
if(!$res=mysqli_query($link,$sql)){
header("Location:sqlerror.php");
exit;
}

mysqli_close($link);

header("Location:kanri.php");
exit;