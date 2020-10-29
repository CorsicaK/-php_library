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
		$sql="select * from user where Id='$Id'";
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result);
		if(($Id==NULL)&&(!$row))
			echo "<script>alter('不存在该用户!')</script>";


	?>

		<form name="frm2" method="post" style="margin:0" enctype="multipart/form-data">
		<tr><tr><table bgcolor="#CCCCCC" width="430" border="1" align="center" cellpadding="0" cellspacing="0">
		<tr><td bgcolor="#CCCCCC" width="90"><span class="h3">账号：</span></td> 
			<td><input name="Id" type="text" size="35" class="h3" value="<?php echo $row['Id'];?>">
			<input name="h_Id" type="hidden" value="<?php echo $row['Id'];?>"></td></tr>
			<tr><td bgcolor="#CCCCCC"><span class="h3">审核状态：</span></td> 
			<td><input name="istat" type="text" size="35" class="h3" value="<?php echo $row['istat'];?>"></td></tr>
			<tr><td align="center" colspan="2" bgcolor="#CCCCCC">
			<input name="b" type="submit" value="审核" class="h3">&nbsp;&nbsp;
			<input name="b" type="submit" value="删除" class="h3"></td></tr>
			</table>
		</form>
			</body>
		</html>

		<?php
			$db = mysqli_connect('localhost','root','root');
			if(! $db )
			{
			die('Could not connect: ' . mysqli_error());
			}
			mysqli_query($db, "set names utf8");

			$sql = 'SELECT Id, username,mobile,istat FROM user';
			mysqli_select_db($db,'library');
			$result = mysqli_query( $db, $sql );
			if(! $result )
			{
			die('无法读取数据: ' . mysqli_error($db));
			}
			echo '<table border="2" bgcolor="#CCCCCC" width="430" border="1" align="center" cellpadding="0" cellspacing="0"><td>以下为全部用户信息</td>';
			echo '<table border="1"bgcolor="#CCCCCC" width="430" border="1" align="center" cellpadding="0" cellspacing="0"><tr><td>账号</td><td>姓名</td><td>联系方式</td><td>审核状态</td></tr>';
			while($row = mysqli_fetch_array($result))
			{
			echo "<tr><td> {$row['Id']}</td> "."<td>{$row['username']} </td> "."<td>{$row['mobile']} </td> "."<td>{$row['istat']} </td> "."</tr>";
			}
			echo '</table>';
			?>

			<?php

		$Id=@$_POST['Id'];
		$istat=@$_POST['istat'];
		function test($Id,$istat)
		{
			if ($Id==NULL) {
				echo "<script>alert('账号不能为空！');location.href='user_sh.php';</script>";
				exit;
			}
			if ($istat==NULL) {
				echo "<script>alert('审核状态不能为空！');location.href='user_sh.php';</script>";
				exit;
			}
		}

		if(@$_POST["b"]=='审核')
		{
			test($Id,$istat);
			if($Id!=$Id)
				echo "<script>alert('账号与原数据有异，不能审核！');location.href='user_sh.php';</script>";
			else
			{
				$update_sql="update user set Id='$Id',istat='$istat' where Id='$Id'";
			}
			$update_result=mysqli_query($db,$update_sql);
			if(mysqli_affected_rows($db)!=0)
				echo "<script>alert('审核成功!');location.herf='user_sh.php';</script>";
			else
				echo "<script>alert('审核失败，请检查输入信息!');location.herf='user_sh.php';</script>";
		}

		if(@$_POST["b"]=='删除')
		{
			if($Id==NULL)
			{
				echo "<script>alert('请输入要删除的账号!');location.herf='user_sh.php';</script>";
			}
			else
			{
				$d_sql="select Id from user where Id='$Id'";
				$d_result=mysqli_query($db,$d_sql);
				$d_row=mysqli_fetch_array($d_result);
				if(!$d_row)
				{
				echo "<script>alert('该用户不存在，无法删除');location.herf='user_sh.php';</script>";
				}
				else
				{
					$del_sql="delete from user where Id='$Id'";
					$del_result=mysqli_query($db,$del_sql);
					$del_row=mysqli_fetch_array($del_result) or die ("删除失败");
					if ($del_row)
					{
						echo "<script>alert('删除用户".$Id."成功');location.herf='user_sh.php';</script>";
					}

				}
			}

		}