<?php
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
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
<p>登録が完了しました。<br /><a href="newenquete.html">戻る</a></p>
</body>
</html>