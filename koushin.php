<?php
session_start();

function check_token( $harf_token ){
    $ch_token = $_SESSION['original_token'];
    $token = $harf_token.$_SESSION['harf_token'];
    if( strcmp( $ch_token, $token ) === 0 ){
 
        return true;
    }
    return false;
}

include_once('st.db.php');

$sql="UPDATE result SET gb=:gb,kaimono=:kaimono,chian=:chian,yachin=:yachin WHERE id=:id";

$prepare = $db->prepare($sql);

$prepare->bindvalue(":gb",$_POST["gb"], PDO::PARAM_INT);
$prepare->bindvalue(":kaimono",$_POST["id"], PDO::PARAM_INT);
$prepare->bindvalue(":chian",$_POST["chian"], PDO::PARAM_INT);
$prepare->bindvalue(":yachin",$_POST["yachin"], PDO::PARAM_INT);
$prepare->bindvalue(":id",$_POST["id"], PDO::PARAM_INT);


$prepare->execute();

header("Location:kanri.php");
exit;