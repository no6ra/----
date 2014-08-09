<?php
include_once('db.php');
$link  = connectDB();

if(!$res=mysqli_query($link,"select id,gb, kaimono, chian, yachin from result")){
echo "SQLエラー<BR>";
exit;
}

// 検索した結果を全部表示
echo "<table border=1>";
echo "<tr><td>良い、悪い</td><td>買物便利度</td><td>治安の良さ></td><td>賃料は適切でしたか？</td><td>更新</td><td>削除</td></tr>";
while($row=mysqli_fetch_array($res)){
echo "<tr>";
echo "<td>". $row["gb"] . "</td>";
echo "<td>". $row["kaimono"] . "</td>";
echo "<td>". $row["chian"] . "</td>";
echo "<td>". $row["yachin"] . "</td>";

echo "<form action=koushin_input.php method=post>";
echo "<input type=hidden name = id value=" . $row["id"] . ">";
echo "<td><input type=submit value=更新></td>";
echo "</form>";

echo "<form action = sakujo.php method=post>";
echo "<input type = hidden name = id value=" . $row["id"] . ">";
echo "<td><input type=submit value=削除></td>";
echo "</form>";
echo "</tr>";
}
echo "</table>";

// 結果セットの解放
mysqli_free_result($res);

// データベースから切断
mysqli_close($link);
?>