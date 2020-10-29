<!DOCTYPE html>
<html lang="en">

<?php
	$servername="127.0.0.1";
	$username="root";
	$password="root";
	$dbname="library";

	$conn=new mysqli($servername,$username,$password,$dbname);

	if($conn->connect_error){
		echo"连接数据库错误".$conn->connect_error;
	}else{

	}

	$sql="select * from book";

	$result=$conn->query($sql);
	for ($i=0; $i <mysqli_num_rows($result) ; $i++) { 
	}

?>


<table border ="1px" cellpadding="0" cellspacing="0" bgcolor="ECECFF" style="
border: 0 solid #333; width: 100%; height: 1%;text-align: center;">

<tr align="center" height="5">
<td>&nbsp;&nbsp;id&nbsp;&nbsp;</td>
<td>图书类别</td>
<td>图书名称</td>
<td>作者</td>
<td>出版社</td>
<td>ISBN号</td>
<td>图书说明</td>
<td>数量</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;操作&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>	


<?php
	$rows=$conn->query('select * from book');
	while ($row=$rows->fetch_assoc()) {
    	

    	echo"<tr><td><input type='hidden' name ='bookid' value=$row[id] >"."&nbsp;&nbsp;".$row['id']."&nbsp;&nbsp;"."</input></td>";
    	echo'<td>'.$row['class'].'</td>';
    	echo'<td>'.$row['title'].'</td>';
    	echo'<td>'.$row['author'].'</td>';
    	echo'<td>'.$row['publish'].'</td>';
    	echo'<td>'.$row['isbn'].'</td>';
    	echo'<td>'.$row['summary'].'</td>';
    	echo'<td>'.$row['num'].'</td>';
    	echo "<form action='?action=delete&id=<?php echo $row[id];?>' method='GET'>";
    	echo "<td>"."<input type ='submit' name='submit' value='删除'><input type='hidden' name='action' value='delete'>"."</td>";
    	echo "</form>";
    	echo "</tr>";

    }
?>
&nbsp;&nbsp;&nbsp;&nbsp;<br>	
</table>

<?php
	error_reporting(E_ALL ^E_NOTICE);

	if ($_GET["action"]=="delete"){
	$id1=$_GET["bookid"];

	$sqld="DELETE from book where Id='$id1' ";//删除数据

	$resultd=$conn->query ($sqld);

	if($resultd){
	echo "删除成功！";  
	//header("location:book.php"); 
	}
	else
	{
	echo "删除失败！";    
	}
}
	



	

?>