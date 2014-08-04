<?php
if(!$con=mysql_connect('localhost', 'root', 'root')){
exit;
}

if(!mysql_select_db("newenquete",$con)){
header("Location:dberror.php");

exit;
}

$id = $_POST['id'];
$gb = $_POST['gb'];
$kaimono = $_POST['kaimono'];
$chian = $_POST['chian'];
$yachin = $_POST['yachin'];

$sql = "update result set gb='$gb' , kaimono='$kaimono' , chian='$chian' , yachin='$yachin' where id =$id";
if(!$res=mysql_query($sql)){
header("Location:sqlerror.php");
exit;
}

mysql_close($con);

header("Location:kanri.php");
exit;
?>