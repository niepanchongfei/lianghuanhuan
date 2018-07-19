<?php 
	require_once '../../config.php';
	require_once '../../function.php';
	//获取数据库里面的登陆的这个人，用户名和头像，返回给前端
	//谁登陆的就获取谁的信息
	//在登陆的时候session里面记住id这里可以拿来用 来自_userLogin.php中
	$email=$_POST['email'];
	$password=$_POST['password'];
	$connect=connect();
	$sql="select * from users where email='{$email}' and  password='{$password}'and  status='activated'";
	$queryResult=query($connect,$sql);
	//关联数组
	$response=["code=>0","msg"=>"操作失败"];//此时为json数据格式
	if($queryResult){
		session_start();
		$_SESSION['isLogin']=1;
		$_SESSION['user_id']=$queryResult[0]['id'];
		$response["code"]=1;
		$response["msg"]="登陆成功";
	}
	header("content-type:application/json;charset=utf8");
	echo json_encode("response");
 ?>