<?php
header("Content-type:text/html;charset=utf-8");
$Id = $_POST["Id"];
$username = $_POST["username"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];

$db = new mysqli('localhost','root','root','library'); 		
$sql="insert into user values('{$Id}','{$username}','{$password}','{$mobile}',0)";

$r = $db->query($sql,1);
if($r){

    header(" location:login.php");
}else{
    header(" location:login.php");
}
?>