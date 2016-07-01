<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>黄石市顺通汽车驾驶员培训学校</title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
     <script type="text/javascript" src="/jx/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/jx/Public/js/sysGeneral.js"></script>
    <script type="text/javascript" src="/jx/Public/js/systemUtils.js"></script>
</head>


<script type="text/javascript">
	
	//分类查看
	function selectRecord(){
		$('#form_record').submit();
	}
	
</script>


<body>
    <div class="navbar">
    	<div class="navbar-inner">
                <ul class="nav">
    		   <?php if(empty($_SESSION['snUser'])): ?><li><a href="/jx/index.php/Home/Index/login_result">模拟考试</a></li>
                    <li class="current"><a href="/jx/index.php/Home/Index/record?apply_detail_type=<?php echo ($apply_detail_type); ?>">考试记录</a></li>
                    <li><a href="/jx/index.php/Home/Index/quit">注销</a></li>
                    <?php else: ?>
                    <li><a href="/jx/index.php/Manage/Index/index">返回</a></li><?php endif; ?>
                </ul>
        	<div class="brand"><?php echo C('HOME_TITLE');?></div>
        </div>
    </div>
        
    <div class="content">
      	<div class="container-fluid">
<div class="btn-toolbar">
            <div style=" margin-top:1em;">
            </div>
        </div>
        
        
     <form action="/jx/index.php/Home/Index/record" method="get" id="form_record">    	
     	 <input type="hidden" name="idcard" value="<?php echo ($idcard); ?>" />
     	报考细分类别：
     	 <select name="apply_detail_type" id="apply_detail_type" onchange="selectRecord()">
                         <?php if(is_array($studentList)): foreach($studentList as $key=>$vo): ?><option value="<?php echo ($vo["apply_detail_type"]); ?>"  <?php if(($apply_detail_type) == $vo["apply_detail_type"]): ?>selected<?php endif; ?>   ><?php echo ($vo["apply_detail_type"]); ?></option><?php endforeach; endif; ?>
                        </select>    
     </form>
        
<div class="well">
	<?php if(!empty($_SESSION['snUser'])): ?>姓名：<?php echo ($student["student_name"]); ?>&nbsp;&nbsp;性别：<?php echo ($student["sex"]); ?> &nbsp;&nbsp;身份证号：<?php echo ($student["idcard"]); endif; ?>
	
    <table class="table table-center">
    	<caption></caption>
      <thead>
        <tr>
          <th>ID</th>
          <th>报考细分类别</th>
          <th>考试时间</th>
          <th>考试时长</th>
          <th>分数</th>
          <?php if(empty($_SESSION['snUser'])): ?><th class="span2">操作</th><?php endif; ?>
        </tr>
      </thead>
      <tbody>
      	
      		<?php if(empty($recordList)): ?><tr>
								<td colspan="10" align="center"><font color="red">暂无数据</font></td>
							</tr><?php endif; ?>
						
			<?php if(is_array($recordList)): foreach($recordList as $key=>$vo): ?><tr id="<?php echo ($vo["id"]); ?>">					       
						         <td><?php echo ($vo["id"]); ?></td>
						         <td><?php echo ($vo["apply_detail_type"]); ?></td>
						         <td><?php echo ($vo["exam_date"]); ?></td>
						         <td><?php echo ($vo["cost_time"]); ?></td>
						         <td><?php echo ($vo["score"]); ?></td>					       				 					         
						 <?php if(empty($_SESSION['snUser'])): ?><td>
						          <a href="/jx/index.php/Home/Index/record_exam?id=<?php echo ($vo["id"]); ?>">查看试卷</a>	
						         </td><?php endif; ?>					         					         	
						      </tr><?php endforeach; endif; ?>
          	
      	
        <!-- <tr>
          <td>1</td>
          <td>2015-05-28</td>
          <td>32</td>
          <td>99</td>
          <td>
              <a href="user.html">查看试卷</a>　
              <a href="#">查看错题</a>
          </td>
        </tr> -->
       
      </tbody>
    </table>
</div>
<div class="pagination">
    <?php echo ($page); ?>
</div>         
 
    </div>
   </div> 

</body>
</html>