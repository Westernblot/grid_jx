<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>...</title>
<link href="/jx/Public/css/default.css" rel="stylesheet" type="text/css" />
<link href="/jx/Public/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jx/Public/js/goaler.js"></script>
<script type="text/javascript" src="/jx/Public/js/jquery.js"></script>
<script type="text/javascript" src="/jx/Public/js/sysGeneral.js"></script>
<script type="text/javascript" src="/jx/Public/js/systemUtils.js"></script>
</head>

<script type="text/javascript">
$(function(){
	
});

//删除
function doDelete(){
	var ids = getId('delete'); 
	if(ids==false){
		return;
	}
	//alert(ids);
	if(confirm("确定删除吗？")){
	location.href='/jx/index.php/Admin/Register/delete?ids='+ids;
	}
}

</script>
<body>
<div id="div_right">
	<div class="right_top">
					<span>基础数据</span>
				</div>
				<div class="title">
					<a href="/jx/index.php/Admin/Register/registerUI"  class="btn btn-green">新增</a> 			
					<a href="javascript:doDelete()" class="btn btn-red">删除</a> 
					<div style="float: right">
						<form action="/jx/index.php/Admin/Register/registerMain" id="formQuery" method="get">							
						姓名：<input type="text" name="register_name" value="<?php echo ($register_name); ?>" />
						<a href="javascript:doSearch()" class="btn btn-bule">查询</a> 
						</form>
					</div>
				</div>