</!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>library</title>
</head>
<body>

<div>
	<li style="float: left;width: 100%;"><a href="book.php">返回</a></li>	
</div>

<?php
	$servername="127.0.0.1";
	$username="root";
	$password="root";
	$dbname="library";

	$conn=new mysqli($servername,$username,$password,$dbname);

	if($conn->connect_error){
		echo"连接数据库错误".$conn->connect_error;
	}else{
		//echo"数据库连接成功";
	}
?>

<?php
$title = $_POST["title"];
$summary = $_POST["summary"];
$author = $_POST["author"];
$publish = $_POST["publish"];
$isbn = $_POST["isbn"];
$class = $_POST["class"];
$num = $_POST["num"];

$sql= "INSERT into book (title,summary,author,publish,isbn,class,num) values ('$title','$summary','$author','$publish','$isbn','$class',$num)";

$result=$conn->query($sql);

if($result)                         
{
header("location:book.php");   
}
else
{
echo "添加失败！";    
}
?>



</body>
</html>