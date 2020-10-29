

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
?>


<table border ="1px" cellpadding="0" cellspacing="0" bgcolor="ECECFF" style="
border: 0 solid #333; width: 100%; height: 5%;text-align: center;">
	<tr align="center" height="5">
		<td>借阅人</td>
		<td>借阅书编号</td>
		<td>书名</td>
		<td>借阅时间</td>
	</tr>   

	<?php
		$rows=$conn->query("select * from borrow");
   		while ($row=$rows->fetch_assoc()) {
    		echo'<tr><td>'.$row['borrowid'].'</td>';
    		echo'<td>'.$row['bookid'].'</td>';
    		echo'<td>'.$row['bookname'].'</td>';
    		echo'<td>'.$row['stime'].'</td></tr>';
    	}
	?>
</table>