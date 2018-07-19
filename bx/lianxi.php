<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
<script>
	$(function(){
		var currentPage=1;
		var pageSize=10;
		getCommentsData();页面一开始调用一次
	function getCommentsData(){
	    $.ajax{
		type:"post",
		url:"api/_getCommentsData.php",
		data:{currentPage:currentPage,pageSize:pageSize},
		success:function(res){
			if(res.code==1){//一定成功了
				//获取后台返回的最大页码数
			pageCount=res.data;
			var str="";
			$.each(data,function(i,e){

			});
			$("tbody").html(str);
		
			}
		}

	}

		}
		//分页按钮
	$('.pagination').twbsPagination({
		totalPages:35,//总共多少页
		visiblePages:5,
		first:"首页",
		onPageClick:function(event,page){
			currentPage:page;
			getCommentsData();
		}
	})

	})
</script>
</html>