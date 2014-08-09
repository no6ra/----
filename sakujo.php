<?php
include_once('db.php');
$link  = connectDB();

$id = $_POST['id'];
// DELETE文を実行
$sql = "delete from result where id='$id'";
if(!$res=mysqli_query($link,$sql)){
echo "SQL実行時エラー";
exit;
}

// データベースから切断
mysqli_close($link);
header("Location:kanri.php");
// 登録完了メッセージの表示
echo "削除完了";