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

// SELECT文を実行
if(!$res=mysql_query("select id,gb, kaimono, chian, yachin from result")){
echo "SQLエラー<BR>";
exit;
}

// 検索した結果を全部表示
echo "<table border=1>";
echo "<tr><td>良い、悪い</td><td>買物便利度</td><td>治安の良さ></td><td>賃料は適切でしたか？</td><td>更新</td><td>削除</td></tr>";
while($row=mysql_fetch_array($res)){
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
mysql_free_result($res);

// データベースから切断
mysql_close($con);
?>
</body>
</html>