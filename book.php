<!DOCTYPE html>
<html lang="en">
<head>
	<title>Read it!</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/tools.css">

</head>
<body>

	<header>

		<div class="wrapper">
			<a href="" class="logo"> <img src="images/bookmanage.png" alt="" /> </a>
			<nav>
				<ul>
					<li><a href="book.php">刷新</a></li>
					<li><a href="adminbody.html">返回主界面</a></li>
				</ul>
			</nav>
		</div>
		
	</header>

	<section class="billboard" >
		<section class="caption">
			<p class="cap_title">倘能生存，我当然仍要学习！——鲁迅</p>
			
		</section>
	</section>


<tr><td><iframe src="books.php" width=100% height=400></iframe></td></tr>


<form action="add.php" method="post">
<div id="menu">
    <table width="100%" align="center" bgcolor="#d0d0d0  ">
        <tr align="left">
        <td>
        

        <h3 style=" text-align:left;margin-top: 1%" >添加图书</h3>	


		图书名称:<input type="text" name="title" required="required">&nbsp;&nbsp;&nbsp;&nbsp;

		图书说明:<input type="text" name="summary" required="required">&nbsp;&nbsp;&nbsp;&nbsp;

		作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;者:<input type="text" name="author">&nbsp;&nbsp;&nbsp;&nbsp;

		出版社:<input type="text" name="publish" required="required">&nbsp;&nbsp;&nbsp;&nbsp;

		ISBN&nbsp;&nbsp;号:<input type="text" name="isbn" required="required">

		<br>&nbsp;&nbsp;&nbsp;&nbsp;<br>

		图书分类:<input type="text" name="class" required="required">&nbsp;&nbsp;&nbsp;&nbsp;

		图书数量:<input type="text" name="num" required="required">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<input type="submit" value="添加" style="width: 10%;height: 20%;text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		<br>&nbsp;&nbsp;&nbsp;&nbsp;<br>
		
	
        <td/>
        <tr/>   
    </table> 
</div>
</form>






<form name="frm1" method="post"  style="margin: 0">
			<table width=100% align="center">
				<h3 style=" text-align:left;margin-top: 1%" >修改图书</h3>
			<tr><tr><tr><td width="168"><span>按账号查询：</span></td>
				<td><input type="text" name="Id" id="Id" size="10">
					<input type="submit" name="test" value="查找"></td></tr>
			</table>
		</form>

	<?php

		$Id=@$_POST['Id'];
		$_SESSION['Id']=$Id;
		$db = mysqli_connect('localhost','root','root','library'); 
		$sql="select * from book where Id='$Id'";
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result);
		if(($Id!==NULL)&&(!$row))
			echo "<script>alter('不存在该图书!')</script>";


	?>

<form name="frm2" method="post" style="margin:0" enctype="multipart/form-data">
		<tr><tr><table bgcolor="#CCCCCC" width=100% border="1" align="center" cellpadding="0" cellspacing="0">

		<tr><td bgcolor="#CCCCCC" width="90"><span>Id：</span></td> 
			<td><input name="Id" type="text" size="35" value="<?php echo $row['Id'];?>">
			<input name="h_Id" type="hidden" value="<?php echo $row['Id'];?>"></td>

			<td bgcolor="#CCCCCC" width="90"><span>图书名称：</span></td> 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td><input name="title" type="text" size="35" value="<?php echo $row['title'];?>"></td>

			<td bgcolor="#CCCCCC"><span>图书说明：</span></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<td><input name="summary" type="text" size="35" value="<?php echo $row['summary'];?>"></td></tr>


			<tr><td bgcolor="#CCCCCC"><span>作者：</span></td>&nbsp;&nbsp;
			<td><input name="author" type="text" size="35" value="<?php echo $row['author'];?>"></td> 

			<td bgcolor="#CCCCCC"><span>出版社：</span></td>&nbsp;&nbsp;&nbsp;&nbsp;
			<td><input name="publish" type="text" size="35" value="<?php echo $row['publish'];?>"></td>

			<td bgcolor="#CCCCCC"><span>ISBN：</span></td>&nbsp;&nbsp;
			<td><input name="isbn" type="text" size="35" value="<?php echo $row['isbn'];?>"></td></tr>

			<tr><td bgcolor="#CCCCCC"><span>图书分类：</span></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<td><input name="class" type="text" size="35" value="<?php echo $row['class'];?>"></td>
			<td bgcolor="#CCCCCC"><span>出版时间：</span></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td><input name="btime" type="text" size="35" value="<?php echo $row['btime'];?>"></td>


			<td bgcolor="#CCCCCC"><span >图书数量：</span></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<td><input name="num" type="text" size="35" value="<?php echo $row['num'];?>"></td>

			<td align="center" colspan="2" bgcolor="#CCCCCC">
			<input name="b" type="submit" value="修改"></td>

			</table>
		</form>


	<footer>
		<div class="wrapper">
			<div class="f_cols">
				<h1>地址</h1>
				<p>浙江省杭州市临安区浙江农林大学东湖校区<br>邮编：311300</p> 	
				<a href="https://www.gaode.com/search?id=B023B07KSJ&city=330112&geoobj=116.261551%7C39.854229%7C116.584961%7C39.981148&query_type=IDQ&query=%E6%B5%99%E6%B1%9F%E5%86%9C%E6%9E%97%E5%A4%A7%E5%AD%A6(%E4%B8%9C%E6%B9%96%E6%A0%A1%E5%8C%BA)&zoom=12" class="map">查看地图<span class="arrow">&nbsp;</span></a>	
			</div>	
		</div></div></div>
	</footer>


	<?php

		$Id=@$_POST['Id'];
		$title=@$_POST['title'];
		$summary=@$_POST['summary'];
		$author=@$_POST['author'];
		$publish=@$_POST['publish'];
		$isbn=@$_POST['isbn'];
		$class=@$_POST['class'];
		$btime=@$_POST['btime'];
		$num=@$_POST['num'];
		function test($Id,$title,$summary,$author,$publish,$isbn,$class,$num)
		{
			if ($Id==NULL) {
				echo "<script>alert('id不能为空！');location.href='book.php';</script>";
				exit;
			}
			if ($title==NULL) {
				echo "<script>alert('图书名称不能为空！');location.href='book.php';</script>";
				exit;
			}
			if ($summary==NULL) {
				echo "<script>alert('图书说明不能为空！');location.href='book.php';</script>";
				exit;
			}
			if ($author==NULL) {
				echo "<script>alert('作者不能为空！');location.href='book.php';</script>";
				exit;
			}
			if ($publish==NULL) {
				echo "<script>alert('出版社不能为空！');location.href='book.php';</script>";
				exit;
			}
			if ($isbn==NULL) {
				echo "<script>alert('ISBN号不能为空！');location.href='book.php';</script>";
				exit;
			}
			if ($class==NULL) {
				echo "<script>alert('图书分类不能为空！');location.href='book.php';</script>";
				exit;
			}

			if ($num==NULL) {
				echo "<script>alert('图书数量不能为空！');location.href='book.php';</script>";
				exit;
			}
			
		}

		if(@$_POST["b"]=='修改')
		{
			
			test($Id,$title,$summary,$author,$publish,$isbn,$class,$num);
			if($Id!=$Id)
				echo "<script>alert('账号与原数据有异，不能修改！');location.href='book.php';</script>";
			else
			{
				$update_sql="update book set Id='$Id',title='$title',summary='$summary',author='$author',publish='$publish',isbn='$isbn',class='$class',btime='$btime',num='$num' where Id='$Id'";
			}
			$update_result=mysqli_query($db,$update_sql);
			if(mysqli_affected_rows($db)!=0)
				echo "<script>alert('修改成功!');location.herf='book.php';</script>";
			else
				echo "<script>alert('修改失败，请检查输入信息!');location.herf='book.php';</script>";
		}
