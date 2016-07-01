<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>黄石市顺通汽车驾驶员培训学校</title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
    <script type="text/javascript" src="/jx/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/jx/Public/js/sysGeneral.js"></script>
    <script type="text/javascript" src="/jx/Public/js/systemUtils.js"></script>
</head>
<script type="text/javascript">
$(function(){
	
});



//提交表单
function submitForm(){
	
	var password=$('#password').val();
	var password1=$('#password1').val();
	if(password!=password1 || password=='' || password1==''){
		alert("请确认密码不为空，且两次输入密码一致！");
		return;
	}
	
	$('#form1').submit();
}


</script>
<body>
    <div class="navbar">
    	<div class="navbar-inner">
                <ul class="nav">
                    <li>
                            <img src="/jx/Public/images/icon/user-white.png"/> <?php echo ($_SESSION['snUser']['cnname']); ?>
                    </li>
                     <li><a href="/jx/index.php/Manage/Index/updatePwdUI">修改密码</a></li>
                    <li><a href="/jx/index.php/Manage/Index/quit">注销</a></li>
                </ul>
        	<div class="brand"><img src="/jx/Public/images/logo.png"></div>
        </div>
    </div>
    
  	<div class="header">
        <div class="page-title">
          <!-- 权限控制 -->
    <?php if(in_array(("学员信息管理"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/Index/index">学员信息管理</a>
	<?php endif; ?>
	
    <?php if(in_array(("基础数据维护"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="data.html">基础数据维护</a>
	<?php endif; ?>
	
    <?php if(in_array(("用户管理"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/User/userMain">用户管理</a>
	<?php endif; ?>
	      <!-- 权限控制结束 -->
        </div>
    </div>
    
  	<div class="content">
        <div class="container-fluid">
                     
        <!-- <div class="btn-toolbar">
            <a class="btn btn-default" href="/jx/index.php/Manage/Index/index">回到列表页</a>    	
        </div> -->
        
<div class="well">
        <form action="/jx/index.php/Manage/Index/updatePwd"  id="form1" method="post">
        <div class="block-body">
        	<input type="hidden" name="id" value="<?php echo ($_SESSION['snUser']['id']); ?>" />
        <fieldset>
        <legend> 个人密码修改</legend>        
           	<table class="table-add">
            	<tr>
                	<td align="right">新密码：<font color="red">*</font></td>
                	<td><input type="text" id="password" name="password" /></td>
                 </tr>
                 <tr>
                   <td align="right">重复密码：<font color="red">*</font></td>
                	<td><input type="text" id="password1" name="password1" /></td>
                </tr>
                
            </table>
        </fieldset>
        </div>
        
        </form>
        
        <p style="text-align:center;">
            <!-- <button class="btn btn-primary" onclick="resetForm()"><img src="/jx/Public/images/icon/refresh.png"/> 重置</button> 　 -->
            <button class="btn btn-primary" onclick="submitForm()"><img src="/jx/Public/images/icon/folder__simple.png"/> 修改</button>　
            <!-- <button class="btn btn-primary" onclick="backIndex()"><img src="/jx/Public/images/icon/double.png"/> 返回</button> -->
        </p>
</div>   
              
 
    </div>
    </div>

</body>
</html>