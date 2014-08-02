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
// DELETE文を実行
$sql = "delete from result where id='$id'";
if(!$res=mysql_query($sql)){
echo "SQL実行時エラー";
exit;
}

// データベースから切断
mysql_close($con);

// 登録完了メッセージの表示
echo "削除完了";
?>
</body>
</html>