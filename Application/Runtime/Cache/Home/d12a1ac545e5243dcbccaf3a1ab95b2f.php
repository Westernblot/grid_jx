<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/jx/Public/js/jquery.js"></script>
<title>考试时间倒计时</title>
</head>
 
<script type="text/javascript">
 
 var ss;
 var mm;
 var timer1;
 
 $(function(){
 		timer1=setInterval("clock1()",1000);
 });
 
 function clock1(){
 	
 	ss=parseInt(document.getElementById("ss").value);
 	mm=parseInt(document.getElementById("mm").value);
 	
 	if(mm>0){
 		document.getElementById("ss").value=ss;
 		document.getElementById("mm").value=mm-1;
 		document.getElementById("clocktime").innerHTML=fmt(ss)+":"+fmt(mm-1);
 	}else{
 		document.getElementById("ss").value=(ss-1);
 		document.getElementById("mm").value=59;
 		document.getElementById("clocktime").innerHTML=fmt(ss-1)+":"+59;
 	}
 	
   if(ss==44 && mm==51){
   	    alert("考试时间到！");
    	clearInterval(timer1);//取消第一个
    }
 	
 }
 
 //格式化显示时间
 function fmt(str){
 	if(str<10){
 		str="0"+str;
 	}
 	return str;
 }

//setInterval("clock1()",1000);

</script>
<body>
<center>
	<!-- 隐藏显示 -->
<input type="hidden" id="ss" value="45"><input type="hidden" id="mm" value="0">
<h1>
考试倒计时:
<span id="clocktime"></span>
<hr></hr>
</h1>






</body>
</center>
</html>