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

$(document).ready(function(){
	
	FindReader_onclick();
});

//==============================读卡器相关========================================

function FindReader_onclick(){
   
  	var str;
  	str = SynCardOcx1.FindReader();                  //连接读卡器
  	var nRetPho=SynCardOcx1.SetPhotoName(2);         //设置读卡器保存照片名称为：身份证号.bmp
  	
  	var path="<?php echo C('IDCARD_PATH');?>"; 
  	//path="E:\\\WWW\\jx\\Uploads\idcard";   
  	var nRetPath= SynCardOcx1.SetPhotoPath(2,path);  //设置照片存放路径
    if(str<0 ){
    	alert('读卡器连接失败!');
    }else if(nRetPath!=0){
    	alert('路径设置失败');
    }else if(nRetPho !=0){
    	alert('照片保存名设置失败');
    }else{
    	$('#link_msg').text('身份证读卡器已连接');
    }
 }


//清除读卡信息
function delPho(){
	var nRet;
  	SynCardOcx1.SetReadType(0);
  	nRet = SynCardOcx1.ReadCardMsg();
  	      
  	if(nRet==0){
  		var fileName=SynCardOcx1.CardNo+'.bmp';
  		$.post('/jx/index.php/Home/File/fileDel',{'fileName':fileName});
  		
  		$('#register_name').attr('value','');
  		$('#sex').attr('value','');
  		$('#address').attr('value','');
  		$('#idcard').attr('value','');
  		$('#imgurl').attr('value','');
  		$('#img_pho').attr('src','');
  	}
}


//读卡
 function readCard(){
  	
	var nRet;
  	SynCardOcx1.SetReadType(0);
  	nRet = SynCardOcx1.ReadCardMsg();
  	      
  	if(nRet==0){
  		
  		$('#register_name').attr('value',SynCardOcx1.NameA);
  		$('#sex').attr('value',SynCardOcx1.Sex==1?"男":"女");
  		$('#address').attr('value',SynCardOcx1.Address);
  		$('#idcard').attr('value',SynCardOcx1.CardNo);
  		$('#imgurl').attr('value','/jx/Uploads/idcard/'+SynCardOcx1.CardNo+'.bmp');
  		$('#img_pho').attr('src','/jx/Uploads/idcard/'+SynCardOcx1.CardNo+'.bmp');
  		
  		//document.all['S1'].value=document.all['S1'].value+"读卡成功\r\n";	
  		//document.all['S1'].value=document.all['S1'].value+"姓名:"+SynCardOcx1.NameA +"\r\n";
  		//document.all['S1'].value=document.all['S1'].value+"性别:"+SynCardOcx1.Sex +"\r\n";
  		//document.all['S1'].value=document.all['S1'].value+"民族:"+SynCardOcx1.Nation +"\r\n";
  		//document.all['S1'].value=document.all['S1'].value+"出生日期:"+SynCardOcx1.Born +"\r\n";
  		//document.all['S1'].value=document.all['S1'].value+"地址:"+SynCardOcx1.Address +"\r\n";
  		////document.all['S1'].value=document.all['S1'].value+"身份证号:"+SynCardOcx1.CardNo +"\r\n";
  		//document.all['S1'].value=document.all['S1'].value+"有效期开始:"+SynCardOcx1.UserLifeB +"\r\n";
  		//document.all['S1'].value=document.all['S1'].value+"有效期结束:"+SynCardOcx1.UserLifeE +"\r\n";
  		//document.all['S1'].value=document.all['S1'].value+"发证机关:"+SynCardOcx1.Police +"\r\n";
  		//document.all['S1'].value=document.all['S1'].value+"照片文件名:"+SynCardOcx1.PhotoName +"\r\n";		
  		
  	}
  }


//============================================================================

function sub(){
	$('#form1').submit();
}

</script>
</head>
<body style="overflow: auto;">
<div id="div_right">
	<div class="right_top">
					<span>学员登记</span>
				</div>
				<div class="title">
					<a href="javascript:sub()"  class="btn btn-green">保存</a> 
					<a href="javascript:history.back();" class="btn btn-default"  >返回</a>
					<font color="red"><span id="link_msg"></span></font>
					<div style="float: right">				
					<a href="javascript:delPho();" class="btn btn-red"  >清除读卡信息</a>
					</div>
				</div>
				
<p style="display: none">
<object classid="clsid:4B3CB088-9A00-4D24-87AA-F65C58531039" id="SynCardOcx1" codeBase="SynCardOcx.CAB#version=1,0,0,1" >
</object>
</p>
		<div class="develop">
		<form action="<?php echo ($register==null?'/jx/index.php/Admin/Register/insert':'/jx/index.php/Admin/Register/update'); ?>"  id="form1" method="post">
		   
		   <input type="hidden" name="id" value="<?php echo ($register["id"]); ?>" />
		   <table width="100%" border="0" class="mtable" >
		   <tr>
		   	<td width="14%" align="center">姓名</td>
		   	<td width="14%">
		   		<input type="text" id="register_name" name="register_name" value="<?php echo ($register["register_name"]); ?>" readonly="readonly" />
		   		<input type="button" value="读卡" onclick="readCard()" />
		   	</td>
		   	<td width="14%" align="center">性别</td>
		   	<td width="14%">
		   		<input type="text" id="sex" name="sex" value="<?php echo ($register["sex"]); ?>" readonly="readonly" />
		   	</td>
		   	<td width="14%" align="center">学历</td>
		   	<td width="14%">
		   		<select name="education">
		   			<option value=""  <?php if(($register["education"]) == ""): ?>selected<?php endif; ?>  >-请选择-</option>
		   			<option value="大专" <?php if(($register["education"]) == "大专"): ?>selected<?php endif; ?>  >大专</option>
		   			<option value="本科" <?php if(($register["education"]) == "本科"): ?>selected<?php endif; ?>  >本科</option>
		   		</select>
		   	</td>
		   	<td rowspan="4" >
                                                照片：<br><input type="hidden" id="imgurl" name="imgurl" value="<?php echo ($register["imgurl"]); ?>" />
		   		<img src="<?php echo ($register["imgurl"]); ?>" id="img_pho" style="width: 102px;height: 126px" />
		   	</td>
		   </tr>
		   
		   <tr>
		   	<td align="center">住址</td>
		   	<td colspan="3"><input type="text"  id="address"  name="address" value="<?php echo ($register["address"]); ?>" readonly="readonly" /></td>
		   	<td align="center">电话1</td>
		   	<td><input type="text" name="tel1" value="<?php echo ($register["tel1"]); ?>" /></td>
		   </tr>
		   <tr>
		   	<td align="center">工作单位</td>
		   	<td colspan="3"><input type="text"  name="work_unit" value="<?php echo ($register["work_unit"]); ?>" /></td>
		   	<td align="center">电话2</td>
		   	<td><input type="text" name="tel2" value="<?php echo ($register["tel2"]); ?>" /></td>
		   </tr>
		   
		   <tr>
		   	<td align="center">身份证号</td>
		   	<td colspan="2"><input type="text" id="idcard" name="idcard" value="<?php echo ($register["idcard"]); ?>" readonly="readonly" /></td>
		   	<td align="center">培训单位</td>
		   	<td colspan="2"><input type="text" name="train_unit" value="<?php echo ($register["train_unit"]); ?>" /></td>
		   </tr>
		   
		   <tr>
		   	<td align="center">驾驶证准驾车型</td>
		   	<td colspan="2"><input type="text" name="driver_allow_car" value="<?php echo ($register["driver_allow_car"]); ?>" /></td>
		   	<td align="center">初领驾驶证日期</td>
		   	<td colspan="3"><input type="text" name="driver_license_date" value="<?php echo ((isset($register["driver_license_date"]) && ($register["driver_license_date"] !== ""))?($register["driver_license_date"]):date('Y-m-d')); ?>" class="Wdate"  onclick="WdatePicker()" /></td>
		   </tr>
		   
		   <tr>
		   	<td align="center">申请种类</td>
		   	<td colspan="6"><input type="text" size="80" name="register_type" value="<?php echo ($register["register_type"]); ?>" /></td>
		   </tr>
		   <tr>
		   	<td align="center">原从业资格证号</td>
		   	<td colspan="6"><input type="text" size="80" name="obtain_code" value="<?php echo ($register["obtain_code"]); ?>" /></td>
		   </tr>
		   <tr>
		   	<td align="center">申请类别</td>
		   	<td colspan="6"><input type="text" size="80" name="register_group" value="<?php echo ($register["register_group"]); ?>" /></td>
		   </tr>
		   
		   </table>
		</form>
		</div>
		
</div>
</body>
</html>