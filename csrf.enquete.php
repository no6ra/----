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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>住まいに関するアンケート</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <? require "header.html";?>
  
  </head>
<body>
  
<div class = "container" style = "padding:20px 0">

<form method="post" action="newenquete2.php">
　<div class ="form-group" >
	<br><p><strong>住んだ感想をご回答下さい。</strong></p><br>
	
  <label class="control-label" for="gb">Q1:部屋の良かった点、悪かった点は？</label>
　　<br><textarea name="good/bad" cols="40" rows="10"></textarea></br>
	
	<label class="control-label" for="gb">Q2:買物の便利度は？</label>
　　<br>
    <input type="radio" name="kaimono" value="1"> 便利
　　<input type="radio" name="kaimono" value="2"> 普通
　　<input type="radio" name="kaimono" value="3"> 不便
　　</br>
<label class="control-label" for="gb">Q3:治安は？</label>
     <br>
     <SELECT name="chian">
　　　<OPTION value="1">良い！！</OPTION>
　　　<OPTION value="2">普通</OPTION>
　　　<OPTION value="3">悪い</OPTION>
　　</SELECT>
      </br>

<label class="control-label" for="gb">Q4:家賃は適切でしたか？</label>
  <br>
     <input type="checkbox" name="yachin" value="1"> 高い
     <input type="checkbox" name="yachin" value="2"> 適切
     <input type="checkbox" name="yachin" value="3"> 安い
 </br>
   <div>
<input type="hidden" name="token" value="<?= $harf_token ?>">
<input type="submit" name="send" value="送信" class="btn btn-primary"></br>
</form>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>