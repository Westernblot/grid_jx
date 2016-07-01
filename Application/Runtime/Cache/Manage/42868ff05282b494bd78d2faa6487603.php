<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
<script type="text/javascript" src="/jx/Public/js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="/jx/Public/js/sysGeneral.js"></script>
<script type="text/javascript" src="/jx/Public/js/systemUtils.js"></script>
<script type="text/javascript" src="/jx/Public/js/ajaxfileupload.js"></script>
</head>
<script type="text/javascript">
$(function(){
	
});



//===========================图片上传===================================
function doUpload(){
	
	var fileId='file1';
	 $.ajaxFileUpload
     (
         {
             url: '/jx/index.php/Manage/Excel/uploadImport', //用于文件上传的服务器端请求地址
             type: 'post',
             data: { 'fileId': fileId }, //此参数非常严谨，写错一个引号都不行
             secureuri: false, //一般设置为false
             fileElementId: fileId, //文件上传空间的id属性  <input type="file" id="file1" name="file1" />
             dataType: 'json', //返回值类型 一般设置为json
             success: function (data, status)  //服务器成功响应处理函数
             {
             
            	 // if(data>0){        	 	
            	 	// alert('导入成功!');
            	 // }else{
            	 	// alert('导入失败!');
            	 // }
            	 
            	 if(data==-1){
            	 	alert('文件上传失败！');
            	 }else if(data==0){
            	 	alert('数据全部写入失败，请检查是否有重复数据！');
            	 }else{
            	 	alert('成功导入'+data+'条数据！');
            	 }
            	 
             },
             error: function (data, status, e)//服务器响应失败处理函数
             {
                 alert(e);
             }
         }
     );

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
       
        <div class="block-body">
        	
        <fieldset>
        <legend> 历史数据导入</legend>        
           	<table class="table-add">
            	<tr>
                	<td class="tdleft" >excel表模板 </td>
                	<td ><a href="/jx/Uploads/www.xls">点击下载</a></td>
                </tr>
            	<tr>
                	<td class="tdleft" >提示： </td>
                	<td ><font color="red">导入excel的文件需为97-2003的.xls结尾的文件；模板中的数据如材料清单，为多个时，请用字母,号隔开</font></td>
                </tr>
                 <tr>
                	<td class="tdleft"><label>选择excel</label></td>
                    <td  style="padding:20px;">
                    <input type="file" id="file1" name="file1" >
                    </td>
                </tr>
            </table>
        </fieldset>
        </div>
        
        </form>
        
        <p style="text-align:center;">
            <!-- <button class="btn btn-primary" onclick="resetForm()"><img src="/jx/Public/images/icon/refresh.png"/> 重置</button> 　 -->
            <button class="btn btn-primary" onclick="doUpload()"><img src="/jx/Public/images/icon/folder__simple.png"/> 导入</button>　
            <button class="btn btn-primary" onclick="javascript:history.back();"><img src="/jx/Public/images/icon/double.png"/> 返回</button>
        </p>
</div>   
              
 
    </div>
    </div>

</body>
</html>