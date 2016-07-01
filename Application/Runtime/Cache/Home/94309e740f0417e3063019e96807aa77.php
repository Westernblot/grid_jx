<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
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
 	var qid="<?php echo ($qid); ?>";
 	$('#'+qid).attr('class','bBlue');
 	    
 	//2.显示本题给用户
	var data=PublicAjax('/jx/index.php/Home/Index/exportTheme',{'qid':qid});
	if(data){
	    var rightanswer=data.question.rightanswer;
	    
		$('#title_type').html(data.title_type);                              //题目类型
		$('#theme').html(1+"."+data.question.theme);                       //题目
		$('#theme_option').html(data.theme_option);                          //选项
		$('#currentThemeId').attr('value',data.question.id);                 //当前题目ID
		$('#rightanswer').attr('value',rightanswer);                         //正确答案
	
	}
 	    
 	    //计时器开始
 		timer1=setInterval("clock1()",1000);
 });
 
 function clock1(){
 	
 	var ss=parseInt($("#ss").val());
 	var mm=parseInt($("#mm").val());
 	
 	if(mm>0){
 		$("#ss").attr('value',ss);
 		$("#mm").attr('value',mm-1);
 		$("#clocktime").html("00:"+fmt(ss)+":"+fmt(mm-1));
 		
 		 var cost_ss=(59-ss);
         var cost_mm=(60-mm);
         var length=((cost_ss*60+cost_mm)*100/(60*60)).toFixed(2)+"%";		
 		 $('#clock_line').attr('style','width:'+length);
 		 $('#clock_num').text(length);
 		 
 	}else{
 		$("#ss").attr('value',ss-1);
 		$("#mm").attr('value',59);
 		$("#clocktime").html("00:"+fmt(ss-1)+":"+59);
 		
 	}
 	
 	//考试时间
   if(ss==00 && mm==01){
    	 $('#clock_line').attr('style','width:100%');
 		 $('#clock_num').text("100%");
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
	
	beforeDo();//判断答案是否正确
	
	var currentThemeId=$('#currentThemeId').val();
	
	var index = $("#question_Number li").index($('#'+currentThemeId));  //获取当前li是第几个li
	var prev=$("#question_Number li").eq(index-1);                      //查找上一个li
	
	if(index==0){
		$('#'+currentThemeId).attr('class','bBlue');
		alert('已经是第一题!');
		return;
	}
	$(prev).attr('class','bBlue');
	
	var qid=$(prev).attr('id');
	var num=$(prev).text();
	
	var data=PublicAjax('/jx/index.php/Home/Index/exportTheme',{'qid':qid});
	if(data){
			 var rightanswer=data.question.rightanswer;
	    
		$('#title_type').html(data.title_type);                              //题目类型
		$('#theme').html(num+"."+data.question.theme);                       //题目
		$('#theme_option').html(data.theme_option);                          //选项
		$('#currentThemeId').attr('value',data.question.id);                 //当前题目ID
		$('#rightanswer').attr('value',rightanswer);                         //正确答案
	
	//3.判断用户本题是否已经做答，若已作答则显示对错
	    afterDo(qid,rightanswer);
	}
	
	//4.已答题数量显示
	comAnswernum();
	
}

//下一题
function nextTheme(){
	
	
	beforeDo();//判断答案是否正确
	
	var currentThemeId=$('#currentThemeId').val();

	var index = $("#question_Number li").index($('#'+currentThemeId));  //获取当前li是第几个li
	var next=$("#question_Number li").eq(index+1);                      //查找下一个li
	
	if(next.length==0){
		$('#'+currentThemeId).attr('class','bBlue');
		alert('已经是最后一题!');
		return;
	}
	$(next).attr('class','bBlue');
	
	var qid=$(next).attr('id');
	var num=$(next).text();

	var data=PublicAjax('/jx/index.php/Home/Index/exportTheme',{'qid':qid});
	if(data){
		 var rightanswer=data.question.rightanswer;
	    
		$('#title_type').html(data.title_type);                              //题目类型
		$('#theme').html(num+"."+data.question.theme);                       //题目
		$('#theme_option').html(data.theme_option);                          //选项
		$('#currentThemeId').attr('value',data.question.id);                 //当前题目ID
		$('#rightanswer').attr('value',rightanswer);                         //正确答案
	
	//3.判断用户本题是否已经做答，若已作答则显示对错
	    afterDo(qid,rightanswer);
	}
	
	//4.已答题数量显示
	comAnswernum();

}


//跳转到某一题目
function toTheme(qid,num){
	$('#'+qid).attr('class','bBlue');
	//1.判断上一题答案是否正确
	beforeDo();
	
	//2.显示本题给用户
	var data=PublicAjax('/jx/index.php/Home/Index/exportTheme',{'qid':qid});
	if(data){
	    var rightanswer=data.question.rightanswer;
	    
		$('#title_type').html(data.title_type);                              //题目类型
		$('#theme').html(num+"."+data.question.theme);                       //题目
		$('#theme_option').html(data.theme_option);                          //选项
		$('#currentThemeId').attr('value',data.question.id);                 //当前题目ID
		$('#rightanswer').attr('value',rightanswer);                         //正确答案
	
	//3.判断用户本题是否已经做答，若已作答则显示对错
	    afterDo(qid,rightanswer);
	}
	
	//4.已答题数量显示
	comAnswernum();
}


//===============================基础函数调用==========================================

//获取checkbox的值
function  getCheckboxValue(){
	 var value="";
	 $('input[name="chk_option"]:checked').each(function(){
            var chk_value=$(this).val();             
            if(value==''){
            	value=chk_value;
            }else{
            	value+=","+chk_value;
            }
     });
     return value;
  }


//根据值设置checkbox 选中
function setCheckboxOn(answers){
	 $('input[name="chk_option"]').each(function(){
            var chk_value=$(this).val();             
            if(answers.indexOf(chk_value) >= 0){
            	$(this).attr('checked',true);
            }
            //$(this).attr('disabled',true);
     });
}

//判断答案是否正确
function beforeDo(){
	var currentThemeId=$('#currentThemeId').val();
	var rightanswer=$('#rightanswer').val()==''?'':$('#rightanswer').val();

	var dn=getCheckboxValue();//获取用户填写的答案
	if(dn==''){
		if(currentThemeId!=''){                     //如果前一题未答，则清除显示样式
		     $('#'+currentThemeId).attr('class','');
		}
		
		if($('#'+currentThemeId).attr('color')!='yellow'){			
		   $('#'+currentThemeId).attr('color','red');
		}
		
	}else{
		
		//判断答案是否正确
		if(dn==rightanswer){
			$('#'+currentThemeId).attr('flag','yes');
		}else{
			$('#'+currentThemeId).attr('flag','no');
		}
		
		if( $('#'+currentThemeId).attr('color')!='yellow'){
		  $('#'+currentThemeId).attr('color','green');
		}
	        
	}
	
	
	//根据颜色标记给予颜色显示
	var color=$('#'+currentThemeId).attr('color');
	if(color=='green'){
		$('#'+currentThemeId).attr('class','bGreen');
	}else if(color=='red'){
		$('#'+currentThemeId).attr('class','bRed');
	}else if(color=='yellow'){
		$('#'+currentThemeId).attr('class','bYellow');
	}
	
	
	$('#'+currentThemeId).attr('answer',dn);      //写入用户答案到页面
}


//标记
function signYellow(){
	var currentThemeId=$('#currentThemeId').val();
	//alert(currentThemeId);
	$('#'+currentThemeId).attr('color','yellow');
}

function calYellow(){
	var currentThemeId=$('#currentThemeId').val();
	//alert(currentThemeId);
	$('#'+currentThemeId).attr('color','');
}

//判断用户本题是否已经做答
function  afterDo(qid,rightanswer){
	var student_choose=$('#'+qid).attr('answer');  //获取用户的选择答案
	if(student_choose!=''){
		setCheckboxOn(student_choose);            //回显用户的选项
	}
}


//计算已答题数
function comAnswernum(){
	var num=0;
	$("#question_Number li").each(function(index){
		if($(this).attr('answer')!=''){
		  num++;
		}
		//num++;
	});
	//return num;
	$('#answer_line').attr('style','width:'+num+"%");
	$('#answer_num').text(num);
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
	
	beforeDo();//判断答案是否正确
	
	var num=0;
	var right=0;
	var wrong=0;
	var noanswer=0;
	
	var question="";
	var right_question="";
	var wrong_question="";
	var noanswer_question="";
	 $("#question_Number li").each(function(index){
	 	if($(this).attr('flag')=='yes'){
	 		right_question+=$(this).attr('id')+"-"+$(this).attr('answer')+"-"+$(this).attr('flag')+"|";
	 		right++;
	 	}else if($(this).attr('flag')=='no'){
	 		wrong_question+=$(this).attr('id')+"-"+$(this).attr('answer')+"-"+$(this).attr('flag')+"|";
	 		wrong++;
	 	}else{
	 		noanswer_question+=$(this).attr('id')+"-"+$(this).attr('answer')+"-"+$(this).attr('flag')+"|";
	 		noanswer++;
	 	}
	 	
	 	question+=$(this).attr('id')+"-"+$(this).attr('answer')+"-"+$(this).attr('flag')+"|";
        num++;
     });
    
    
     //=================考试用时======================
     var cost_ss=fmt(59-parseInt($('#ss').val()));
     var cost_mm=fmt(60-parseInt($('#mm').val()));
     var cost_time="00:"+cost_ss+":"+cost_mm;
     
     
     //alert("总数"+num+"正确："+right+"错误"+wrong+"未答题"+noanswer);
     //alert(right_question);
     //alert(wrong_question);
     //alert(noanswer_question);
     //alert(cost_time);
     
     //==========显示考试成绩=================
     var html="<img src='/jx/Public/images/icon/warning_32.png' class='modal-icon'>确认提交考试成绩，结束考试？<br>";
     if(noanswer!=0){
     	html+="您还有 "+noanswer+" 题没有作答，<br>详见下面的答题信息进度框。";
     }
     $('#myModal #sub_msg').html(html);
     $('#step1').attr('style','display:block');
	 $('#step2').attr('style','display:none');
     
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
	var data=PublicAjax('/jx/index.php/Home/Index/record_insert',$('#myModal #form_score').serialize());
	
	if(data.flag>0){
	     var html="您本次考试得分:<B class='f-red'><span>"+data.score+" </span></B>分";
	     $('#myModal #sub_msg').html(html);
	}
	
	$('#step1').attr('style','display:none');
	$('#step2').attr('style','display:block');
}



</script>

<body>
	
		<!-- 隐藏显示 -->
<input type="hidden" id="ss" value="59"><input type="hidden" id="mm" value="60">

	
    <div class="container-left">
            <div class="left-title">
            	
            	<?php if(in_array(($apply_detail_type), explode(',',"经营性道路货物运输驾驶员,经营性道路旅客运输驾驶员"))): ?>本卷为 <?php echo ($apply_detail_type); ?> 理论卷，总分为100分，试题分为3种类型：判断题，单选题，多选题
            		<?php else: ?>
               本卷为 <?php echo ($apply_detail_type); ?> 理论卷，总分为100分，试题分为2种类型：判断题，单选题<?php endif; ?>
            	
            </div>
        	<div class="number-sub">
                <ul>
                    <li><span></span>未读</li>
                    <li><span class="bRed"></span>已读</li>
                    <li><span class="bBlue"></span>在答</li>
                    <li><span class="bGreen"></span>已答</li>
                    <li><span class="bYellow"></span>标记</li>
                </ul>
            </div>
            
            <div class="question-number" id="question_Number">
            	
            	
            	<?php if(in_array(($apply_detail_type), explode(',',"经营性道路货物运输驾驶员,经营性道路旅客运输驾驶员"))): ?><div class="number-main">
                    <div class="title">多选题（共20题、共20分）</div>
                    <ul>
                <?php if(is_array($quesX1)): foreach($quesX1 as $k=>$vo): ?><li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+1); ?>)" answer="" class="" color="" flag=""><?php echo ($k+1); ?></li><?php endforeach; endif; ?>
                        <!-- <li class="bRed">1</li>
                        <li class="bGreen">2</li>
                        <li class="bGreen">3</li>             
                        <li class="bGreen">20</li> -->
                    </ul>
                 </div>
                    
                <div class="number-main">
                    <div class="title">判断题（共40题、共40分）</div>
                        <ul>
                <?php if(is_array($quesA1)): foreach($quesA1 as $k=>$vo): ?><li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+1); ?>)" answer="" class="" color="" flag=""><?php echo ($k+1); ?></li><?php endforeach; endif; ?>
                            <!-- <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>                      
                            <li>38</li>
                            <li>39</li>
                            <li>40</li> -->
                        </ul>
               </div>
                    
                <div class="number-main">
                    <div class="title">单选题（共40题、共40分）</div>
                        <ul>
                <?php if(is_array($quesA2)): foreach($quesA2 as $k=>$vo): ?><li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+1); ?>)" answer="" class="" color="" flag=""><?php echo ($k+1); ?></li><?php endforeach; endif; ?>
                            <!-- <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>                                        
                            <li>39</li>
                            <li>40</li> -->
                        </ul>
               </div>
               
               
               <?php else: ?>
               
               
               <div class="number-main">
                    <div class="title">判断题（共50题、共50分）</div>
                        <ul>
                <?php if(is_array($quesA1)): foreach($quesA1 as $k=>$vo): ?><li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+1); ?>)" answer="" class="" color="" flag=""><?php echo ($k+1); ?></li><?php endforeach; endif; ?>
                            <!-- <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>                      
                            <li>38</li>
                            <li>39</li>
                            <li>40</li> -->
                        </ul>
               </div>
                    
                <div class="number-main">
                    <div class="title">单选题（共50题、共50分）</div>
                        <ul>
                <?php if(is_array($quesA2)): foreach($quesA2 as $k=>$vo): ?><li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+1); ?>)" answer="" class="" color="" flag=""><?php echo ($k+1); ?></li><?php endforeach; endif; ?>
                            <!-- <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>                                        
                            <li>39</li>
                            <li>40</li> -->
                        </ul>
               </div><?php endif; ?>
               
          </div>
    </div>
    <div class="container-right">
            <div class="right-header">
            		<div class="header-person"><img src="/jx/Public/images/user.jpg" height="120" width="120"></div>
                     <ul class="nav">
                        <!-- <li><a href="record.html">考试记录</a></li>
                        <li><a href="login.html">注销</a></li> -->
                    </ul>
                    <ul class="header-info">
                        <li>当前考场:<B><?php echo C('HOME_EXAM');?></B></li>
                        <li>当前场次:<B><?php echo date("Ymd");?>市区X</B></li>
                        <li>细分类别:<B><?php echo ($apply_detail_type); ?></B></li>
                    </ul>
                    <ul class="header-info">
                        <li>姓名:<B><?php echo ($_SESSION['snStudent']['student_name']); ?></B></li>
                        <li>性别:<B><?php echo ($_SESSION['snStudent']['sex']); ?></B></li>
                        <li>身份证号:<B><?php echo ($_SESSION['snStudent']['idcard']); ?></B></li>
                        <li>座位号:<B>XX</B></li>
                    </ul>
            </div>
            
            <div class="right-main">
            
            	<div class="title" id="title_type" >多选题</div>
                      <!--    当前题目           --><input type="hidden" id="currentThemeId" name="currentThemeId" value="<?php echo ($qid); ?>" />
                      <!-- rightanswer --><input type="hidden" id="rightanswer" name="rightanswer" value="" />
                	<div class="test_main">
                		
                		<!-- 题目 -->
            			<div class="test_title" id="theme">
                            <!-- 10.在超越前车时,提前开启左转向灯,变换使用远、近光灯或者鸣喇叭是为了什么?<br/>
                            <img src="../images/cs01.jpg"> -->
                        </div>
                        
                        <!-- 选项 -->
                        <div class="test_choice" id="theme_option">
                        <!-- A、提醒后车以及前车<br/>
                        B、提醒行人 <br/>
                        C、仅提醒后车 <br/>
                        D、仅提醒前车 -->
                        </div>
                  	</div>    
                  	                	
            </div>
            
            <div class="right-footer">
                    <div class="answer" id="sys_remind"><!-- 提示用户答题是否正确 --></div>   
                    <div class="test_button">
                        <button class="submit" onclick="prevTheme()">上一题(←)</button>
                        <button class="submit" onclick="nextTheme()">下一题(→)</button>
                        <button class="submit" onclick="submitTest()">快捷交卷（ctrl+S）</button>
                        <button class="submit" onclick="helper()">帮助（F1）</button>
                        <button class="submit" onclick="signYellow()">标记（F2）</button>
                        <button class="submit" onclick="calYellow()">取消标记（F3）</button>
                    </div>
                    
            	<div class="right-footer-time">
                    <div class="time">
                       <ul class="time-muen">
                            <li>总时间:</li>
                            <li>01:00</li>
                            <li>(时分)</li>
                            <li>剩余时间:</li>
                            <li id="clocktime">01:00:00</li>
                            <li>（时：分：秒）</li>
                         </ul>
                        <div class="Bar"> 
                            <div class="type01" style="width: 0.00%;" id="clock_line"></div>  
                        </div> 
                        <span id="clock_num">0.00%</span>
                    </div>

                    <div class="time">
                       <ul class="time-muen">
                            <li>试题总体:</li>
                            <li>100</li>
                            <li>已答题数:</li>
                            <li id="answer_num">0</li>
                        </ul>
                        <div class="Bar"> 
                            <div class="type02" style="width: 0%;" id="answer_line"></div> 
                        </div> 
                    </div>
            	</div>
            </div>
    </div>
                    

 <!-- ======================================分隔线======================================================== -->

   <div id="myModal" style=" display:none;">
       <div class="myModal_bg"></div> 
       <div class="modal" id="div_modal">
          <div class="modal-header" id="close_id">
            <!-- <button type="button" class="close" onclick="continueExam()">×</button> -->
            <h3 id="myModalLabel">信息提示</h3>
          </div>
        <div class="modal-body" >
          	
        <p class="modal-text" id="sub_msg"> 
        	<!-- <img src="/jx/Public/images/icon/warning_32.png" class="modal-icon">确认提交考试成绩，结束考试？ -->
        	 <!-- 您还有 92 题没有作答，<br>详见下面的答题信息进度框。 -->
        </p>
        
               
          </div>
          <div class="modal-footer">
          	
          	<div id="step1" style="display: none">         		
                <button class="btn btn-danger" data-dismiss="modal" onclick="submitScore()">确认交卷</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true" onclick="continueExam()">继续考试</button>
          	</div>
          	
            <div id="step2" style="display: none"> 
                <button class="btn btn-danger" data-dismiss="modal" onclick="toRecord()">查看考试记录</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true" onclick="pageReload()">再考一次</button>
            </div>
            
            <!--  考试成绩单显示  -->
            <form action="/jx/index.php/Home/Index/record_insert" id="form_score" method="post" style="display: none">
            	<input type="text" id="question" name="question" value=""/>
            	<input type="text" id="right_question" name="right_question" value=""/>
            	<input type="text" id="wrong_question" name="wrong_question" value=""/>
            	<input type="text" id="noanswer_question" name="noanswer_question" value=""/>
            	<input type="text" id="score" name="score" value=""/>
            	<input type="text" id="cost_time" name="cost_time" value=""/>
            	<input type="text" id="apply_detail_type" name="apply_detail_type" value="<?php echo ($apply_detail_type); ?>"/>
            	<input type="text" id="idcard" name="idcard" value="<?php echo ($_SESSION['snStudent']['idcard']); ?>"/>
            </form>
                             
          </div>
          
        </div>
    </div>
    
<script type="text/javascript" src="/jx/Public/js/propagation.js"></script> 

<script type="text/javascript">
	
	  function hotkey(){
	   //alert(window.event.keyCode);
       // var a=window.event.keyCode;
         if(event.ctrlKey&&window.event.keyCode==83){
             submitTest();
          }
          
              if(window.event.keyCode==37){ // 按 <---
                  prevTheme();
                }
              if(window.event.keyCode==39){ // 按 --->
                  nextTheme();
                }
              if(window.event.keyCode==114){ // 按 F3 
                   calYellow();
                 }            
              if(window.event.keyCode==113){ // 按 F2 
                   signYellow();
                 }            
              if(window.event.keyCode==112){ // F1 键
                  helper();
              }
          
          
       }// end hotkey
     document.onkeydown = hotkey;
	
	 /*document.onkeydown=function(event){
              var e = event || window.event || arguments.callee.caller.arguments[0];
              if(e && e.keyCode==37){ // 按 <---
                  prevTheme();
                }
              if(e && e.keyCode==39){ // 按 --->
                  nextTheme();
                }
              if(e && e.keyCode==114){ // 按 F3 
                   calYellow();
                 }            
              if(e && e.keyCode==113){ // 按 F2 
                   signYellow();
                 }            
              if(e && e.keyCode==112){ // F1 键
                  helper();
              }
              if(e && event.ctrlKey && e.keyCode == 83){ // Ctrl + s 键
                  submitTest();
             }
              window.event.returnValue=false;
         }; 
	*/
	
	function toRecord(){
		location.href="/jx/index.php/Home/Index/record?apply_detail_type=<?php echo ($apply_detail_type); ?>";
	}
	
	function pageReload(){
		location.reload();
	}
	
	//================================分隔线=============================================
	
	function helper(){
		var html1='<button type="button" class="close" onclick="continueExam()">×</button>';
		$('#close_id').html(html1);
		
		//$('#div_modal').attr('style','width: 560px; margin: -250px 0 0 -280px');
		$('#sub_msg').html("具体内容，请参照正式考试系统！");	
		$('#step1').attr('style','display:none');
	    $('#step2').attr('style','display:none');
		show();
		//$('#div_modal').attr('style','');
	}
	
</script>
                    
                    
</body>
</html>