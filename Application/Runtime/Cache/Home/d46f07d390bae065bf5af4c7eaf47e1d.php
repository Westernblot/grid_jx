<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>学员信息</title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
	<script type="text/javascript" src="/jx/Public/js/jquery.js"></script>
</head>

<script type="text/javascript">
	
	$(function(){
		remindMsg();
	});
	
	//开始考试
	function toExam(){
		var apply_detail_type=$('#apply_detail_type').val();
		location.href='/jx/index.php/Home/Index/index?apply_detail_type='+apply_detail_type;
	}
	
	//考试记录
	function toRecord(){
		var apply_detail_type=$('#apply_detail_type').val();
		location.href='/jx/index.php/Home/Index/record?apply_detail_type='+apply_detail_type;
	}
	
	
	//提示考试及格分数
	function remindMsg(){
		var apply_detail_type=$('#apply_detail_type').val();
		
		if(apply_detail_type=='道路危险货物运输驾驶人员' || apply_detail_type=='道路危险货物运输押运人员' ){
			$('#msg').text("90分及格");
		}else{
			$('#msg').text("80分及格");	
		}
		
	}
	
</script>

<body>
     <div class="navbar">
    	<div class="navbar-inner">
                <ul class="nav">                 
                    <li class="current"><a href="javascript:toRecord()">考试记录</a></li>
                    <li><a href="/jx/index.php/Home/Index/quit">注销</a></li>
                </ul>
        	<div class="brand"><?php echo C('HOME_TITLE');?></div>
        </div>
    </div>
    
    <div class="dialog">
        <div class="block">
            <p class="block-heading">学员信息</p>
            <div class="block-body" style="text-align:center; font-size:140%; line-height:2em;">
                <p><img src="<?php echo ((isset($_SESSION['snStudent']['imgurl']) && ($_SESSION['snStudent']['imgurl'] !== ""))?($_SESSION['snStudent']['imgurl']):'/jx/Public/images/user.jpg'); ?>" class="img-circle" height="120"></p>
                <p><?php echo ($_SESSION['snStudent']['student_name']); ?><br/>
                
                <select name="apply_detail_type" id="apply_detail_type" onchange="remindMsg()">
                         <?php if(is_array($studentList)): foreach($studentList as $key=>$vo): ?><option value="<?php echo ($vo["apply_detail_type"]); ?>"><?php echo ($vo["apply_detail_type"]); ?></option><?php endforeach; endif; ?>
                </select>
                	<!-- <?php echo ($_SESSION['snStudent']['apply_detail_type']); ?> -->
                	
                </p>
                <p style="text-align:left; margin-left:20%; margin-top:1em;">
                    考试题库：100题<br/>
                    考试时间：60分钟<br/>
       <font color="red">合格标准：满分100,<span id="msg">80分及格</span></font>
                </p>
                <a href="javascript:toExam()" class="btn btn-success" >开始考试</a>
               
            </div>
        </div>
        
        <p><a href="#">顺通驾校</a>版权所有©2015 All Rights Reserve</p>
    </div>
</body>
</html>