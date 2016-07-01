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
 
 
 $(function(){
 	toTheme("<?php echo ($firstThemeId); ?>",1);
 });
 
 
//跳转到某一题目
function toTheme(qid,num){
	
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
	var student_choose=$('#'+qid).attr('answer');  //获取用户的选择答案
	
	if(student_choose==''){
		 $('#sys_remind').html("");  
	}else{	
		    setCheckboxOn(student_choose);            //回显用户的选项
		if(student_choose==rightanswer){
			 $('#sys_remind').html("回答正确");  
		}else{		
		     $('#sys_remind').html("正确答案是："+rightanswer);  
		}
	}
	}
	
}


//===============================基础函数调用==========================================


//根据值设置checkbox 选中
function setCheckboxOn(answers){
	 $('input[name="chk_option"]').each(function(){
            var chk_value=$(this).val();             
            if(answers.indexOf(chk_value) >= 0){
            	$(this).attr('checked',true);
            }
            $(this).attr('disabled',true);
     });
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
                    <li><span class="bRed"></span>错误</li>
                    
                    <li><span class="bGreen"></span>正确</li>
                  
                </ul>
            </div>
            
            <div class="question-number" id="question_Number">
            	
            	<?php if(in_array(($apply_detail_type), explode(',',"经营性道路货物运输驾驶员,经营性道路旅客运输驾驶员"))): ?><div class="number-main">
                    <div class="title">多选题（共20题、共20分）</div>
                    <ul>        
            	<?php if(is_array($questionArr)): foreach($questionArr as $k=>$vo): ?><!-- <li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+1); ?>)" answer="" class="" ><?php echo ($k+1); ?></li> -->
            		<?php $_RANGE_VAR_=explode(',',"0,19");if($k>= $_RANGE_VAR_[0] && $k<= $_RANGE_VAR_[1]):?><li id="<?php $a=explode('-',$vo); echo $a[0] ?>"
            			 	
            			 	onclick="toTheme(<?php $a=explode('-',$vo); echo $a[0] ?>,<?php echo ($k+1); ?>)"
            			 	
            			 	answer="<?php $a=explode('-',$vo); echo $a[1] ?>"
            			 	
            			 	class="<?php $a=explode('-',$vo); echo $a[2]==''?'':($a[2]=='yes'?'bGreen':bRed) ?>"
            			 	
            			 	><?php echo ($k+1); ?></li><?php endif; endforeach; endif; ?>
                        <!-- <li class="bRed">1</li>
                        <li class="bGreen">2</li>                     
                        <li class="bGreen">20</li> -->
                    </ul>
                 </div>
                    
                <div class="number-main">
                    <div class="title">判断题（共40题、共40分）</div>
                        <ul>
              <?php if(is_array($questionArr)): foreach($questionArr as $k=>$vo): ?><!-- <li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+1); ?>)" answer="" class="" ><?php echo ($k+1); ?></li> -->
            		<?php $_RANGE_VAR_=explode(',',"20,59");if($k>= $_RANGE_VAR_[0] && $k<= $_RANGE_VAR_[1]):?><li id="<?php $a=explode('-',$vo); echo $a[0] ?>"
            			 	
            			 	onclick="toTheme(<?php $a=explode('-',$vo); echo $a[0] ?>,<?php echo ($k+1); ?>)"
            			 	
            			 	answer="<?php $a=explode('-',$vo); echo $a[1] ?>"
            			 	
            			 	class="<?php $a=explode('-',$vo); echo $a[2]==''?'':($a[2]=='yes'?'bGreen':bRed) ?>"
            			 	
            			 	><?php echo ($k+1); ?></li><?php endif; endforeach; endif; ?>
                            <!-- <li>1</li>
                            <li>2</li>
                            <li>3</li>                       
                            <li>40</li> -->
                        </ul>
               </div>
                    
                <div class="number-main">
                    <div class="title">单选题（共40题、共40分）</div>
                        <ul>
              <?php if(is_array($questionArr)): foreach($questionArr as $k=>$vo): ?><!-- <li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+1); ?>)" answer="" class="" ><?php echo ($k+1); ?></li> -->
            		<?php $_RANGE_VAR_=explode(',',"60,99");if($k>= $_RANGE_VAR_[0] && $k<= $_RANGE_VAR_[1]):?><li id="<?php $a=explode('-',$vo); echo $a[0] ?>"
            			 	
            			 	onclick="toTheme(<?php $a=explode('-',$vo); echo $a[0] ?>,<?php echo ($k+1); ?>)"
            			 	
            			 	answer="<?php $a=explode('-',$vo); echo $a[1] ?>"
            			 	
            			 	class="<?php $a=explode('-',$vo); echo $a[2]==''?'':($a[2]=='yes'?'bGreen':bRed) ?>"
            			 	
            			 	><?php echo ($k+1); ?></li><?php endif; endforeach; endif; ?>
                            <!-- <li>1</li>
                            <li>2</li>                      
                            <li>39</li>
                            <li>40</li> -->
                        </ul>
               </div>
               
               
               <?php else: ?>
               
               
               <div class="number-main">
                    <div class="title">判断题（共50题、共50分）</div>
                        <ul>
              <?php if(is_array($questionArr)): foreach($questionArr as $k=>$vo): ?><!-- <li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+1); ?>)" answer="" class="" ><?php echo ($k+1); ?></li> -->
            		<?php $_RANGE_VAR_=explode(',',"0,49");if($k>= $_RANGE_VAR_[0] && $k<= $_RANGE_VAR_[1]):?><li id="<?php $a=explode('-',$vo); echo $a[0] ?>"
            			 	
            			 	onclick="toTheme(<?php $a=explode('-',$vo); echo $a[0] ?>,<?php echo ($k+1); ?>)"
            			 	
            			 	answer="<?php $a=explode('-',$vo); echo $a[1] ?>"
            			 	
            			 	class="<?php $a=explode('-',$vo); echo $a[2]==''?'':($a[2]=='yes'?'bGreen':bRed) ?>"
            			 	
            			 	><?php echo ($k+1); ?></li><?php endif; endforeach; endif; ?>
                            <!-- <li>1</li>
                            <li>2</li>
                            <li>3</li>                       
                            <li>40</li> -->
                        </ul>
               </div>
                    
                <div class="number-main">
                    <div class="title">单选题（共50题、共50分）</div>
                        <ul>
              <?php if(is_array($questionArr)): foreach($questionArr as $k=>$vo): ?><!-- <li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+1); ?>)" answer="" class="" ><?php echo ($k+1); ?></li> -->
            		<?php $_RANGE_VAR_=explode(',',"50,99");if($k>= $_RANGE_VAR_[0] && $k<= $_RANGE_VAR_[1]):?><li id="<?php $a=explode('-',$vo); echo $a[0] ?>"
            			 	
            			 	onclick="toTheme(<?php $a=explode('-',$vo); echo $a[0] ?>,<?php echo ($k+1); ?>)"
            			 	
            			 	answer="<?php $a=explode('-',$vo); echo $a[1] ?>"
            			 	
            			 	class="<?php $a=explode('-',$vo); echo $a[2]==''?'':($a[2]=='yes'?'bGreen':bRed) ?>"
            			 	
            			 	><?php echo ($k+1); ?></li><?php endif; endforeach; endif; ?>
                            <!-- <li>1</li>
                            <li>2</li>                      
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
                        <li><a href="/jx/index.php/Home/Index/record?apply_detail_type=<?php echo ($apply_detail_type); ?>">考试记录</a></li>
                        <li><a href="/jx/index.php/Home/Index/quit">注销</a></li>
                    </ul>
                    <ul class="header-info">
                        <li>当前考场:<B>黄石市顺通驾校</B></li>
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
                        <!-- <button class="submit" onclick="prevTheme()">上一题(←)</button>
                        <button class="submit" onclick="nextTheme()">下一题(→)</button>
                        <button class="submit" onclick="submitTest()">计算器（C）</button>
                        <button class="submit">帮助（F1）</button>
                        <button class="submit" onclick="signYellow()">标记（F2）</button> -->
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
                    

</body>
</html>