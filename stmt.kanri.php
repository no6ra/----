<?php
include_once('db.php');
$link  = connectDB();

if(!$res=mysqli_query($link,"select id,gb, kaimono, chian, yachin from result")){
echo "SQLエラー<BR>";
exit;
}

$id = 1;

/* プリペアドステートメントを作成します */
if (!$stmt = mysqli_prepare($link, "SELECT id, gb, kaimono, chian, yachin FROM result WHERE id=?")) {
	$msg = mysqli_error($link);
	printf("Errormessage: %s\n", $msg);
	mysqli_close($link);
	exit();
}

/* マーカにパラメータをバインドします マーカは「?」を入れた部分のことです */
mysqli_stmt_bind_param($stmt, "i", $id);
// ここまでの操作で$stmtが
// SELECT id, yachin, gb FROM result WHERE yachin=1
// として動作する準備が出来ました。
// バインドは英語のままの意味で良く、接続する、のような理解で良いです。


/* クエリを実行します */
mysqli_stmt_execute($stmt);
// 実行した結果情報は$stmtが持っていると思って下さい


/* 結果変数をバインドします */
mysqli_stmt_bind_result($stmt, $id, $gb, $kaimono, $chian, $yachin);
// SELECT id, yachin, gb
// 各値を変数へ格納する準備をしている。$id, $yachin, $gbに
// 取得した情報が格納される

echo "<table border=1>";
echo "<tr><td>良い、悪い</td><td>買物便利度</td><td>治安の良さ></td><td>賃料は適切でしたか？</td><td>更新</td><td>削除</td></tr>";
/* 値を取得します */
while(mysqli_stmt_fetch($stmt)){
echo "<tr>";
echo "<td>". "$gb" . "</td>";
echo "<td>". "$kaimono" . "</td>";
echo "<td>". "$chian" . "</td>";
echo "<td>". "$yachin" . "</td>";

echo "<form action=stmt.koushin_input.php method=post>";
echo "<input type=hidden name = id value=" . "$id" . ">";
echo "<td><input type=submit value=更新></td>";
echo "</form>";

echo "<form action = sakujo.php method=post>";
echo "<input type = hidden name = id value=" . "$id" . ">";
echo "<td><input type=submit value=削除></td>";
echo "</form>";
echo "</tr>";
}
echo "</table>";

/* ステートメントを閉じます */
mysqli_stmt_close($stmt);


/* 接続を閉じます */
mysqli_close($link);