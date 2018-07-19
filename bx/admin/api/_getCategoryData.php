<?php 
	require_once '../../config.php';
	require_once '../../function.php';
	$connect=connect();
	$sql="selsect * from categories";
	$queryResult=query($connect,$sql);
	$response=["code"=>0,"msg"=>"操作失败"];
	if($queryResult){
		$response["code"]=1;
		$response["msg"]="操作成功";
		$response["data"]=$queryResult;
	}
	header("content-type:application/json;charset=utf8");
	//json_encode()返回的是json格式的数据3
	echo json_encode($response);
 ?>