<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link href="/jx/Public/css/default.css" rel="stylesheet" type="text/css" />
<link href="/jx/Public/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jx/Public/js/goaler.js"></script>
<script type="text/javascript" src="/jx/Public/js/DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="/jx/Public/js/jquery.js"></script>

<script type="text/javascript">


</script>
</head>
<body style="overflow: auto;">
<div id="div_right">
	<div class="right_top">
					<span>学员信息</span>
				</div>
				<div class="title">			
					<a href="javascript:history.back();" class="btn btn-default"  >返回</a>
				</div>
				
		<div class="develop">
		   
		   <input type="hidden" name="id" value="<?php echo ($register["id"]); ?>" />
		   <table width="100%" border="0" class="mRead" >
		   <tr>
		   	<td width="14%" align="center">姓名</td>
		   	<td width="14%">
		   		<?php echo ($register["register_name"]); ?>	   	
		   	</td>
		   	<td width="14%" align="center">性别</td>
		   	<td width="14%">
		   		<?php echo ($register["sex"]); ?>
		   	</td>
		   	<td width="14%" align="center">学历</td>
		   	<td width="14%">
		   		<?php echo ($register["education"]); ?>		   			
		   	</td>
		   	<td rowspan="4" >
                                                照片：<br>
		   		<img src="<?php echo ($register["imgurl"]); ?>" id="img_pho" style="width: 102px;height: 126px" />
		   	</td>
		   </tr>
		   
		   <tr>
		   	<td align="center">住址</td>
		   	<td colspan="3"><?php echo ($register["address"]); ?></td>
		   	<td align="center">电话1</td>
		   	<td><?php echo ($register["tel1"]); ?></td>
		   </tr>
		   <tr>
		   	<td align="center">工作单位</td>
		   	<td colspan="3"><?php echo ($register["work_unit"]); ?></td>
		   	<td align="center">电话2</td>
		   	<td><?php echo ($register["tel2"]); ?></td>
		   </tr>
		   
		   <tr>
		   	<td align="center">身份证号</td>
		   	<td colspan="2"><?php echo ($register["idcard"]); ?></td>
		   	<td align="center">培训单位</td>
		   	<td colspan="2"><?php echo ($register["train_unit"]); ?></td>
		   </tr>
		   
		   <tr>
		   	<td align="center">驾驶证准驾车型</td>
		   	<td colspan="2"><?php echo ($register["driver_allow_car"]); ?></td>
		   	<td align="center">初领驾驶证日期</td>
		   	<td colspan="3"><?php echo ($register["driver_license_date"]); ?></td>
		   </tr>
		   
		   <tr>
		   	<td align="center">申请种类</td>
		   	<td colspan="6"><?php echo ($register["register_type"]); ?></td>
		   </tr>
		   <tr>
		   	<td align="center">原从业资格证号</td>
		   	<td colspan="6"><?php echo ($register["obtain_code"]); ?></td>
		   </tr>
		   <tr>
		   	<td align="center">申请类别</td>
		   	<td colspan="6"><?php echo ($register["register_group"]); ?></td>
		   </tr>
		   
		   </table>
	
		</div>
		
</div>
</body>
</html>