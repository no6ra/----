<?php

$con = mysql_connect('localhost', 'root', 'root');
if (!$con) {
  exit('データベースに接続できませんでした。');
}

$result = mysql_select_db('newenquete', $con);
if (!$result) {
  exit('データベースを選択できませんでした。');
}

$gb   = $_REQUEST['good/bad'];
$kaimono = $_REQUEST['kaimono'];
$chian  = $_REQUEST['chian'];
$yachin  = $_REQUEST['yachin'];

$result = mysql_query("INSERT INTO result(gb, kaimono, chian, yachin) VALUES('$gb', '$kaimono', '$chian', '$yachin')", $con);
if (!$result) {
  exit('データを登録できませんでした。');
}

$con = mysql_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
<p>登録が完了しました。<br /><a href="newenquete.html">戻る</a></p>
</body>
</html>