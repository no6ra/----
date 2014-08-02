<html>
<body>
<?
// データベースに接続
if(!$con=mysql_connect('localhost', 'root', 'root')){
echo"接続エラー";
exit;
} 

// データベースを選択
if(!mysql_select_db("newenquete",$con)){
echo"データベース選択エラー";
exit;
}
$id = $_POST['id'];
$gb = $_POST['gb'];
$kaimono = $_POST['kaimono'];
$chian = $_POST['chian'];
$yachin = $_POST['yachin'];

// UPDATE文を実行
$sql = "update result set gb='$gb' , kaimono='$kaimono' , chian='$chian' , yachin='$yachin' where id =$id";
if(!$res=mysql_query($sql)){
echo "SQL実行時エラー";
exit;
}

// データベースから切断
mysql_close($con);

// 登録完了メッセージの表示
echo "更新完了";
?>
</body>
</html>