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

include_once('db.php');
$link  = connectDB();

$gb   = $_REQUEST['good/bad'];
$kaimono = $_REQUEST['kaimono'];
$chian  = $_REQUEST['chian'];
$yachin  = $_REQUEST['yachin'];

$result = mysqli_query($link,"INSERT INTO result(gb, kaimono, chian, yachin) VALUES('$gb', '$kaimono', '$chian', '$yachin')");
if (!$result) {
  exit('データを登録できませんでした。');
}

$con = mysqli_close($link);
if (!$link) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
<p>登録が完了しました。<br /><a href="csrf.enquete.php">戻る</a></p>