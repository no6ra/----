<?php
include_once('db.php');
$link  = connectDB();

if(!$res=mysqli_query($link,"select id,gb, kaimono, chian, yachin from result")){
print "SQLエラー<BR>";
exit;
}

require "common.php";

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>アンケート回答結果</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<? require "header.html";?>

  </head>

<body>
<br>
<div class="container" style = "padding:20px 0">
<br><label class="control-label" for="gb">回答結果一覧です。「更新」「削除」ができます。</label></br><br>
<table class ="table table-striped table-bordered">
<tr><td><strong>良い、悪い</strong></td><td>買物便利度</td><td>治安の良さ></td><td>賃料は適切でしたか？</td><td>更新</td><td>削除</td></tr>
<?while($row=mysqli_fetch_array($res)){?>
<tr>
<td><?php echo(h($row["gb"]))?></td>
<td><?php echo(h($row["kaimono"]))?></td>
<td><?php echo(h($row["chian"]))?></td>
<td><?php echo(h($row["yachin"]))?></td>

<form action="koushin_input.php" method="post">
<input type="hidden" name = "id" value="<?php echo$row["id"]?>">
<td><input type="submit" value="更新" class="btn btn-primary"></br></td>
</form>

<form action = "sakujo.php" method="post">
<input type = "hidden" name = "id" value="<?php echo$row["id"]?>">
<td><input type="submit" value="削除" class="btn btn-primary"></br></td>
</form>
</tr>
<?}?>
</table>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<div id="footer" style="background:red;">speedmap-navi.com</div>
</div>
  </body>
</html>
<? 
mysqli_free_result($res);

mysqli_close($link);