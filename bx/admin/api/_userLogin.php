<?php 
require_once '../../config.php';
require_once '../../function.php';
//完成用户登陆
	 //  后端：
  // 得到用户的邮箱和密码
  // 根据邮箱和密码到数据库中查找有没有对应的数据
  // 最终通知前台是否登陆成功
//1.获取邮箱 密码
$email=$_POST["email"];
$password=$_POST["password"];
//2.根据邮箱和密码查找对应数据
$connect=connect();
$sql="SELECT * FROM users where email='{$email}' and password='{$password}' and `status`= 'activated'";
$queryResult=query($connect,$sql);
$reponse=["code"=>"0","msg"=>"操作失败"];
if($queryResult){
	//如果if条件满足，
	//先开启session 在在session中存储数据
	session_start();
	$_SESSION['isLogin']=1;
	$response["code"]=1;
	$response["msg"]="登陆成功";
}
header("content-type:application/json;charset=utf-8");
echo json_encode($response);
 ?>