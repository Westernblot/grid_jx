<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台管理系统</title>
<link href="/jx/Public/css/frame.css" rel="stylesheet" type="text/css"/>
</head>
<body style=" background:url(/jx/Public/images/sys/top_bg.png) repeat-x bottom #FFF;">
	<div id="div_top">
			<div class="top_left">驾考-后台管理系统</div>
			<div class="top_right">
				<div class="top_inner">
					<div class="curst">
						<span>当前用户：<?php echo ($_SESSION['snUser']['username']); ?></span>
					</div>
					<a href="/jx/index.php/Admin/Index" target="_parent"><img
						src="/jx/Public/images/sys/house.png" />返回首页</a> <a href="/jx/index.php/Admin/User/updatePasswordUI?id=<?php echo ($_SESSION['snUser']['id']); ?>"
						target="mainFrame"><img src="/jx/Public/images/sys/lock_unlock.png" />修改密码</a>
					<a onclick="if(	confirm('你确定退出系统吗？')){winclosed('logout_zygl');}"
						href="/jx/index.php/Admin/Login/quit"  target="_parent"  ><img src="/jx/Public/images/sys/television.png" />退出系统</a>
				</div>
			</div>
		</div>
</body>
</html>