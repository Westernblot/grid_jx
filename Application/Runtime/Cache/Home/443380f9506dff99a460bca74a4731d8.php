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

		$('#dn').text(student_choose);	
		if(student_choose==data.question.rightanswer){
			 $('#opt').html("回答正确");  
		}else{		
		     $('#opt').html("正确答案是："+data.question.rightanswer);  
		}
	
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
                     </div>
                      <!-- 当前题目 --><input type="hidden" id="currentThemeId" name="currentThemeId" value="<?php echo ($question["id"]); ?>" />
                      <!-- rightanswer --><input type="hidden" id="rightanswer" name="rightanswer" value="<?php echo ($question["rightanswer"]); ?>" />
                </td>
               <td rowspan="2" class="test">
                    <div class="test_main">
                    <div class="test_title"><span id="sp_id">1</span>、<span id="theme"></span></div>
                      
                        <div class="test_choice" id="theme_option">                    	
              
                        	
                        <!-- A、提醒后车以及前车<br/>
                        B、提醒行人 <br/>
                        C、仅提醒后车 <br/>
                        D、仅提醒前车 -->
                        
                        </div>
                    </div>
                    
                    <div class="test_answe">
                    	
                    	 <div class="opt">您的答案：<B class="f-red"><span id="dn"></span></B></div>
                    	
                    <div class="pull-left" id="opt"> <!-- 选项控制 -->
                        	                    	             
                                                
                    </div>
                       
                    </div>
                               
                  
                </td>
            </tr>
           <tr>
             <td class="test_side" valign="bottom">
                <div class="desk_no">查看试卷</div>
             </td>
           </tr>
            <tr><td colspan="2">
             
            	<ul class="question_Number">
                <?php if(is_array($questionArr)): foreach($questionArr as $k=>$vo): ?><!-- <li id="<?php echo ($vo['id']); ?>" onclick="toTheme(<?php echo ($vo['id']); ?>,<?php echo ($k+1); ?>)" answer="" class="" ><?php echo ($k+1); ?></li> -->
            			 	 
            			 <li id="<?php $a=explode('-',$vo); echo $a[0] ?>"
            			 	
            			 	onclick="toTheme(<?php $a=explode('-',$vo); echo $a[0] ?>,<?php echo ($k+1); ?>)"
            			 	
            			 	answer="<?php $a=explode('-',$vo); echo $a[1] ?>"
            			 	
            			 	class="<?php $a=explode('-',$vo); echo $a[2] ?>"
            			 	
            			 	><?php echo ($k+1); ?></li><?php endforeach; endif; ?>
            	</ul>	
            	
           
            
            </td></tr>
        
         </table>
    </div>
    
  
</body>
</html>