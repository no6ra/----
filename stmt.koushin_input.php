<?php
include_once('db.php');
$link  = connectDB();

$yachin = 1;

/* プリペアドステートメントを作成します */
if (!$stmt = mysqli_prepare($link, "SELECT id, gb, kaimono, chian, yachin FROM result WHERE yachin=?")) {
	$msg = mysqli_error($link);
	printf("Errormessage: %s\n", $msg);
	mysqli_close($link);
	exit();
}

/* マーカにパラメータをバインドします マーカは「?」を入れた部分のことです */
mysqli_stmt_bind_param($stmt, "i", $yachin);
// ここまでの操作で$stmtが
// SELECT id, yachin, gb FROM result WHERE yachin=1
// として動作する準備が出来ました。
// バインドは英語のままの意味で良く、接続する、のような理解で良いです。


/* クエリを実行します */
mysqli_stmt_execute($stmt);
// 実行した結果情報は$stmtが持っていると思って下さい


/* 結果変数をバインドします */
mysqli_stmt_bind_result($stmt, $id, $gb, $kaimono, $chian, $yachin);


// データの存在チェック
if(!$row=mysqli_stmt_fetch($stmt)){
echo "データが削除されています";
exit;
}

// 入力画面の出力
echo "<form action=stmt.koushin.php method=post>";
echo "良い、悪い：<input type=text name=gb value=\"" . "$gb" . "\"> ";
echo "買物便利度：<input type=text name=kaimono value=" . "$kaimono" . "> ";
echo "治安の良さ：<input type=text name=chian value=" . "$chian" . "> ";
echo "賃料は適切でしたか：<input type=text name=yachin value=" . "$yachin" . "> ";
echo "<input type=hidden name=id value=" . $id . ">";
echo "<input type=submit value=更新>";
echo "</form>";

mysqli_stmt_close($stmt);

mysqli_close($link);