<?php
function connectDB(){

if(!$con=mysqli_connect('localhost', 'root', 'root')){
echo"接続エラー";

}

if(!mysqli_select_db($con,"newenquete")){
echo"データベース選択エラー";
exit;
}


return $con;
}
