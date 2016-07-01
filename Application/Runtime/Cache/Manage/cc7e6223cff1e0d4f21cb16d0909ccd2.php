<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>黄石市顺通汽车驾驶员培训学校</title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
    <script type="text/javascript" src="/jx/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/jx/Public/js/DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="/jx/Public/js/sysGeneral.js"></script>
    <script type="text/javascript" src="/jx/Public/js/systemUtils.js"></script>
</head>
<script type="text/javascript">

$(function(){
	//chooseDetailType();
	//FindReader_onclick();
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
    	$('#link_msg').text('读卡器已连接');
    }
 }


//清除读卡信息
function delPho(){
	
  		var fileName=$('#idcard').val()+'.bmp';
  		//alert(fileName);
  		//$.post("/jx/index.php/Home/File/fileDel",{'fileName':fileName});
  		
  		var data=PublicAjax("/jx/index.php/Home/File/fileDel",{'fileName':fileName});
  		
  		//alert(data);
  		
  		// $('#register_name').attr('value','');
  		// $('#sex').attr('value','');
  		// $('#address').attr('value','');
  		// $('#idcard').attr('value','');
  		// $('#imgurl').attr('value','');
  		// $('#img_pho').attr('src','');
  	
  	//var html='<object classid="clsid:4B3CB088-9A00-4D24-87AA-F65C58531039" id="SynCardOcx1" codeBase="SynCardOcx.CAB#version=1,0,0,1" ></object>';
  	//$('#p_obj').html(html);
  	    location.reload();
}


//读卡
 function readCard(){
  	//test();
  	//return;
  	
  	//var address='湖北省大冶市';
  	

	var nRet;
  	SynCardOcx1.SetReadType(0);
  	nRet = SynCardOcx1.ReadCardMsg();
  	      
  	if(nRet==0){
  		var idcard=SynCardOcx1.CardNo;
  		var address=SynCardOcx1.Address;
  		//alert(idcard);
  		$('#student_name').attr('value',SynCardOcx1.NameA);
  		$('#sex').attr('value',SynCardOcx1.Sex==1?"男":"女");
  		$('#address').attr('value',address);
  		$('#idcard').attr('value',idcard);
  		$('#img_pho').attr('src','/jx/Uploads/idcard/'+idcard+'.bmp');
  		$('#imgurl').attr('value','/jx/Uploads/idcard/'+idcard+'.bmp');
  		
  		var birthday=getBirthdatByIdNo(idcard);
  		$('#birthday').attr('value',birthday);
  		
  		
  		if(address.indexOf('大冶')>0 || address.indexOf('黄石')>0 || address.indexOf('阳新')>0){
  		   $('#bill_materials9').attr('checked',false);
  		   $('#native_place').find('option[value="本地"]').attr('selected',true);
  	    }else{
  		   $('#native_place').find('option[value="外地"]').attr('selected',true);
  	       $('#bill_materials9').attr('checked',true);
  	    } 
  		
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


//测试函数
function test(){
	var birthday=getBirthdatByIdNo("420281198601138413");
  	$('#birthday').attr('value',birthday);
}

//=======================================分隔线==============================================

//重置表单
function resetForm(){
	$('#form1')[0].reset();
}

//提交表单
function submitForm(){
	var checked = checkForm('#form1');
	if(checked==false){
		alert('请确认*号项不为空，且输入合法!');
		return;
	}
    
	var date='<?php echo date("Y-m-d");?>';
    //若报考细分类别为经营性道路货物运输驾驶员、经营性道路旅客运输驾驶员、道路危险货物运输驾驶人员，准驾车型必填，且初次领证日期需要大于1年， 	
    var apply_detail_type=$('#apply_detail_type').val();
    var drive_allow_car =$('#drive_allow_car').val();
    var first_drive_date=$('#first_drive_date').val();
    if(apply_detail_type =='经营性道路货物运输驾驶员' || apply_detail_type=='经营性道路旅客运输驾驶员' || apply_detail_type=='道路危险货物运输驾驶人员'){
    	var yyyy=parseInt(first_drive_date.substring(0,4))+1;
    	var newdate=yyyy+first_drive_date.substring(4,10);
    	//alert(newdate);
    	
    	if(drive_allow_car=='' || newdate>date){
    		alert("驾驶证准驾车型必填，且初次领证日期需大于1年!");
    		return;
    	}
    }
	
	//alert(date);
	
	$('#form1').submit();
}

//返回
function backIndex(){
	location.href="/jx/index.php/Manage/Index/index";
}

//条件查询
function doSearch(){
	$('#formQuery').submit();
}


function trim(s) { return s.replace(/^\s+|\s+$/g, ""); };

	//身份证号获取出生日期
	function getBirthdatByIdNo(iIdNo) {
		var tmpStr = "";
        iIdNo = trim(iIdNo);

		if (iIdNo.length == 15) {
			tmpStr = iIdNo.substring(6, 12);
			tmpStr = "19" + tmpStr;
			tmpStr = tmpStr.substring(0, 4) + "-" + tmpStr.substring(4, 6) + "-" + tmpStr.substring(6);
		} else {
			tmpStr = iIdNo.substring(6, 14);
			tmpStr = tmpStr.substring(0, 4) + "-" + tmpStr.substring(4, 6) + "-" + tmpStr.substring(6);
		}
			return tmpStr;
	}

</script>
<body>
    <!-- 顶部固定条 -->
    <div class="navbar">
    	<div class="navbar-inner">
                <ul class="nav">
                    <li>
                            <img src="/jx/Public/images/icon/user-white.png"/><?php echo ($_SESSION['snUser']['cnname']); ?>
                    </li>
                    <li><a href="/jx/index.php/Manage/User/updatePwdUI">修改密码</a></li>
                    <li><a href="/jx/index.php/Manage/Login/quit">注销</a></li>
                </ul>
        	<div class="brand"><?php echo C('MANAGE_TITLE');?></div>
        </div>
    </div>

    <div class="header">
        <div class="page-title">
        		<!-- 权限控制 -->
    <?php if(in_array(("学员信息管理"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/Index/index">学员信息管理</a>
	<?php endif; ?>
	
    <!-- <?php if(in_array(("基础数据维护"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/Dictionary/dictionary">基础数据维护</a>
	<?php endif; ?> -->
	
    <?php if(in_array(("用户管理"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/User/userMain">用户管理</a>
	<?php endif; ?>
	
    <?php if(in_array(("查询统计"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/Select/select">查询统计</a>
	<?php endif; ?>
	      <!-- 权限控制结束 -->
        </div>
    </div> 
    
  	<div class="content">
        <div class="container-fluid">
                     
        <div class="btn-toolbar">
            <a class="btn btn-default" href="/jx/index.php/Manage/Index/index">回到列表页</a>    	
           &nbsp; 提示：若点击无法连接读卡器，请切换360浏览器为兼容模式。
        </div>
       
<div class="well">

        <form action="<?php echo ($student==null?'/jx/index.php/Manage/Index/insert':'/jx/index.php/Manage/Index/update'); ?>"  id="form1" method="post">
        <div class="block-body">
        	<input type="hidden" name="id" value="<?php echo ($student["id"]); ?>" />
        <fieldset>
        <legend> 基本信息录入  &nbsp;&nbsp;&nbsp;&nbsp;
        	<font color="red"><span id="link_msg">读卡器未连接</span></font> &nbsp;&nbsp;&nbsp;&nbsp;
        	 <input type="button" value="连接读卡器" onclick="FindReader_onclick()" />&nbsp;&nbsp;
        	 <input type="button" value="读卡" onclick="readCard()" />&nbsp;&nbsp;
        	 <input type="button" value="清除读卡信息" onclick="delPho()" />

        </legend>        
           	<table class="table-add">
            	<tr>
                	<td class="tdleft" width="10%"><label for="student_name"><span class="text-red">*</span>姓名</label></td>
                    <td width="15%"><input type="text" id="student_name" name="student_name" value="<?php echo ($student["student_name"]); ?>" want="yes" ></td>
                    <td class="tdleft" width="10%"><label for="sex"><span class="text-red">*</span>性别</label></td>
                    <td width="25%"><input type="text" id="sex" name="sex" value="<?php echo ($student["sex"]); ?>" class="span1" want="yes" ></td>
                    <td class="tdleft" width="10%"><label for="education"><span class="text-red">*</span>学历</label></td>
                    <td width="15%">
                    	<select name="education" id="education" want="yes">
                    		<option value="" >-请选择-</option>
                    	<?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "学历"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($student["education"]) == $vo["name"]): ?>selected<?php endif; ?>  ><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                         </select>
                        
                    </td>
                    <td rowspan="4" style=" vertical-align:top">
                    	    照片：<br><input type="hidden" id="imgurl" name="imgurl" value="<?php echo ((isset($student["imgurl"]) && ($student["imgurl"] !== ""))?($student["imgurl"]):'/jx/Public/images/user.jpg'); ?>" />
 <img src="<?php echo ((isset($student["imgurl"]) && ($student["imgurl"] !== ""))?($student["imgurl"]):'/jx/Public/images/user.jpg'); ?>" id="img_pho" style="width: 129px;height: 172px" />

                    </td>
                 </tr>
                 <tr>
                    <td class="tdleft"><label for="birthday"><span class="text-red">*</span>生日</label></td>
                    <td ><input type="text" id="birthday" name="birthday" value="<?php echo ($student["birthday"]); ?>" class="Wdate"  onclick="WdatePicker()" want="yes"></td>
                    <td class="tdleft"><label for="work_unit">工作单位</label></td>
                    <td ><input type="text" id="work_unit" name="work_unit" value="<?php echo ($student["work_unit"]); ?>"></td>
                    <td class="tdleft"><label for="tel1"><span class="text-red">*</span>(手机)</label></td>
                    <td><input type="text" id="tel1" name="tel1" value="<?php echo ($student["tel1"]); ?>" want="yes" ></td>
                </tr>
                 <tr>
                    <td class="tdleft"><label for="address"><span class="text-red">*</span>住址</label></td>
                    <td colspan="3"><input type="text" id="address" name="address" value="<?php echo ($student["address"]); ?>"></td>
                    <td class="tdleft"><label for="tel2">(电话)</label></td>
                    <td><input type="text" id="tel2" name="tel2" value="<?php echo ($student["tel2"]); ?>" ></td>
                 </tr>
                 <tr>
                    <td class="tdleft"><label for="idcard"><span class="text-red">*</span>证件编号</label></td>
                    <td colspan="3"><input type="text" id="idcard" name="idcard" value="<?php echo ($student["idcard"]); ?>"></td>
                    <td class="tdleft"><label for="card_type"><span class="text-red">*</span>证件类型</label></td>
                    <td>
                    	<select name="card_type" id="card_type" want="yes">
                    		<!-- <option value="" >-请选择-</option> -->
                    	<?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "证件类型"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($student["card_type"]) == $vo["name"]): ?>selected<?php endif; ?>  ><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                         </select>
                    	
                    </td>
                </tr>
            </table>
        </fieldset>
        </div>
        <div class="block-body">
        <fieldset>
        <legend> 培训情况录入</legend>        
           	<table class="table-add">
            	<tr>
                	<td class="tdleft"><label for="train_unit"><span class="text-red">*</span>培训单位</label></td>
                    <td>
                    	<select name="train_unit" id="train_unit" want="yes">
                    		<option value="" >-请选择-</option>
                    	<?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "培训单位"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($student["train_unit"]) == $vo["name"]): ?>selected<?php endif; ?>  ><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                         </select>
                    	
                    </td>
                     <td class="tdleft"><label for="exam_address"><span class="text-red">*</span>考点</label></td>
                    <td>
                    	<select name="exam_address" id="exam_address" want="yes">
                    		<option value="" >-请选择-</option>
                    	<?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "考点"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($student["exam_address"]) == $vo["name"]): ?>selected<?php endif; ?>  ><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                         </select>
                    	
                    </td>
    
    <script type="text/javascript">
    	
    	function chooseDetailType(){
    		var apply_type=$('#apply_type').val();
    		
    		if(apply_type=='经营性道路客货运输驾驶员'){
    			       var html='<option value="" >-请选择-</option>'
    			                +'<?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): ?>'
                         	    +'<?php if(($vo["kind"]) == "报考细分类别"): ?>'  
                         	    +'<?php if(in_array(($vo["name"]), explode(',',"经营性道路货物运输驾驶员,经营性道路旅客运输驾驶员"))): ?>'        		
                         	    +'<option value="<?php echo ($vo["name"]); ?>" <?php if(($student["apply_detail_type"]) == $vo["name"]): ?>selected<?php endif; ?>  ><?php echo ($vo["name"]); ?></option>'
                         	    +'<?php endif; ?>'        		                         	    
                         	    +'<?php endif; ?>'
                                +'<?php endforeach; endif; ?>';
    		}else{
    			        var html='<option value="" >-请选择-</option>'
    			                +'<?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): ?>'
                         	    +'<?php if(($vo["kind"]) == "报考细分类别"): ?>'    
                         	    +'<?php if(in_array(($vo["name"]), explode(',',"道路危险货物运输驾驶人员,道路危险货物运输押运人员,道路危险货物运输装卸管理人员"))): ?>'        		
                         	    +'<option value="<?php echo ($vo["name"]); ?>" <?php if(($student["apply_detail_type"]) == $vo["name"]): ?>selected<?php endif; ?>  ><?php echo ($vo["name"]); ?></option>'
                         	    +'<?php endif; ?>' 
                         	    +'<?php endif; ?>'
                                +'<?php endforeach; endif; ?>';
    		}
    		
    		$('#apply_detail_type').html(html);
    	}
    	
    	
    </script>
                   
                 </tr>
                 <tr>
                	<td class="tdleft"><label for="apply_type"><span class="text-red">*</span>报考类别</label></td>
                    <td>
                    	<select name="apply_type" id="apply_type" want="yes"  onchange="chooseDetailType()">
                    		<option value="" >-请选择-</option>
                    	<?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "报考类别"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($student["apply_type"]) == $vo["name"]): ?>selected<?php endif; ?>  ><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                         </select>
                        <!-- <select id="apply_type" name="apply_type" want="yes">
                          <option value="A0101" <?php if(($student["apply_type"]) == "A0101"): ?>selected<?php endif; ?> >客一</option>
                          <option value="B0101" <?php if(($student["apply_type"]) == "B0101"): ?>selected<?php endif; ?> >货一</option>
                          <option value="C0101" <?php if(($student["apply_type"]) == "C0101"): ?>selected<?php endif; ?> >危拌</option>
                          <option value="D0101" <?php if(($student["apply_type"]) == "D0101"): ?>selected<?php endif; ?> >危驾</option>
                          <option value="E0101" <?php if(($student["apply_type"]) == "E0101"): ?>selected<?php endif; ?> >危装</option>
                        </select> -->
                    </td>
                    <td class="tdleft"><label for="apply_detail_type"><span class="text-red">*</span>报考细分类别</label></td>
                    <td>
                    	 <select name="apply_detail_type" id="apply_detail_type" want="yes" onchange="apply_detail_type_change(this)">
                    		<option value="" >-请选择-</option>
                    	 <?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "报考细分类别"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($student["apply_detail_type"]) == $vo["name"]): ?>selected<?php endif; ?>  ><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?> 
                         </select>
                    	
                    </td>
                 </tr>
                    <td class="tdleft"><label for="drive_allow_car"><span id="span1" class=""></span>驾驶证准驾车型</label></td>
                    <td>
                    	<select name="drive_allow_car" id="drive_allow_car" >
                    		<option value="" >-请选择-</option>
                    	<?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "驾驶证准驾车型"): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($student["drive_allow_car"]) == $vo["name"]): ?>selected<?php endif; ?>  ><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                         </select>
                    </td>
                    <td class="tdleft"><label for="first_drive_date"><span id="span2" class=""></span>初次驾驶证日期</label></td>
                    <td><input type="text" id="first_drive_date" name="first_drive_date" value="<?php echo ($student["first_drive_date"]); ?>" class="Wdate"  onclick="WdatePicker()" ></td>
                 <tr>
                	<td class="tdleft"><label for="obtain_code">原从业资格证号</label></td>
                    <td><input type="text" id="obtain_code" name="obtain_code" value="<?php echo ($student["obtain_code"]); ?>"></td>
                	<td class="tdleft"><label>申请类别</label></td>
                    <td>
                        <span class="col-xs-4"><label> <input type="radio" id="apply_category1" name="apply_category" value="初领" <?php if(((isset($student["apply_category"]) && ($student["apply_category"] !== ""))?($student["apply_category"]):'初领') == "初领"): ?>checked<?php endif; ?> /> 初领</label></span>
                        <span class="col-xs-4"><label> <input type="radio" id="apply_category2" name="apply_category" value="增驾" <?php if(((isset($student["apply_category"]) && ($student["apply_category"] !== ""))?($student["apply_category"]):'初领') == "增驾"): ?>checked<?php endif; ?> /> 增驾</label></span>
                    </td>
                </tr>
                <tr>
                	<td class="tdleft"><span class="text-red">*</span>居住地</td>
                	<td colspan="3"><select name="native_place" id="native_place" onchange="native_place_chanage(this)" want="yes">               		
                		<option value="" >-请选择-</option>
                		<option value="本地" <?php if(($student["native_place"]) == "本地"): ?>selected<?php endif; ?> >本地</option>
                		<option value="外地" <?php if(($student["native_place"]) == "外地"): ?>selected<?php endif; ?> >外地</option>
                	</select>
                	</td>
                </tr>
                 <tr>
                	<td class="tdleft"><label>材料清单</label></td>
                    <td colspan="3" style="padding:20px;">
                        <span class="col-xs-4"><label for="bill_materials1"> <input type="checkbox" id="bill_materials1" name="bill_materials[]" value="身份证号原件"  <?php if(in_array("身份证号原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> 身份证号原件</label></span>
                        <span class="col-xs-4"><label for="bill_materials2"> <input type="checkbox" id="bill_materials2" name="bill_materials[]" value="身份证明复印件" <?php if(in_array("身份证明复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> 身份证明复印件</label></span>
                        <span class="col-xs-4"><label for="bill_materials3"> <input type="checkbox" id="bill_materials3" name="bill_materials[]" value="驾驶证原件" <?php if(in_array("驾驶证原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> 驾驶证原件</label></span>
                        <span class="col-xs-4"><label for="bill_materials4"> <input type="checkbox" id="bill_materials4" name="bill_materials[]" value="原从业资格证原件" <?php if(in_array("原从业资格证原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> 原从业资格证原件</label></span>
                        <span class="col-xs-4"><label for="bill_materials5"> <input type="checkbox" id="bill_materials5" name="bill_materials[]" value="原从业资格证复印件" <?php if(in_array("原从业资格证复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> 原从业资格证复印件</label></span>
                        <span class="col-xs-4"><label for="bill_materials6"> <input type="checkbox" id="bill_materials6" name="bill_materials[]" value="学历证明" <?php if(in_array("学历证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> 学历证明</label></span>
                        <span class="col-xs-4"><label for="bill_materials7"> <input type="checkbox" id="bill_materials7" name="bill_materials[]" value="驾驶证复印件" <?php if(in_array("驾驶证复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> 驾驶证复印件</label></span>
                        <span class="col-xs-4"><label for="bill_materials8"> <input type="checkbox" id="bill_materials8" name="bill_materials[]" value="无重大以上责任事故记录证明" <?php if(in_array("无重大以上责任事故记录证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> 无重大以上责任事故记录证明</label></span>
                        <span class="col-xs-4"><label for="bill_materials9"> <input type="checkbox" id="bill_materials9" name="bill_materials[]" value="居住地证明" <?php if(in_array("居住地证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> 居住地证明</label></span>
                    </td>
                </tr>
            </table>
        </fieldset>
        </div>
        </form>
        
        <p style="text-align:center;">
            <button class="btn btn-primary" onclick="resetForm()"><img src="/jx/Public/images/icon/refresh.png"/> 重置</button> 　
            <button class="btn btn-primary" onclick="submitForm()"><img src="/jx/Public/images/icon/folder__simple.png"/> 保存</button>　
            <button class="btn btn-primary" onclick="backIndex()"><img src="/jx/Public/images/icon/double.png"/> 返回</button>
        </p>
</div>   
              
              <script type="text/javascript">
              	function apply_detail_type_change(obj){
              		
              		    $('#bill_materials1').attr('checked',false);
              			$('#bill_materials2').attr('checked',false);
              			$('#bill_materials3').attr('checked',false);
              			$('#bill_materials4').attr('checked',false);
              			$('#bill_materials5').attr('checked',false);
              			$('#bill_materials6').attr('checked',false);
              			$('#bill_materials7').attr('checked',false);
              			$('#bill_materials8').attr('checked',false);
              		
              		var value=$(obj).val();
              		if(value=="经营性道路货物运输驾驶员"){
              			$('#bill_materials2').attr('checked',true);
              			$('#bill_materials7').attr('checked',true);       
              			$('#span1').attr('class','text-red');
              			$('#span2').attr('class','text-red');
              			$('#span1').text('*');
              			$('#span2').text('*');            		
              			    			
              		}else if(value=="经营性道路旅客运输驾驶员"){
              			$('#bill_materials2').attr('checked',true);
              			$('#bill_materials7').attr('checked',true);
              			$('#bill_materials8').attr('checked',true);
              			$('#span1').attr('class','text-red');
              			$('#span2').attr('class','text-red');
              			$('#span1').text('*');
              			$('#span2').text('*');  
              			
              		}else if(value=="道路危险货物运输驾驶人员"){
              			$('#bill_materials2').attr('checked',true);
              			$('#bill_materials5').attr('checked',true);
              			$('#bill_materials7').attr('checked',true);
              			$('#bill_materials8').attr('checked',true);
              			$('#span1').attr('class','text-red');
              			$('#span2').attr('class','text-red');
              			$('#span1').text('*');
              			$('#span2').text('*');  
              			
              		}else if(value=="道路危险货物运输押运人员" || value=="道路危险货物运输装卸管理人员"){
              			$('#bill_materials2').attr('checked',true);
              			$('#bill_materials6').attr('checked',true);      
              			$('#span1').attr('class','');
              			$('#span2').attr('class','');      		
              			$('#span1').text('');
              			$('#span2').text('');  
              				
              		}else{
              			//$("input[name='bill_materials[]']").each(function(){
                        //    $(this).attr("checked",false);
                        //});
                        $('#bill_materials1').attr('checked',false);
              			$('#bill_materials2').attr('checked',false);
              			$('#bill_materials3').attr('checked',false);
              			$('#bill_materials4').attr('checked',false);
              			$('#bill_materials5').attr('checked',false);
              			$('#bill_materials6').attr('checked',false);
              			$('#bill_materials7').attr('checked',false);
              			$('#bill_materials8').attr('checked',false);
              			$('#span1').attr('class','');
              			$('#span2').attr('class','');
              			$('#span1').text('');
              			$('#span2').text('');  
              		}
              		
              	}
              	function native_place_chanage(obj){
              		var value=$(obj).val();
              		if(value=="外地"){
              			$('#bill_materials9').attr('checked',true);
              		}else{
              			$('#bill_materials9').attr('checked',false);
              		}
              		
              	}
              </script>
 
    </div>
    </div>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
<p id="p_obj">
<object classid="clsid:4B3CB088-9A00-4D24-87AA-F65C58531039" id="SynCardOcx1" codeBase="SynCardOcx.CAB#version=1,0,0,1" >
</object>
</p>	
</body>
</html>