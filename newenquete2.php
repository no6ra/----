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

$gb = $_REQUEST['good/bad'];
$kaimono = $_REQUEST['kaimono'];
$chian  = $_REQUEST['chian'];
$yachin  = $_REQUEST['yachin'];

include_once('st.db.php');

$sql= "INSERT INTO result (gb,kaimono,chian,yachin) VALUES (:gb,:kaimono,:chian,:yachin)";
$prepare = $db->prepare($sql);

$prepare->bindvalue(":gb",$_REQUEST['good/bad'], PDO::PARAM_STR);
$prepare->bindvalue(":kaimono",$_REQUEST['kaimono'], PDO::PARAM_STR);
$prepare->bindvalue(":chian",$_REQUEST['chian'], PDO::PARAM_STR);
$prepare->bindvalue(":yachin",$_REQUEST['yachin'], PDO::PARAM_STR);

$prepare-> execute();

?>
<p>登録が完了しました。<br /><a href="st.csrf.enquete.php">戻る</a></p>