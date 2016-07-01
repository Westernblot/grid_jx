<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
    <script type="text/javascript" src="/jx/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/jx/Public/js/DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="/jx/Public/js/sysGeneral.js"></script>
    <script type="text/javascript" src="/jx/Public/js/systemUtils.js"></script>
</head>

<script type="text/javascript">
$(function(){
	
});



//条件查询
function doSearch(){
	// var sdate=$('#sdate').val();
	// var edate=$('#edate').val();
	// if(sdate=='' || edate==''){
		// alert("*号项必填！");
		// return;
	// }
	
	$('#formQuery').attr('action','/jx/index.php/Manage/Select/select');
	$('#formQuery').submit();
}


//条件查询结果导出
function doSearchExport(){
	
	$('#formQuery').attr('action','/jx/index.php/Manage/Select/expData');
	$('#formQuery').submit();
}

//数据导出
function doExport(){
	
    var ids = getId('delete'); 
	if(ids==false){
		return;
	}
	
	location.href="/jx/index.php/Manage/Index/expStudent?ids="+ids;
}



//批量打印
function batchPrint(){
	
	var ids = getId('delete'); 
	if(ids==false){
		return;
	}
	
	//location.reload();            //刷新本页面
	//window.open(url+"?id="+id);   //弹出打印页面
	
	//var ids=0;
	
	location.href='/jx/index.php/Manage/Select/batch_print?ids='+ids;
	
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
             
           
      <form action="/jx/index.php/Manage/Select/select" id="formQuery" method="get" class="form-inline">							
            
                       添加时间：
            <input type="text" id="sdate" name="sdate"  class="Wdate" value="<?php echo ($sdate); ?>"  onclick="WdatePicker()" ><font color="red">*</font>
                                 至
            <input type="text" id="edate" name="edate"  class="Wdate" value="<?php echo ($edate); ?>"  onclick="WdatePicker()" ><font color="red">*</font>
           
	      
                             <!-- <a href="javascript:doPrint('/jx/index.php/Manage/Print/print01')"  class="btn">打印考试申请表</a>  -->
         <br>                     
                      姓　　名：<input type="text" name="student_name" value="<?php echo ($student_name); ?>">
         &nbsp;                 
                        报考细分类别：&nbsp;<select name="apply_detail_type">
                        	<option value="" >-查询所有-</option>
                        	<?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): ?><option value="<?php echo ($vo["name"]); ?>" <?php if(($apply_detail_type) == $vo["name"]): ?>selected<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
       </form> 
       <br>
           <button class="btn btn-success" type="button" onClick="doSearch()">查询</button>
           <button class="btn btn-blue" type="button" onClick="doSearchExport()">查询结果导出</button>
           <button class="btn btn-blue" type="button" onClick="doExport()">选择报名数据导出</button>
           <a href="javascript:batchPrint()" class="btn btn-default"> 选择批量打印考试申请表</a> 
           
        </div> 

        </div>

<div>
	<div class="block-heading">查询统计</div>
    <table class="table">
          <thead>
            <tr>
            <th class="thcheckbox" width="3%" ><input type="checkbox"
								name="checkbox" id="checkbox" onclick="checkAll(this);" ></th>
              <th>序号</th>
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
						
			<?php if(is_array($studentList)): foreach($studentList as $k=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>">
						         <td class="thcheckbox"><input type="checkbox" name="chk" id="chk" onclick="selTr(this);" ></td>
						         <td><?php echo ($nowPage*100+$k+1); ?></td>
						         <td><?php echo ($vo["student_name"]); ?></td>
						         <td><?php echo ($vo["sex"]); ?></td>
						         <td><?php echo ($vo["idcard"]); ?></td>
						         <td><?php echo ($vo["tel1"]); ?></td>					 					         
						         <td><?php echo ($vo["apply_detail_type"]); ?></td>						 					         
						         <td><?php echo ($vo["add_date"]); ?></td>						 					         
						         <td><?php echo ($vo["isprint"]); ?></td>						 					         
						         <td>						         						         		
						         	<a href="/jx/index.php/Manage/Print/print01?id=<?php echo ($vo["id"]); ?>">打印考试申请表</a>&nbsp;						     					         	
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