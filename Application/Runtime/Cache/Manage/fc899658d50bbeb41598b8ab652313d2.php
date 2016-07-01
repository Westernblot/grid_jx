<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
     <script type="text/javascript" src="/jx/Public/js/jquery.js"></script>
</head>

<script type="text/javascript">
	
	$(function(){
		$('#username').focus();
	});
	
	function toPwd(){
		$('#password').focus();
	}
	
	
	function doLogin(){
		$('#form1').submit();
	}
	
	
</script>


<body>
    <div class="navbar">
             <div class="brand"><?php echo C('MANAGE_TITLE');?></div>
    </div>
        <div class="dialog">
            <div class="block">
                <p class="block-heading">管理员登录</p>
                <div class="block-body">
                    <form id="form1" method="post" action="/jx/index.php/Manage/Login/login">
                        <p><label>用户名</label>
                        <input type="text" id="username" name="username" class="col-xs-12" onkeydown="if(event.keyCode==13)toPwd()"></p>
                        <p><label>密码</label>
                        <input type="password" id="password" name="password" class="col-xs-12" onkeydown="if(event.keyCode==13)doLogin();"></p>
                        <a href="javascript:doLogin()" class="btn btn-primary pull-right">登录</a>
                        <!-- <label class="remember-me"><input type="checkbox"> 记住密码</label> -->
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
       	 	<p><a href="#">顺通驾校</a>版权所有©2015 All Rights Reserve</p>
        </div>
</body>
</html>