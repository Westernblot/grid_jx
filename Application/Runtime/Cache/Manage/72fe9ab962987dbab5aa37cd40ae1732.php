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
	
	$('#form1').submit();
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
                     
        <!-- <div class="btn-toolbar">
            <a class="btn btn-default" href="/jx/index.php/Manage/Index/index">回到列表页</a>    	
        </div> -->
        
<div class="well">
        <form action="/jx/index.php/Manage/User/setPower"  id="form1" method="post">
        <div class="block-body">
        	<input type="hidden" name="id" value="<?php echo ($user["id"]); ?>" />    	
            <input type="hidden" name="power[]" value="0">
        <fieldset>
        <legend> 用户权限管理</legend>        
           	<table class="table-add">
            	<tr>
                	<td class="tdleft" >用户 </td>
                	<td ><?php echo ($user["cnname"]); ?> </td>
                </tr>
                 <tr>
                	<td class="tdleft"><label>设置权限</label></td>
                    <td  style="padding:20px;">
                        <span class="col-xs-4"><label for="power1"> <input type="checkbox" id="power1" name="power[]" value="学员信息管理"  <?php if(in_array("学员信息管理", explode(',',$user['power']))): ?>checked<?php endif; ?> /> 学员信息管理</label></span>
                        <span class="col-xs-4"><label for="power3"> <input type="checkbox" id="power3" name="power[]" value="用户管理" <?php if(in_array("用户管理", explode(',',$user['power']))): ?>checked<?php endif; ?> /> 用户管理</label></span>
                        <span class="col-xs-4"><label for="power2"> <input type="checkbox" id="power2" name="power[]" value="查询统计" <?php if(in_array("查询统计", explode(',',$user['power']))): ?>checked<?php endif; ?> /> 查询统计</label></span>
                     </td>
                </tr>
            </table>
        </fieldset>
        </div>
        
        </form>
        
        <p style="text-align:center;">
            <!-- <button class="btn btn-primary" onclick="resetForm()"><img src="/jx/Public/images/icon/refresh.png"/> 重置</button> 　 -->
            <button class="btn btn-primary" onclick="submitForm()"><img src="/jx/Public/images/icon/folder__simple.png"/> 保存</button>　
            <button class="btn btn-primary" onclick="javascript:history.back();"><img src="/jx/Public/images/icon/double.png"/> 返回</button>
        </p>
</div>   
              
 
    </div>
    </div>

</body>
</html>