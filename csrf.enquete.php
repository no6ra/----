<?php
session_start();
require_once( "token.php" );
if(isset($_POST['send']) != "" )
if(!check_token( $_POST['token'] ) ){
        echo "トークンが違います。";
    }
$harf_token = get_harf_token();
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
       <meta charset="utf-8">
       <title>住まいのアンケート</title>
     </head>
<body>
<h1>住んだ感想をご回答下さい。</h1>
<form method="post" action="newenquete2.php">
　<br>Q1:部屋の良かった点、悪かった点は？<br/>
　　<textarea name="good/bad" cols="40" rows="20"></textarea>
　<br>Q2:買物の便利度は？<br/>
　　<input type="radio" name="kaimono" value="1"> 便利
　　<input type="radio" name="kaimono" value="2"> 普通
　　<input type="radio" name="kaimono" value="3"> 不便
　<br>Q3:治安は？<br/>
　　<SELECT name="chian">
　　　<OPTION value="1">良い！！</OPTION>
　　　<OPTION value="2">普通</OPTION>
　　　<OPTION value="3">悪い</OPTION>
　　</SELECT>
  <br>Q4:家賃は適切でしたか？</br>
     <input type="checkbox" name="yachin" value="1"> 高い
     <input type="checkbox" name="yachin" value="2"> 適切
     <input type="checkbox" name="yachin" value="3"> 安い
<br>
<input type="hidden" name="token" value="<?= $harf_token ?>">
<input type="submit" name="send" value="送信"></br>
</form>
</body>
</html>
