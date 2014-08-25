<?php
include_once('st.db.php');

$id = $_POST['id'];
// DELETE文を実行

$sql = "DELETE FROM result WHERE id=:id";
$prepare=$db->prepare($sql);
$prepare->bindvalue(":id",$_POST["id"],PDO::PARAM_INT);
$prepare->execute();

header("Location:kanri.php");