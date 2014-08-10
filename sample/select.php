<?php

$link = mysqli_connect("localhost", "root", "root", "newenquete");

/* 接続状況をチェックします */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$yachin = 1;


/* プリペアドステートメントを作成します */
if (!$stmt = mysqli_prepare($link, "SELECT id, yachin, gb FROM result WHERE yachin=?")) {
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
mysqli_stmt_bind_result($stmt, $id, $yachin, $gb);
// SELECT id, yachin, gb
// 各値を変数へ格納する準備をしている。$id, $yachin, $gbに
// 取得した情報が格納される

/* 値を取得します */
while(mysqli_stmt_fetch($stmt)){
	printf("id: %s, yachin: %s, gb: %s<br>\n", $id, $yachin, $gb);
}

/* ステートメントを閉じます */
mysqli_stmt_close($stmt);


/* 接続を閉じます */
mysqli_close($link);
