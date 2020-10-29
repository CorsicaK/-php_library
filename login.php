<?php

$Id = $_POST["Id"];
$password = $_POST["password"];

$db = mysqli_connect('localhost','root','root','library'); 
$sql="select Id,username,password from user where Id='$Id' and password='$password'";
$result=mysqli_query($db,$sql);
$row=mysqli_num_rows($result);
if(!$row){
echo "<script>alert('用户名或密码错误，请重新输入');location='login.html'</script>";
}
else{
echo "<script>alert('登录成功');location='mainbody.html'</script>";
};

?>