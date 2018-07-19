<?php 
	require_once '../config.php';
	require_once '../function.php';
	// $在jq中有声明变量的作用
	$categoryId=$_POST['categoryId'];
	$currentPage=$_POST['currentPage'];
	$pageSize=$_POST['pageSize'];
	$offset=($currentPage-1)*$pageSize;
	$connect=connect();
	$sql="select p.id,p.title,p.feature,p.content,p.created,
        p.views,p.likes,u.nickname,c.name,
    (select count(id) from comments where post_id=p.id ) as commentsCount
    from posts p
    left join categories c on c.id=p.category_id
    left join users u on u.id=p.user_id
    where p.category_id={$categoryId}
    limit {$offset},{$pageSize}";
    $postArr=query($connect,$sql);
    $sqlCount="select count(id) as pageCount 
	from posts where category_id={$categoryId}";
	$countArr=query($connect,$sqlCount);
	//在响应报文中看
	$pageCount=$countArr[0]['pageCount'];//总条数
	$response=["code"=>0,"msg"=>"操作失败"];
	if($postArr){
		$response["code"]=1;
		$response["msg"]="操作成功";
        $response["data"]=$postArr;//把数组 赋值给 data
        $response["pageCount"]=$pageCount;//总条数
	}
header("content-type:application/json;charset=utf8");
echo json_encode($response);

 ?>