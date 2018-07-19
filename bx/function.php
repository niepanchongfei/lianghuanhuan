<?php 
	function checkLogin(){
		session_start();
		if(!isset($_SESSION['isLogin'])||$_SESSION['isLogin']!=1){
			header("location:login.php");
		}
	}
	//连接数据库
	function connect(){
		$connect=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
		return $connect;
	}
	//查询 调用函数的地方就得了那个函数的返回值
	function query($connect,$sql){
		$result=mysqli_query($connect,$sql);
		return fetch($result);
	}
	//转化二维数组
	function fetch($result){
		$arr=[];
		while($row=mysqli_fetch_assoc($result)){
			$arr[]=$row;
		}
		return $arr;
	}
 ?>