<?php
include_once('db.php');
$link  = connectDB();

$id = $_POST['id'];
// SELECT文を実行
$sql = "select gb,kaimono,chian,yachin from result where id = '$id'";
if(!$res=mysqli_query($link,$sql)){
echo "SQL実行時エラー";
exit;
}

// データの存在チェック
if(!$row=mysqli_fetch_array($res)){
echo "データが削除されています";
exit;
}

// 入力画面の出力
echo "<form action=koushin.php method=post>";
echo "良い、悪い：<input type=text name=gb value=\"" . $row["gb"] . "\"> ";
echo "買物便利度：<input type=text name=kaimono value=" . $row["kaimono"] . "> ";
echo "治安の良さ：<input type=text name=chian value=" . $row["chian"] . "> ";
echo "賃料は適切でしたか：<input type=text name=yachin value=" . $row["yachin"] . "> ";
echo "<input type=hidden name=id value=" . $id . ">";
echo "<input type=submit value=更新>";
echo "</form>";

// 結果セットの解放
mysqli_free_result($res);

// データベースから切断
mysqli_close($link);