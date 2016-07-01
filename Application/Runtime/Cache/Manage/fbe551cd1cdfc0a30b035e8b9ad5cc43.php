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


//删除
function doDelete(){
	var ids = getId('delete'); 
	if(ids==false){
		return;
	}
	//alert(ids);
	location.href='/jx/index.php/Manage/User/delete?ids='+ids;
}

//重置密码
function doResetPWD(){
	var ids = getId('delete'); 
	if(ids==false){
		return;
	}
	//alert(ids);
	if(confirm("重置后密码为1，确定吗？")){
	   location.href='/jx/index.php/Manage/User/resetPWD?ids='+ids;
	}
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
             
            <a href="/jx/index.php/Manage/User/userUI" class="btn btn-success"> 新增</a>     	
            <a href="javascript:doResetPWD()" class="btn btn-default"> 重置密码</a>    
            <a href="javascript:doDelete()" class="btn btn-default"> 删除</a>    
           <a href="/jx/index.php/Manage/Dictionary/dictionary" class="btn btn-default" >基础数据维护</a>
           <a href="/jx/index.php/Manage/Excel/importUI" class="btn btn-default" >历史数据导入</a>
              
	      <div style="float: right">          
                    <form action="/jx/index.php/Manage/User/userMain" id="formQuery" method="get" class="form-inline">							
                                                           姓名:<input type="text" name="cnname"  value="<?php echo ($cnname); ?>"  />
                        <button class="btn btn-default" type="button" onClick="doSearch()">查询</button>
                    </form> 
            </div>

        </div>

<div>
	<div class="block-heading">用户管理</div>
    <table class="table">
          <thead>
            <tr>
            <th class="thcheckbox" width="3%" ><input type="checkbox"
								name="checkbox" id="checkbox" onclick="checkAll(this);" ></th>
              <th>ID</th>
              <th>登陆名</th>
              <th>中文名</th>
              <th>所属部门</th>           
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          	
          	<?php if(empty($userList)): ?><tr>
								<td colspan="10" align="center"><font color="red">暂无数据</font></td>
							</tr><?php endif; ?>
						
			<?php if(is_array($userList)): foreach($userList as $key=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>">
						         <td class="thcheckbox"><input type="checkbox" name="chk" id="chk" onclick="selTr(this);" ></td>
						         <td><?php echo ($vo["id"]); ?></td>
						         <td><?php echo ($vo["username"]); ?></td>
						         <td><?php echo ($vo["cnname"]); ?></td>
						         <td><?php echo ($vo["dept"]); ?></td>					        					 					         
						         <td>
						         	<a href="/jx/index.php/Manage/User/userUI?id=<?php echo ($vo["id"]); ?>">编辑</a>&nbsp;
						         	<a href="/jx/index.php/Manage/User/powerUI?id=<?php echo ($vo["id"]); ?>">设置权限</a>&nbsp;						         	
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