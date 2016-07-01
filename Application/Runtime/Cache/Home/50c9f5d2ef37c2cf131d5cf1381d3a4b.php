<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>登录</title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
    <script type="text/javascript" src="/jx/Public/js/jquery.js"></script>
</head>

<script type="text/javascript">
	
	function doLogin(){
		var idcard=$('#idcard').val();
		if(idcard==''){
			alert('身份证号必填！');
			return;
		}
		$('#form1').submit();
	}
	
</script>

<body>
    <div class="navbar">
             <div class="brand"><?php echo C('HOME_TITLE');?></div>
    </div>
        <div class="dialog">
            <div class="block">
                <p class="block-heading">模拟考试登录</p>
                <div class="block-body">
                    <form action="/jx/index.php/Home/Login/checkLogin" method="post" id="form1">
                        <label>身份证号码<font color="red">*</font></label>
                        <input type="text" id="idcard" name="idcard" class="col-xs-12">
                        <a href="javascript:doLogin()" class="btn btn-primary pull-right" >登录</a>
                    </form>
                </div>
            </div>
        <p><a href="#">顺通驾校</a>版权所有©2015 All Rights Reserve</p>
        </div>
</body>
</html>