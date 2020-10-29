<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>library</title>
</head>
<body>

	<div>
    	<li style="float: right;text-align: right;width: 100%;height: 5%"><a href="indexshow.php">返回</a></li> 
	</div>


    <div id="search_connect" class="search_connect">
        <?php
        	$_SESSION["sear"]=null;
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

        	if ($_GET['submit'] == '查询') {
        		$info=$_GET["sear"];
        		$sqle="SELECT * from book where id='$info' or class='$info' or title='$info' or author='$info' or publish='$info' or isbn='$info' or summary='$info' or num='$info'";
        		$resulte=$conn->query ($sqle);
        		if (!$resulte) {
        			printr("Error:%s\n",mysqli_error($conn));
        			exit();
        			# code...
        		}
        		//else{}
        		$number=mysqli_num_rows($resulte);
        		if ($number) {
        			for ($i=1;$i<=$number;$i++) 
        				$row[]=mysqli_fetch_assoc($resulte);
        			echo "<table  cellpadding=0 cellspacing=0 id='all' bgcolor=ECECFF width=100% style=text-align: center;><tr align=center ><td>图书类别</td><td>图书名称</td><td>作者</td><td>出版社</td><td>ISBN号</td><td>图书说明</td><td>数量</td></tr>"; 
        			foreach ($row as $key => $value) {
        				echo'<tr align=center><td>'.$value['class'].'</td>';
        				echo'<td>'.$value['title'].'</td>';
        				echo'<td>'.$value['author'].'</td>';
        				echo'<td>'.$value['publish'].'</td>';
        				echo'<td>'.$value['isbn'].'</td>';
        				echo'<td>'.$value['summary'].'</td>';
        				echo'<td>'.$value['num'].'</td></tr>';
        		  		# code...
        			}
        		}else{
        			echo "<script>alert('无查询结果！');</script>";
        		}  
        	}
		?>
    </div>
</body>
</html>