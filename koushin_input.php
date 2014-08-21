<?php
session_start();
require_once( "token.php" );
if(isset($_POST['send']) != "" )
if(!check_token( $_POST['token'] ) ){
      echo "トークンが違います。";
    }
$harf_token = get_harf_token();

include_once('db.php');
$link  = connectDB();

$id = $_POST['id'];
// SELECT文を実行
$sql = "select gb,kaimono,chian,yachin from result where id = '$id'";
if(!$res=mysqli_query($link,$sql)){
echo "SQL実行時エラー";
exit;
}
require "common.php";

// データの存在チェック
if(!$row=mysqli_fetch_array($res)){
echo "データが削除されています";
exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>アンケート回答修正</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

 <? require "header.html";?>

  </head>
<body>

<div class="container">
<div id="header" style="background:red;" >header</div>

<form action=koushin.php method=post>
<br>良い、悪い</br><input type=text name=gb value=<? echo(h($row["gb"]))?>>
<br>買物便利度</br><input type=text name=kaimono value=<? echo (h($row["kaimono"]))?>>
<br>治安の良さ</br><input type=text name=chian value=<? echo(h($row["chian"]))?>>
<br>賃料は適切でしたか</br><input type=text name=yachin value=<? echo(h($row["yachin"]))?>>

<br><input type="hidden" name="token" value="<?= $harf_token ?>">
<input type=hidden name=id value=<? echo $id ?>>
<input type=submit value=更新>
</br>
</form>

<div id="footer" style="background:red;">speedmap-navi.com</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?
// 結果セットの解放
mysqli_free_result($res);

// データベースから切断
mysqli_close($link);