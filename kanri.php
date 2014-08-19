
<?php
include_once('db.php');
$link  = connectDB();

if(!$res=mysqli_query($link,"select id,gb, kaimono, chian, yachin from result")){
print "SQLエラー<BR>";
exit;
}
?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
       <meta charset="utf-8">
       <title>アンケート回答結果</title>
     </head>
<body>
<table border=1>
<tr><td>良い、悪い</td><td>買物便利度</td><td>治安の良さ></td><td>賃料は適切でしたか？</td><td>更新</td><td>削除</td></tr>
<?while($row=mysqli_fetch_array($res)){
print"<tr>";
print "<td>". htmlspecialchars($row["gb"],ENT_QUOTES) . "</td>";
print "<td>". htmlspecialchars($row["kaimono"],ENT_QUOTES) . "</td>";
print "<td>". htmlspecialchars($row["chian"],ENT_QUOTES) . "</td>";
print "<td>". htmlspecialchars($row["yachin"],ENT_QUOTES) . "</td>";

print "<form action=koushin_input.php method=post>";
print "<input type=hidden name = id value=" . $row["id"] . ">";
print "<td><input type=submit value=更新></td>";
print "</form>";

print "<form action = sakujo.php method=post>";
print "<input type = hidden name = id value=" . $row["id"] . ">";
print "<td><input type=submit value=削除></td>";
print "</form>";
print "</tr>";
}
?>
</table>
<?
mysqli_free_result($res);

mysqli_close($link);
?>
</body>
</html>