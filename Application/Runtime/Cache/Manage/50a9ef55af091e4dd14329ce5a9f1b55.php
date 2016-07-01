<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>黄石市顺通汽车驾驶员培训学校</title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
     <script type="text/javascript" src="/jx/Public/js/jquery.js"></script>
    <script type="text/javascript" src="/jx/Public/js/DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="/jx/Public/js/sysGeneral.js"></script>
    <script type="text/javascript" src="/jx/Public/js/systemUtils.js"></script>
</head>
<script type="text/javascript">
$(function(){
	
});

//添加
function selAdd(name,kind){
	var name=$('#'+name).val();
	location.href='/jx/index.php/Manage/Dictionary/insert?name='+name+'&kind='+kind;
}


//删除
function selDelete(name){
	var id=$("#"+name).val();
	if(confirm("确定删除吗？")){
	    location.href='/jx/index.php/Manage/Dictionary/delete?id='+id;
	}
}

</script>
<body>
     <!-- 顶部固定条 -->
    <div class="navbar">
    	<div class="navbar-inner">
                <ul class="nav">
                    <li>
                            <img src="/jx/Public/images/icon/user-white.png"/><?php echo ($_SESSION['snUser']['cnname']); ?>
                    </li>
                    <li><a href="/jx/index.php/Manage/User/updatePwdUI">修改密码</a></li>
                    <li><a href="/jx/index.php/Manage/Login/quit">注销</a></li>
                </ul>
        	<div class="brand"><?php echo C('MANAGE_TITLE');?></div>
        </div>
    </div>

    <div class="header">
        <div class="page-title">
        		<!-- 权限控制 -->
    <?php if(in_array(("学员信息管理"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/Index/index">学员信息管理</a>
	<?php endif; ?>
	
    <!-- <?php if(in_array(("基础数据维护"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/Dictionary/dictionary">基础数据维护</a>
	<?php endif; ?> -->
	
    <?php if(in_array(("用户管理"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/User/userMain">用户管理</a>
	<?php endif; ?>
	
    <?php if(in_array(("查询统计"), is_array($_SESSION['snUser']['power'])?$_SESSION['snUser']['power']:explode(',',$_SESSION['snUser']['power']))): ?>
		<a href="/jx/index.php/Manage/Select/select">查询统计</a>
	<?php endif; ?>
	      <!-- 权限控制结束 -->
        </div>
    </div> 
    
  	<div class="content">
        <div class="container-fluid">
                     
        <!-- <div class="btn-toolbar">
            <button class="btn btn-primary"><img src="images/icon/folder__simple.png"/> 保存</button> 
        </div> -->
        
<div class="well">
        <div class="block-body">
        <fieldset>
        <legend> <small>学历</small></legend>
            <label for="diploma">新增字段：</label>
            <input name="education_name" type="text" id="education_name"/>
            <a href="javascript:selAdd('education_name','学历')">添加</a>
            
                &nbsp;&nbsp;&nbsp;&nbsp;
                <select name="education" id="education">
                      <?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "学历"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                          <!-- <option>研究生</option>
                          <option>本科</option>
                          <option>专科</option>
                          <option>高中</option>
                          <option>初中</option>
                          <option>小学</option>
                          <option>其它</option> -->
                </select>
                <a href="javascript:selDelete('education')">删除</a>
        </fieldset>
        </div>
        
       <div class="block-body">
        <fieldset>
        <legend> <small>证件类型</small></legend>
           <label for="models"> 新增字段：</label>
           <input name="card_type_name" type="text" id="card_type_name"/>
           <a href="javascript:selAdd('card_type_name','证件类型')">添加</a>
            
                &nbsp;&nbsp;&nbsp;&nbsp;
                <select name="card_type" id="card_type">
                      <?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "证件类型"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                </select>
                 <a href="javascript:selDelete('card_type')">删除</a>
        </fieldset>
        </div>
        
       <div class="block-body">
        <fieldset>
        <legend> <small>驾驶证准驾车型</small></legend>
           <label for="models"> 新增字段：</label>
           <input name="drive_allow_car_name" type="text" id="drive_allow_car_name"/>
           <a href="javascript:selAdd('drive_allow_car_name','驾驶证准驾车型')">添加</a>
            
                &nbsp;&nbsp;&nbsp;&nbsp;
           
                <select name="drive_allow_car" id="drive_allow_car">
                        <?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "驾驶证准驾车型"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
               <a href="javascript:selDelete('drive_allow_car')">删除</a>
        </fieldset>
        </div>
        
       <div class="block-body">
        <fieldset>
        <legend> <small>培训单位</small></legend>
           <label for="models"> 新增字段：</label>
           <input name="train_unit_name" type="text" id="train_unit_name"/>
           <a href="javascript:selAdd('train_unit_name','培训单位')">添加</a>
            
                &nbsp;&nbsp;&nbsp;&nbsp;
           
                <select name="train_unit" id="train_unit">
                         <?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "培训单位"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
               <a href="javascript:selDelete('train_unit')">删除</a>
        </fieldset>
        </div>
        
       <div class="block-body">
        <fieldset>
        <legend> <small>考点</small></legend>
           <label for="models"> 新增字段：</label>
           <input name="exam_address_name" type="text" id="exam_address_name"/>
           <a href="javascript:selAdd('exam_address_name','考点')">添加</a>
            
                &nbsp;&nbsp;&nbsp;&nbsp;
           
                <select name="exam_address" id="exam_address">
                         <?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "考点"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
               <a href="javascript:selDelete('exam_address')">删除</a>
        </fieldset>
        </div>
        
       <div class="block-body">
        <fieldset>
        <legend> <small>报考类别</small></legend>
           <label for="models"> 新增字段：</label>
           <input name="apply_type_name" type="text" id="apply_type_name"/>
           <a href="javascript:selAdd('apply_type_name','报考类别')">添加</a>
            
                &nbsp;&nbsp;&nbsp;&nbsp;
           
                <select name="apply_type" id="apply_type">
                         <?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "报考类别"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
               <a href="javascript:selDelete('apply_type')">删除</a>
        </fieldset>
        </div>
        
       <div class="block-body">
        <fieldset>
        <legend> <small>报考细分类别（<font color="red">模式考试出题依据，请勿随意增删</font>）</small></legend>
           <label for="models"> 新增字段：</label>
           <input name="apply_detail_type_name" type="text" id="apply_detail_type_name"/>
           <a href="javascript:selAdd('apply_detail_type_name','报考细分类别')">添加</a>
            
                &nbsp;&nbsp;&nbsp;&nbsp;
           
                <select name="apply_detail_type" id="apply_detail_type">
                         <?php if(is_array($zidianList)): foreach($zidianList as $key=>$vo): if(($vo["kind"]) == "报考细分类别"): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
               <a href="javascript:selDelete('apply_detail_type')">删除</a>
        </fieldset>
        </div>
       <!-- <div class="block-body">
        <fieldset>
        <legend> <small>申请种类设置</small></legend>
            <label for="type">新增字段：</label>
            <input name="type" type="text" id="type"/>
            
                <select name="select" id="type">
                          <option>小车</option>
                          <option>货车</option>
                          <option>客车</option>
                        </select>
        </fieldset>
        </div>
       <div class="block-body">
        <fieldset>
        <legend> <small>材料清单设置</small></legend>
            <p>
                <label for="bill">新增字段：</label>
                <input name="type" type="text" id="bill"/>
            </p>
            
                        <span class="col-xs-4">身份证号原件</span>
                        <span class="col-xs-4">身份证明复印件</span>
                        <span class="col-xs-4">驾驶证原件</span>
                        <span class="col-xs-4">原从业资格证原件</span>
                        <span class="col-xs-4">原从业资格证复印件</span>
                        <span class="col-xs-4">学历证明</span>
                        <span class="col-xs-4">驾驶证复印件</span>
                        <span class="col-xs-4">无重大以上责任事故记录证明</span>
        </fieldset>
        </div> -->
        
</div>
              
    </div>
    </div>

</body>
</html>