</!DOCTYPE html>
<html>

<body>

<div>
    <li style="float: right;text-align: right;width: 100%;height: 5%"><a href="br.php">返回</a></li> 
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

    }

?>

<table border ="1px" cellpadding="0" cellspacing="0" bgcolor="#FFFFDF" style="
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
        
        echo "<form action='br.php?action=borrow&id=<?php echo $row[id];?>' method='GET'>";
        echo"<tr><td><input type='hidden' name ='iid' value=$row[id] >"."&nbsp;&nbsp;".$row['id']."&nbsp;&nbsp;"."</input></td>";
        echo'<td>'.$row['class'].'</td>';
        echo'<td>'.$row['title'].'</td>';
        echo'<td>'.$row['author'].'</td>';
        echo'<td>'.$row['publish'].'</td>';
        echo'<td>'.$row['isbn'].'</td>';
        echo'<td>'.$row['summary'].'</td>';
        echo'<td>'.$row['num'].'</td>';
        echo "<form action='?action=borrow&id=<?php echo $row[id];?>' method='GET'>";
        echo "<td>"."<input type ='submit' name='submit' value='借阅'><input type='hidden' name='action' value='borrow'>"."</td>";
        echo "</form>";
        echo "</tr>";
    }


?>
</table>

<?php

    if ($_GET["action"]=="borrow"){
        $id1=$_GET["iid"];

        $sqld="UPDATE book set num=num-1 where id='$id1' ";
        $resultd=$conn->query ($sqld);

        if($resultd){
            echo "借阅成功！";   
        }
        else
        {
            echo "借阅失败！";    
        }   


        $sql1="INSERT into borrow (borrowid,bookid,bookname,stime) values ('','$id','$title','$stime')";
        $result1=$conn->query($sql1);
        if ($result1) {
            echo  "<script>alert('借书成功')</script>";

        }
    }
?>


</body>
</html>