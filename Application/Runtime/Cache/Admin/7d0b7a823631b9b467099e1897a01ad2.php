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

//重置密码
function doResetPWD(){
	var ids = getId('delete'); 
	if(ids==false){
		return;
	}
	//alert(ids);
	if(confirm("重置后密码为1，确定吗？")){
	   location.href='/jx/index.php/Admin/Register/resetPWD?ids='+ids;
	}
}


//条件查询
function doSearch(){
	$('#formQuery').submit();
}


</script>
<body>
<div id="div_right">
	<div class="right_top">
					<span>学员管理</span>
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
				<!-- 
				style="height:400px;overflow:auto;"
				 -->
		<div class="develop"  >
					<table width="100%" border="0" class="mtable">
						<tr>
							<th class="thcheckbox" width="3%" ><input type="checkbox"
								name="checkbox" id="checkbox" onclick="checkAll(this);" ></th>
							<th width="10%" >姓名</th>
							<th width="5%" >性别</th>
							<th width="5%" >学历</th>
							<th width="15%" >身份证号</th>
							<th width="20%" >培训单位</th>
							<th width="10%" >申请种类</th>
							<th width="10%" >操作</th>
						</tr>
					<tbody id="goaler">
						
						<?php if(empty($registerList)): ?><tr>
								<td colspan="10" align="center"><font color="red">暂无数据</font></td>
							</tr><?php endif; ?>
						
						<?php if(is_array($registerList)): foreach($registerList as $key=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>">
						         <td class="thcheckbox"><input type="checkbox" name="chk" id="chk" onclick="selTr(this);" ></td>
						         <td><?php echo ($vo["register_name"]); ?></td>
						         <td><?php echo ($vo["sex"]); ?></td>
						         <td><?php echo ($vo["education"]); ?></td>
						         <td><?php echo ($vo["idcard"]); ?></td>						 					         
						         <td><?php echo ($vo["train_unit"]); ?></td>						 					         
						         <td><?php echo ($vo["register_type"]); ?></td>						 					         
						         <td>
						         	<a href="/jx/index.php/Admin/Register/registerUI?id=<?php echo ($vo["id"]); ?>">编辑</a>&nbsp;
						         	<a href="/jx/index.php/Admin/Register/seeUI?id=<?php echo ($vo["id"]); ?>">查看</a>&nbsp;
						         	
						         </td>						 					         
						      </tr><?php endforeach; endif; ?>
						
					</tbody>
					</table>
		</div>
				<?php echo ($page); ?>
</div>
</body>
</html>