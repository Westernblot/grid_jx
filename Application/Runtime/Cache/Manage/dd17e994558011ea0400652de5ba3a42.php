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
	
});


//删除
function doDelete(){
	var ids = getId('delete'); 
	if(ids==false){
		return;
	}
	//alert(ids);
	if(confirm("确定删除吗？")){
	location.href='/jx/index.php/Manage/Index/delete?ids='+ids;
	}
}


//条件查询
function doSearch(){
	$('#formQuery').submit();
}

//数据导出
function doExport(){
	var sdate=$('#sdate').val();
	var edate=$('#edate').val();
	location.href="/jx/index.php/Manage/Index/expStudent?sdate="+sdate+"&edate="+edate;
}


//打印
function doPrint(url){
	var id = getId('update'); 
	if(id==false){
		return;
	}
	
	//location.reload();            //刷新本页面
	//window.open(url+"?id="+id);   //弹出打印页面
	
	location.href=url+"?id="+id;
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
	
    <?php if(in_array(("基础数据维护"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/Dictionary/dictionary">基础数据维护</a>
	<?php endif; ?>
	
    <?php if(in_array(("用户管理"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/User/userMain">用户管理</a>
	<?php endif; ?>
	
    <?php if(in_array(("查询统计"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/Select/index">查询统计</a>
	<?php endif; ?>
	      <!-- 权限控制结束 -->
        </div>
    </div> 
        
    <div class="content">
      	<div class="container-fluid">
                    
        <div class="btn-toolbar">
             
           
      <form action="/jx/index.php/Manage/Index/index" id="formQuery" method="get" class="form-inline">							
            
                       添加时间：
            <input type="text" id="sdate" name="sdate"  class="Wdate" value="<?php echo date('Y-m-d');?>"  onclick="WdatePicker()" >
                                 至
            <input type="text" id="edate" name="edate"  class="Wdate" value="<?php echo date('Y-m-d');?>"  onclick="WdatePicker()" >
           
	      
                             <!-- <a href="javascript:doPrint('/jx/index.php/Manage/Print/print01')"  class="btn">打印考试申请表</a>  -->
         <br>                     
                        报考细分类别：&nbsp;<select name="apply_detail_type">
                        	<option value="">-查询所有-</option>
                        	<?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): ?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
       </form> 
           <button class="btn btn-success" type="button" onClick="doSearch()">查询</button>
           <button class="btn btn-blue" type="button" onClick="doSearch()">数据导出</button>
           <a href="javascript:doExport()" class="btn btn-default"> 数据导出</a> 
           
        </div> 

        </div>

<div>
	<div class="block-heading">查询统计</div>
    <table class="table">
          <thead>
            <tr>
            <th class="thcheckbox" width="3%" ><input type="checkbox"
								name="checkbox" id="checkbox" onclick="checkAll(this);" ></th>
              <th>ID</th>
              <th>姓名</th>
              <th>性别</th>
              <th>身份证号</th>
              <th>电话</th>
              <th>报考细分类别</th>
              <th>添加时间</th>
              <th>已打印</th>
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
						         <td><?php echo ($vo["student_name"]); ?></td>
						         <td><?php echo ($vo["sex"]); ?></td>
						         <td><?php echo ($vo["idcard"]); ?></td>
						         <td><?php echo ($vo["tel1"]); ?></td>					 					         
						         <td><?php echo ($vo["apply_detail_type"]); ?></td>						 					         
						         <td><?php echo ($vo["add_date"]); ?></td>						 					         
						         <td><?php echo ($vo["isprint"]); ?></td>						 					         
						         <td>						         						         		
						         	<a href="/jx/index.php/Manage/Index/studentUI?id=<?php echo ($vo["id"]); ?>">打印考试申请表</a>&nbsp;						     					         	
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