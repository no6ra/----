<?php
include_once('db.php');
$link  = connectDB();

if(!$res=mysqli_query($link,"select id,gb, kaimono, chian, yachin from result")){
print "SQLエラー<BR>";
exit;
}

require "common.php";

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
<?while($row=mysqli_fetch_array($res)){?>
<tr>
<td><?php echo(h($row["gb"]))?></td>
<td><?php echo(h($row["kaimono"]))?></td>
<td><?php echo(h($row["chian"]))?></td>
<td><?php echo(h($row["yachin"]))?></td>

<form action="koushin_input.php" method="post">
<input type="hidden" name = "id" value="<?php echo$row["id"]?>">
<td><input type="submit" value="更新"></td>
</form>

<form action = "sakujo.php" method="post">
<input type = "hidden" name = "id" value="<?php echo$row["id"]?>">
<td><input type="submit" value="削除"></td>
</form>

</tr>
<?}?>
</table>
</body>
</html>
<? 
mysqli_free_result($res);

mysqli_close($link);