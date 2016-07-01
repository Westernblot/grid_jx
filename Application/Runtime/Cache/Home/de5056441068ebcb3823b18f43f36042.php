<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body>
	<div>
    <span id="KSD">3</span>天
    <span id="KSH">12</span>小时
    <span id="KSM">39</span>分钟
    <span id="KSS">25</span>秒
</div>
 

 
<script type="text/javascript">
function countDown(targetTime, callback) {
    var t_timestamp = Date.parse(targetTime);
    var s_timestamp = new Date();
    c_timestamp = t_timestamp - s_timestamp; // 倒计时间戳
    if (c_timestamp > 0) {
        setTimeout(function callee() {
            countdownTime(c_timestamp);
            if (c_timestamp > 0) {
                c_timestamp -= 1000;
                setTimeout(callee, 1000);
            }
        }, 1);
    }
 
    // 计算倒计时间(天，小时，分钟，秒)，并传入回调函数，执行回调
    function countdownTime(c_timestamp) {
        var d, h, m, s;
        c_timestamp = c_timestamp / 1000;
 
        d = parseInt(c_timestamp / 3600 / 24, 10); // 天数
        h = parseInt(c_timestamp / 3600 % 24, 10); // 小时
        m = parseInt(c_timestamp % 3600 / 60, 10); // 分钟
        s = parseInt(c_timestamp % 3600 % 60, 10); // 秒
 
        if (typeof callback === 'function') {
            callback(d, h, m, s);
        }
    }
};
 
var targetTime = '2013/11/12 00:00:00'; // 大于本地时间(假如本地时间为：2013/3/14 16:10:00)
countDown(targetTime, function(d, h, m, s) {
 
    // 补零
    for (var i = 0, len = arguments.length; i < len; i++) {
        if (String(arguments[i]).length < 2) {
            arguments[i] = '0' + arguments[i];
        }
    }
    // dom操作
    document.getElementById('KSD').innerHTML = h;
    document.getElementById('KSH').innerHTML = h;
    document.getElementById('KSM').innerHTML = m;
    document.getElementById('KSS').innerHTML = s;
});
</script>

</body>
 </html>