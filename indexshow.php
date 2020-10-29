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
?>  



<div id="search" class="search">
    <form action="search.php?submit=查询" method="GET">
        <table width="100%" height=30px bgcolor="#ACD6FF" style="float: center;height: 20%;">
            <tr align="center">
                <td>
                    <input type="text" name="sear" id="sear" style="width: 30%;height: 80%;" >
                    <input type="submit" name="submit" style="width: 10%;height: 80%;" value="查询">
                <td/>
            <tr/>   
        </table> 
    </form>
</div>

<table  border ="1px" cellpadding="0" cellspacing="0" bgcolor="ECECFF " style="border: 0 solid #333; width: 100%; height: 50%;text-align: center;">

    <tr align="center" height="5">
        <td>图书类别</td>
        <td>图书名称</td>
        <td>作者</td>
        <td>出版社</td>
        <td>ISBN号</td>
        <td>图书说明</td>
        <td>数量</td>
    </tr>	

    <?php
	   $rows=$conn->query('select * from book');

        while ($row=$rows->fetch_assoc()) {
    	   echo"<tr>";
           echo'<td>'.$row['class'].'</td>';
    	   echo'<td>'.$row['title'].'</td>';
    	   echo'<td>'.$row['author'].'</td>';
    	   echo'<td>'.$row['publish'].'</td>';
    	   echo'<td>'.$row['isbn'].'</td>';
    	   echo'<td>'.$row['summary'].'</td>';
    	   echo'<td>'.$row['num'].'</td>';
        }
    ?>
</table>