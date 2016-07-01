<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
    <script type="text/javascript" src="/jx/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/jx/Public/js/sysGeneral.js"></script>
    <script type="text/javascript" src="/jx/Public/js/systemUtils.js"></script>
</head>
<script type="text/javascript">
$(function(){
	
});


//重置表单
function resetForm(){
	$('#form1')[0].reset();
}

//提交表单
function submitForm(){
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
        </div>
        
<div class="well">
        <div class="block-body">
        
        <fieldset>
        <legend> 基本信息录入</legend>        
           	<table class="table-add">
            	<tr>
                	<td class="tdleft"><label for="student_name">姓名</label></td>
                    <td><?php echo ($student["student_name"]); ?></td>
                    <td class="tdleft"><label for="sex">性别</label></td>
                    <td><?php echo ($student["sex"]); ?></td>
                    <td class="tdleft"><label for="education">学历</label></td>
                    <td>
                       <?php echo ($student["education"]); ?>
                    </td>
                    <td rowspan="4" style=" vertical-align:top">
                       照片：<br>
          <img src="<?php echo ((isset($student["imgurl"]) && ($student["imgurl"] !== ""))?($student["imgurl"]):'/jx/Public/images/user.jpg'); ?>" id="img_pho" style="width: 129px;height: 172px" />          
                    </td>
                 </tr>
                 <tr>
                    <td class="tdleft"><label for="work_unit">生日</label></td>
                    <td ><?php echo ($student["birthday"]); ?></td>
                    <td class="tdleft"><label for="work_unit">工作单位</label></td>
                    <td ><?php echo ($student["work_unit"]); ?></td>
                    <td class="tdleft"><label for="tel1">(手机)</label></td>
                    <td><?php echo ($student["tel1"]); ?></td>
                </tr>
                 <tr>
                    <td class="tdleft"><label for="address">住址</label></td>
                    <td colspan="3"><?php echo ($student["address"]); ?></td>
                    <td class="tdleft"><label for="tel2">(电话)</label></td>
                    <td><?php echo ($student["tel2"]); ?></td>
                 </tr>
                 <tr>
                    <td class="tdleft"><label for="idcard">身份证号</label></td>
                    <td colspan="3"><?php echo ($student["idcard"]); ?></td>
                    <td class="tdleft"><label for="tel2">证件类型</label></td>
                    <td><?php echo ($student["card_type"]); ?></td>
                </tr>
            </table>
        </fieldset>
        </div>
        <div class="block-body">
        <fieldset>
        <legend> 培训情况录入</legend>        
           	<table class="table-add">
            	<tr>
                	<td class="tdleft"><label for="train_unit">培训单位</label></td>
                    <td><?php echo ($student["train_unit"]); ?></td>
                	<td class="tdleft"><label for="train_unit">考点</label></td>
                    <td><?php echo ($student["exam_address"]); ?></td>
                   
                 </tr>
                 <tr>
                	<td class="tdleft"><label for="apply_type">报考类别</label></td>
                    <td>
                       <?php echo ($student["apply_type"]); ?>
                    </td>
                	<td class="tdleft"><label for="apply_type">报考细分类别</label></td>
                    <td>
                       <?php echo ($student["apply_detail_type"]); ?>
                    </td>
                    </tr>
                    <tr>
                     <td class="tdleft"><label for="drive_allow_car">驾驶证准驾车型</label></td>
                    <td>
                       <?php echo ($student["drive_allow_car"]); ?></td>
                    <td class="tdleft"><label for="first_drive_date">初次驾驶证日期</label></td>
                    <td><?php echo ($student["first_drive_date"]); ?></td>
                 </tr>
                 <tr>
                	<td class="tdleft"><label for="obtain_code">原从业资格证号</label></td>
                    <td><?php echo ($student["obtain_code"]); ?></td>
                	<td class="tdleft"><label>申请类别</label></td>
                    <td>
                    <?php echo ($student["apply_category"]); ?>
                    </td>
                </tr>
                <tr>
                	<td>居住地</td>
                	<td colspan="3"><?php echo ($student["native_place"]); ?></td>
                </tr>
                 <tr>
                	<td class="tdleft"><label>材料清单</label></td>
                    <td colspan="3" style="padding:20px;">
                    <?php echo ($student["bill_materials"]); ?>
                    </td>
                </tr>
            </table>
        </fieldset>
        
        </div>
        
        <p style="text-align:center;">
           
            <button class="btn btn-primary" onclick="backIndex()"><img src="/jx/Public/images/icon/double.png"/> 返回</button>
        </p>
</div>   
              
 
    </div>
    </div>

</body>
</html>