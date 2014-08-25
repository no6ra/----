<?php

try{
$db= new PDO('mysql:host=localhost;dbname=newenquete','root', 'root');
}catch(PDOException $e){
	echo"接続出来ませんでした。";
}