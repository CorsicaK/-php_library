<!DOCTYPE html>
<html lang="en">

	<form name="frm1" method="post"  style="margin: 0">
			<table width="340" align="center">
			<tr><tr><tr><td width="168"><span class="h3">按账号查询：</span></td>
				<td><input type="text" name="Id" id="Id" size="10">
					<input type="submit" name="test" class="h3" value="查找"></td></tr>
			</table>
		</form>

	<?php

		$Id=@$_POST['Id'];
		$_SESSION['Id']=$Id;
		$db = mysqli_connect('localhost','root','root','library'); 
		$sql="select * from admin where Id='$Id'";
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result);
		if(($Id!==NULL)&&(!$row))
			echo "<script>alter('不存在该管理员!')</script>";


	?>
		<form name="frm2" method="post" style="margin:0" enctype="multipart/form-data">
		<tr><tr><table bgcolor="#CCCCCC" width="430" border="1" align="center" cellpadding="0" cellspacing="0">
		<tr><td bgcolor="#CCCCCC" width="90"><span class="h3">账号：</span></td> 
			<td><input name="Id" type="text" size="35" class="h3" value="<?php echo $row['Id'];?>">
			<input name="h_Id" type="hidden" value="<?php echo $row['Id'];?>"></td></tr>

			<tr><td bgcolor="#CCCCCC" width="90"><span class="h3">姓名：</span></td> 
			<td><input name="adminname" type="text" size="35" class="h3" value="<?php echo $row['adminname'];?>"></td></tr>
			<tr><td bgcolor="#CCCCCC"><span class="h3">密码：</span></td> 
			<td><input name="password" type="text" size="35" class="h3" value="<?php echo $row['password'];?>"></td></tr>
			<tr><td align="center" colspan="2" bgcolor="#CCCCCC">
			<input name="b" type="submit" value="修改" class="h3">&nbsp;&nbsp;
			<input name="b" type="submit" value="添加" class="h3">&nbsp;&nbsp;
			<input name="b" type="submit" value="删除" class="h3"></td></tr>
			</table>
		</form>
			</body>
		</html>

		<?php
	$db = mysqli_connect('localhost','root','root','library');

		$sql1="select * from admin";
		$result1=mysqli_query($db,$sql1);
			echo '<table border="2" bgcolor="#CCCCCC" width="430" border="1" align="center" cellpadding="0" cellspacing="0"><td>以下为全部管理员信息</td>';
			echo '<table border="2" bgcolor="#CCCCCC" width="430" border="1" align="center" cellpadding="0" cellspacing="0"><tr><tr><td>账号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>姓名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>密码</td></tr>';
		while($row = mysqli_fetch_array($result1))
			{
				echo "<tr><td> {$row['Id']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> "."<td>{$row['adminname']}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>"."<td>{$row['password']} </td> "."</tr>";
				}
				echo '</table>';
		?>

		<?php

		$Id=@$_POST['Id'];
		$adminname=@$_POST['adminname'];
		$password=@$_POST['password'];
		function test($Id,$adminname,$password)
		{
			if ($Id==NULL) {
				echo "<script>alert('账号不能为空！');location.href='admin.php';</script>";
				exit;
			}
			if ($adminname==NULL) {
				echo "<script>alert('姓名不能为空！');location.href='admin.php';</script>";
				exit;
			}
			if ($password==NULL) {
				echo "<script>alert('密码不能为空！');location.href='admin.php';</script>";
				exit;
			}
		}

		if(@$_POST["b"]=='修改')
		{
			echo "<script>if(!confirm('确认修改'))return FALSE;</script>";
			test($Id,$adminname,$password);
			if($Id!=$Id)
				echo "<script>alert('账号与原数据有异，不能修改！');location.href='admin.php';</script>";
			else
			{
				$update_sql="update admin set Id='$Id',adminname='$adminname',password='$password'";
			}
			$update_result=mysqli_query($db,$update_sql);
			if(mysqli_affected_rows($db)!=0)
				echo "<script>alert('修改成功!');location.herf='admin.php';</script>";
			else
				echo "<script>alert('修改失败，请检查输入信息!');location.herf='admin.php';</script>";
		}

		if(@$_POST["b"]=='添加')
		{
			test($Id,$adminname,$password);
			$s_sql="select Id from admin where Id='$Id'";
			$s_result=mysqli_query($db,$s_sql);
			$s_row=mysqli_fetch_array($s_result);
			if($s_row)
			{
				echo "<script>alert('该管理员已存在，无法添加');location.herf='admin.php';</script>";
			}
			else
			{
				$insert_sql="insert into admin(Id,adminname,password) values ('$Id','$adminname','$password')";

			}
			$insert_result=mysqli_query($db,$insert_sql);
			if(mysqli_affected_rows($db)!=0)
				echo "<script>alert('添加成功!');location.herf='admin.php';</script>";
			else
				echo "<script>alert('添加失败，请检查输入信息!');location.herf='admin.php';</script>";
		}

		if(@$_POST["b"]=='删除')
		{
			if($Id==NULL)
			{
				echo "<script>alert('请输入要删除的管理员账号!');location.herf='admin.php';</script>";
			}
			else
			{
				$d_sql="select Id from admin where Id='$Id'";
				$d_result=mysqli_query($db,$d_sql);
				$d_row=mysqli_fetch_array($d_result);
				if($d_row)
				{
				echo "<script>alert('该管理员不存在，无法删除');location.herf='admin.php';</script>";
				}
				else
				{
					$del_sql="delete from admin where Id='$Id'";
					$del_result=mysqli_fetch_array($del_sql) or die('删除失败！');
					if ($del_result)
					{
						echo "<script>alert('删除管理员".$Id."成功');location.herf='admin.php';</script>";
					}

				}
			}

		}

	



