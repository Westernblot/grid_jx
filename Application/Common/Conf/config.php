<?php

/**
 * 系统配文件
 * 所有系统级别的配置
 */
return array(
		//'配置项'=>'配置值'
		'URL_MODEL'	=>1,//path-info 模式
// 		'SHOW_PAGE_TRACE' =>true,
// 		'SHOW_RUN_TIME' =>true,   //显示运行时间
// 		'SHOW_ADV_TIME' =>true,   //显示详细的运行时间
// 		'SHOW_DB_TIMES'=>true,//显示数据库操作次数
// 		'SHOW_CACHE_TIMES'=>true,//显示缓存操作次数
// 		'SHOW_USE_MEM'=>true,//显示内存开销
		
		//=============系统配置选项=============================================
		'IDCARD_PATH' => 'E:/WWW/jx/Uploads/idcard',	//读卡器照片存放路径
		'HOME_TITLE' => '驾校模拟考试系统',	//前端系统标题
		'HOME_EXAM' => '黄石市升华驾校考点',	//考试当前考场
		'MANAGE_TITLE' => '驾校模拟考试系统',	//后台系统标题
		'MANAGE_LOGIN' => '黄石市升华驾校',	    //后台登陆系统标题
		
		//=============系统配置选项end=============================================
		
		'LOG_RECORD' => true, // 开启日志记录2.
		'LOG_LEVEL'  =>'SQL,DEBUG,INFO,EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误
		
		//数据库配置
		'DB_TYPE' => 'mysql',
		'DB_HOST' => '219.138.66.184',
		'DB_NAME' => 'grid_sh', // 需要新建一个数据库！名字叫
		'DB_USER' => 'root', // 数据库用户名
		'DB_PWD' => '7788919', // 数据库登录密码
		'DB_PORT' => '3336',
		'DB_PREFIX' => 'tp_', // 数据库表名前缀
		'DB_CHARSET'=> 'utf8', // 字符集
		
		//开启页面追踪
		'SHOW_PAGE_TRACE' => true ,
		 
);
