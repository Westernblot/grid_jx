<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>黄石市顺通汽车驾驶员培训学校</title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/theme.css">
    <script type="text/javascript" src="/jx/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/jx/Public/js/sysGeneral.js"></script>
    <script type="text/javascript" src="/jx/Public/js/systemUtils.js"></script>
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
 	
 	//考试时间
   if(ss==00 && mm==01){
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

//======================分隔线===================================

//上一题
function prevTheme(){
	
	panduanXZ();//判断答案是否正确
	
	var currentThemeId=$('#currentThemeId').val();
	var prev=$('#'+currentThemeId).prev('li');
	if(prev.length==0){
		alert('已经是第一题!');
		return;
	}
	
	var qid=$(prev).attr('id');
	var sp_id=$('#sp_id').text();
	var data=PublicAjax('/jx/index.php/Home/Index/exportTheme',{'qid':qid});
	if(data){
		$('#sp_id').text(parseInt(sp_id)-1);                         //题目编号
		$('#theme').html(data.question.theme);                       //题目
		$('#theme_option').html(data.theme_option);                  //选项
		$('#opt').html(data.choose_option);                          //选择答题项
		$('#currentThemeId').attr('value',data.question.id);         //当前题目ID
		$('#rightanswer').attr('value',data.question.rightanswer);   //正确答案
	}
	
	
	var student_choose=$('#'+qid).attr('answer');  //获取用户的选择答案
	if(student_choose==''){
		$('#dn').text('');
		$('#opt').removeAttr('style');
	}else{
		$('#dn').text(student_choose);
		if(student_choose==data.question.rightanswer){
			 $('#opt').html("回答正确");  
		}else{		
		     $('#opt').html("正确答案是："+data.question.rightanswer);  
		}
	}
}

//下一题
function nextTheme(){
	
	
	panduanXZ();//判断答案是否正确
	
	var currentThemeId=$('#currentThemeId').val();
	var next=$('#'+currentThemeId).next('li');
	
	if(next.length==0){
		alert('已经是最后一题!');
		return;
	}
	
	var qid=$(next).attr('id');
	var sp_id=$('#sp_id').text();
	var data=PublicAjax('/jx/index.php/Home/Index/exportTheme',{'qid':qid});
	if(data){
		$('#sp_id').text(parseInt(sp_id)+1);                         //题目编号
		$('#theme').html(data.question.theme);                       //题目
		$('#theme_option').html(data.theme_option);                  //选项
		$('#opt').html(data.choose_option);                          //选择答题项
		$('#currentThemeId').attr('value',data.question.id);         //当前题目ID
		$('#rightanswer').attr('value',data.question.rightanswer);   //正确答案
	}
	
	
	var student_choose=$('#'+qid).attr('answer');  //获取用户的选择答案
	if(student_choose==''){
		$('#dn').text('');
		$('#opt').removeAttr('style');
	}else{
		$('#dn').text(student_choose);
		if(student_choose==data.question.rightanswer){
			 $('#opt').html("回答正确");  
		}else{		
		     $('#opt').html("正确答案是："+data.question.rightanswer);  
		}
	}
	
}


//跳转到某一题目
function toTheme(qid,num){
	
	panduanXZ();//判断答案是否正确
	
	var data=PublicAjax('/jx/index.php/Home/Index/exportTheme',{'qid':qid});
	if(data){
		$('#sp_id').text(num);                                       //题目编号
		$('#theme').html(data.question.theme);                       //题目
		$('#theme_option').html(data.theme_option);                  //选项
		$('#opt').html(data.choose_option);                          //选择答题项
		$('#currentThemeId').attr('value',data.question.id);         //当前题目ID
		$('#rightanswer').attr('value',data.question.rightanswer);   //正确答案
	}
	
	var student_choose=$('#'+qid).attr('answer');  //获取用户的选择答案
	if(student_choose==''){
		$('#dn').text('');
		$('#opt').removeAttr('style');
	}else{
		$('#dn').text(student_choose);
		//$('#opt').attr('style','display:none');
		
		if(student_choose==data.question.rightanswer){
			 $('#opt').html("回答正确");  
		}else{		
		     $('#opt').html("正确答案是："+data.question.rightanswer);  
		}
	}
	
}


//=====================================分隔线============================================


//单项选择
function singleAnswer(dn){
	$('#dn').text(dn);
	
}

//多项选择
function mulAnswer(dn){
	var chDn=$('#dn').text();
	if (chDn.indexOf(dn)>=0){  //若包含，则返回
		return;
	}
	
	var newDn="";
	if(dn=='A'){
		
		if(chDn==''){
			newDn='A';
		}else{		
		    newDn='A,'+chDn;
		}
		
	}else if(dn=='B'){
		
		//排列组合计算
		if(chDn=='A'){
			newDn='A,B';
		}else if(chDn=='C'){
			newDn='B,C';
		}else if(chDn=='D'){
			newDn='B,D';
		}else if(chDn=='A,C'){
			newDn='A,B,C';
		}else if(chDn=='A,D'){
			newDn='A,B,D';
		}else if(chDn=='C,D'){
			newDn='B,C,D';
		}else if(chDn=='A,C,D'){
			newDn='A,B,C,D';
		}else{
			newDn='B';
		}
		
		
	}else if(dn=='C'){
		
		//排列组合计算
		if(chDn=='A'){
			newDn='A,C';
		}else if(chDn=='B'){
			newDn='B,C';
		}else if(chDn=='D'){
			newDn='C,D';
		}else if(chDn=='A,B'){
			newDn='A,B,C';
		}else if(chDn=='A,D'){
			newDn='A,C,D';
		}else if(chDn=='B,D'){
			newDn='B,C,D';
		}else if(chDn=='A,B,D'){
			newDn='A,B,C,D';
		}else{
			newDn='C';
		}
		
	}else if(dn=='D'){
		
		if(chDn==''){
			newDn='D';
		}else{		
		    newDn=chDn+',D';
		}
		
	}
	$('#dn').text(newDn);
}

//重选
function clearDn(){
	$('#dn').text('');
}


//===============================基础函数调用==========================================

//判断答案是否正确
function panduanXZ(){
	var currentThemeId=$('#currentThemeId').val();
	var rightanswer=$('#rightanswer').val();
	var dn=$('#dn').text();
	if(dn==''){
		return;
	}
	
	if(dn==rightanswer){
		$('#'+currentThemeId).attr('class','right');
	}else{
		$('#'+currentThemeId).attr('class','wrong');
	}
	
	$('#'+currentThemeId).attr('answer',dn);      //写入答案到页面
}


//===============================分隔线==============================================

//暂停
function stopTime(){
	clearInterval(timer1);
}

//继续答题
function startTime(){
	clearInterval(timer1);
	timer1=setInterval("clock1()",1000);
}

//交卷警示
function submitTest(){
	
	panduanXZ();//判断答案是否正确
	
	var num=0;
	var right=0;
	var wrong=0;
	var noanswer=0;
	
	var question="";
	var right_question="";
	var wrong_question="";
	var noanswer_question="";
	 $("#question_Number >li").each(function(index){
	 	if($(this).attr('class')=='right'){
	 		right_question+=$(this).attr('id')+"-"+$(this).attr('answer')+"-"+$(this).attr('class')+"|";
	 		right++;
	 	}else if($(this).attr('class')=='wrong'){
	 		wrong_question+=$(this).attr('id')+"-"+$(this).attr('answer')+"-"+$(this).attr('class')+"|";
	 		wrong++;
	 	}else{
	 		noanswer_question+=$(this).attr('id')+"-"+$(this).attr('answer')+"-"+$(this).attr('class')+"|";
	 		noanswer++;
	 	}
	 	
	 	question+=$(this).attr('id')+"-"+$(this).attr('answer')+"-"+$(this).attr('class')+"|";
        num++;
     });
    
    
     //=================考试用时======================
     var cost_ss=fmt(44-parseInt($('#ss').val()));
     var cost_mm=fmt(60-parseInt($('#mm').val()));
     var cost_time=(cost_ss+":"+cost_mm)=="44:60"?"45:00":(cost_ss+":"+cost_mm);
     
     
     //alert("总数"+num+"正确："+right+"错误"+wrong+"未答题"+noanswer);
     //alert(right_question);
     //alert(wrong_question);
     //alert(noanswer_question);
     //alert(cost_time);
     
     //==========显示考试成绩=================
     $('#myModal #sp_score').text(right);
     if(noanswer!=0){
     	$('#myModal #noanswerMsg').html("您还有 "+noanswer+" 题没有作答，<br>详见下面的答题信息进度框。");
     }
     
     //===========写考试成绩到表单======================
     $('#myModal #question').attr('value',question);
     $('#myModal #right_question').attr('value',right_question);
     $('#myModal #wrong_question').attr('value',wrong_question);
     $('#myModal #noanswer_question').attr('value',noanswer_question);
     $('#myModal #score').attr('value',right);
     $('#myModal #cost_time').attr('value',cost_time);
          
     show();
     stopTime();//计时暂停
}


//继续考试
function continueExam(){
	hide();
	startTime();//计时继续
}


//提交考试成绩
function submitScore(){
	$('#myModal #form_score').submit();
}

</script>

<body>
	<!-- 隐藏显示 -->
<input type="hidden" id="ss" value="45"><input type="hidden" id="mm" value="0">

    <div class="container-fluid">
      <div class="navbar">
                <ul class="nav">                
                    <li><a href="/jx/index.php/Home/Index/record">考试记录</a></li>
                    <li><a href="/jx/index.php/Home/Index/quit">注销</a></li>
                </ul>
        	<div class="brand"><?php echo C('HOME_TITLE');?></div>
    </div>
        
    	<table class="test_questions">
           <tr>
                <td class="test_side bottomNo" valign="top">
                    
                     <div class="test_side_info">
                        <p><B class="text-red">考试信息</B></p>
                        <p style="text-align:center;"><img src="<?php echo ((isset($_SESSION['snStudent']['imgurl']) && ($_SESSION['snStudent']['imgurl'] !== ""))?($_SESSION['snStudent']['imgurl']):'/jx/Public/images/user.jpg'); ?>" height="120" width="120"></p>
                        <p>考试姓名：<span><?php echo ($_SESSION['snStudent']['student_name']); ?></span></p>
                         <p>性　　别：<span><?php echo ($_SESSION['snStudent']['sex']); ?></span></p>
                         <p>报考细分类别：<span style="text-align:right; color:#3165FF"><?php echo ($_SESSION['snStudent']['apply_detail_type']); ?></span></p>
                         <!-- <p>考试车型：<span>小车-B2</span></p> -->
                         <p>申请类别：<span><?php echo ($_SESSION['snStudent']['apply_category']); ?></span></p>
                         <p>考试说明：<span style="text-align:right; color:#3165FF">
                         	1-30题：判断题<br>
                         	31-70题：单选题<br>
                         	71-100题：多选题<br>
                         	
                         </span></p>
                     </div>
                      <!-- 当前题目 --><input type="hidden" id="currentThemeId" name="currentThemeId" value="<?php echo ($question["id"]); ?>" />
                      <!-- rightanswer --><input type="hidden" id="rightanswer" name="rightanswer" value="<?php echo ($question["rightanswer"]); ?>" />
                </td>
               <td rowspan="2" class="test">
                    <div class="test_main">
                    <div class="test_title"><span id="sp_id">1</span>、<span id="theme"><?php echo ($question["theme"]); ?></span></div>
                      
                        <div class="test_choice" id="theme_option">                    	
                <?php if(is_array($theme_option)): foreach($theme_option as $k=>$vo): echo ($vo["option_answer"]); ?>、<?php echo ($vo["content"]); ?><br><?php endforeach; endif; ?>
                        	
                        <!-- A、提醒后车以及前车<br/>
                        B、提醒行人 <br/>
                        C、仅提醒后车 <br/>
                        D、仅提醒前车 -->
                        
                        </div>
                    </div>
                    
                    <div class="test_answe">
                    	
                    	 <div class="opt">您的答案：<B class="f-red"><span id="dn"></span></B></div>
                    	
                    <div class="pull-left" id="opt"> <!-- 选项控制 -->
                        	                    	
                    <?php if((strlen($question["rightanswer"])) == "1"): ?>选择：                 
                         <?php if(is_array($theme_option)): foreach($theme_option as $k=>$vo): ?><button class="submit" onclick="singleAnswer('<?php echo ($vo["option_answer"]); ?>')"><?php echo ($vo["option_answer"]); ?></button><?php endforeach; endif; ?>
                                      
                        <?php else: ?>
                                                                      多项选择：                 
                              <a href="javascript:clearDn()">重选</a>                       
                         <?php if(is_array($theme_option)): foreach($theme_option as $k=>$vo): ?><button class="submit" onclick="mulAnswer('<?php echo ($vo["option_answer"]); ?>')"><?php echo ($vo["option_answer"]); ?></button><?php endforeach; endif; endif; ?>
                                                
                    </div>
                       
                    </div>
                    
                     <div class="test_bottom">   
                        <div class="pull-left">
                            <button class="submit" onclick="startTime()">继续</button>
                            <button class="submit" onclick="stopTime()">暂停</button>
                            <button class="submit" onclick="prevTheme()">上一题</button>
                            <button class="submit" onclick="nextTheme()">下一题</button>
                            <button class="submit" onclick="submitTest()">交卷</button>
                        </div>
                        <div class="test_time"><span id="clocktime">45:00</span></div>
                    </div>
                    
                  
                </td>
            </tr>
           <tr>
             <td class="test_side" valign="bottom">
                <div class="desk_no">正在考试</div>
             </td>
           </tr>
            <tr><td colspan="2">
             
            	<ul class="question_Number" id="question_Number">
                
                <?php if(is_array($quesA1)): foreach($quesA1 as $k=>$vo): ?><li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+1); ?>)" answer="" class="" ><?php echo ($k+1); ?></li><?php endforeach; endif; ?>
            	
                <?php if(is_array($quesA2)): foreach($quesA2 as $k=>$vo): ?><li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+31); ?>)" answer="" class="" ><?php echo ($k+31); ?></li><?php endforeach; endif; ?>
            	
                <?php if(is_array($quesX1)): foreach($quesX1 as $k=>$vo): ?><li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+71); ?>)" answer="" class="" ><?php echo ($k+71); ?></li><?php endforeach; endif; ?>
            	
            	       	
            	</ul>	
            	
           
            
            </td></tr>
        
         </table>
    </div>
    
    <!-- ======================================分隔线======================================================== -->

   <div id="myModal" style=" display:none;">
       <div class="myModal_bg"></div> 
       <div class="modal">
          <div class="modal-header">
            <button type="button" class="close" onclick="continueExam()">×</button>
            <h3 id="myModalLabel">信息提示</h3>
          </div>
          <div class="modal-body">
            <p class="modal-text"> <img src="/jx/Public/images/icon/warning_32.png" class="modal-icon">确认提交考试成绩，结束考试？</p>
            
            <p class="modal-text"> 
                       您本次考试得<B class="f-red"><span id="sp_score"></span></B>分，<br/>
        <span id="noanswerMsg">    	
                       <!-- 您还有 92 题没有作答，<br>详见下面的答题信息进度框。 -->
        </span>
                
            </p>
               
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal" onclick="submitScore()">确认交卷</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true" onclick="continueExam()">继续考试</button>
            
             <!--<button class="btn btn-danger" data-dismiss="modal">查看错题</button>
            <button class="btn" data-dismiss="modal" aria-hidden="true">关闭窗口</button>-->
            
            <!--  考试成绩单显示  -->
            <form action="/jx/index.php/Home/Index/score_insert" id="form_score" method="post" style="display: none">
            	<input type="text" id="question" name="question" value=""/>
            	<input type="text" id="right_question" name="right_question" value=""/>
            	<input type="text" id="wrong_question" name="wrong_question" value=""/>
            	<input type="text" id="noanswer_question" name="noanswer_question" value=""/>
            	<input type="text" id="score" name="score" value=""/>
            	<input type="text" id="cost_time" name="cost_time" value=""/>
            </form>
            
            
            
          </div>
          
        </div>
    </div>
<script type="text/javascript" src="/jx/Public/js/propagation.js"></script> 


    
</body>
</html>