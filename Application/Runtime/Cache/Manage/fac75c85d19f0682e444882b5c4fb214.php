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
	location.href="/jx/index.php/Manage/Zidian/index";
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
		<a href="/jx/index.php/Manage/Zidian/zidianUI">基础数据维护</a>
	<?php endif; ?>
	
    <?php if(in_array(("用户管理"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/User/userMain">用户管理</a>
	<?php endif; ?>
	      <!-- 权限控制结束 -->
        </div>
    </div> 
        
    <div class="content">
      	<div class="container-fluid">
                    
        <div class="btn-toolbar">
             
            <a href="/jx/index.php/Manage/Zidian/studentUI" class="btn btn-success"> 新增</a>     	
            <a href="javascript:doDelete()" class="btn btn-default"> 删除</a>    
           
           
	      <div style=" margin-top:1em;">
                
                    <form action="/jx/index.php/Manage/Index/index" id="formQuery" method="get" class="form-inline">							
                        <input type="text" name="name" placeholder="请输入需要查询的数据..." value="<?php echo ($name); ?>" class="input-inline" />
                        <button class="btn btn-default" type="button" onClick="doSearch()">查询</button>
                    </form> 
            </div>

        </div>

<div>
	<div class="block-heading">基础数据</div>
    <table class="table">
          <thead>
            <tr>
            <th class="thcheckbox" width="3%" ><input type="checkbox"
								name="checkbox" id="checkbox" onclick="checkAll(this);" ></th>
              <th>ID</th>
              <th>名称</th>
              <th>类别</th>
              <th>排序</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          	
          	<?php if(empty($studentList)): ?><tr>
								<td colspan="10" align="center"><font color="red">暂无数据</font></td>
							</tr><?php endif; ?>
						
			<?php if(is_array($studentList)): foreach($studentList as $key=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>">
						         <td class="thcheckbox"><input type="checkbox" name="chk" id="chk" onclick="selTr(this);" ></td>
						         <td><?php echo ($vo["id"]); ?></td>
						         <td><?php echo ($vo["name"]); ?></td>
						         <td><?php echo ($vo["kind"]); ?></td>
						         <td><?php echo ($vo["sort"]); ?></td>					 					         
						         <td>
						         	<a href="/jx/index.php/Manage/Zidian/studentUI?id=<?php echo ($vo["id"]); ?>">编辑</a>&nbsp;
						         	<a href="/jx/index.php/Manage/Zidian/seeUI?id=<?php echo ($vo["id"]); ?>">查看</a>&nbsp;
						         	
						         </td>						 					         
						      </tr><?php endforeach; endif; ?>
          	
            <!-- <tr>
              <td><input type="checkbox" name="checkbox" id="checkbox"></td>
              <td>1</td>
              <td>李某某</td>
              <td>男</td>
              <td>13872012236</td>
              <td>小车-B2</td>
              <td>
                  <a href="user.html" class="tick-circle"></a>
                  <a href="#" class="minus-circle"></a>
              </td>
            </tr>
            -->
          </tbody>
        </table>
</div>   
     <div class="pagination">
     	<?php echo ($page); ?>
    <!-- <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
    </ul> -->
</div>         
 
    </div>
   </div> 


</body>
</html>