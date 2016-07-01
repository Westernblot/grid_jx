<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>配置用户权限</title>
<link href="/grid_lyj/Public/css/default.css" rel="stylesheet" type="text/css" />
<link href="/grid_lyj/Public/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/grid_lyj/Public/js/goaler.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/jquery.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/sysGeneral.js"></script>
<script type="text/javascript" src="/grid_lyj/Public/js/systemUtils.js"></script>

</head>
<script type="text/javascript">


    function selectAll(checkedValue){
	   $("input[type=checkbox]").attr("checked", checkedValue);
    }

	function doChecked( liID, checkedValue ){
		// 当前点击的checkbox元素所在的li元素
		var jLi = $("#" + liID);

		// 选中所有的直属下级。（children()方法是筛选下一级，find()是筛选所有后代）
		jLi.children("ul").find("input[type=checkbox]").attr("checked", checkedValue);
		
		// 选中或取消选中直属上级
		if( checkedValue ){ // checkedValue是boolean型，表示是否选中了当前复选框
			// 如果当前是选中，则选中所有的直属上级
			jLi.parents("li").children("input[type=checkbox]").attr("checked", checkedValue);
		}else{
			// 如果当前是取消选中，并且同级中没有被选中的项，则也取消上级的选中状态
			var jCheckedSibingCB = jLi.siblings("li").children("input[type=checkbox]:checked");
			if(jCheckedSibingCB.size() == 0){
				var jCheckboxInput = jLi.parent("ul").prev("label").prev("input[type=checkbox]");
				jCheckboxInput.attr("checked", checkedValue);
				
				// 递归操作每一层直属上级
				var jParentLi = jCheckboxInput.parent("li");
				if(jParentLi.size() > 0){
					doChecked(jParentLi.attr("id"), checkedValue);
				}
			}
		}
	} 
	
function doSave(){
	$.ajax({
		url:'mUserUpdate.do',
		data:$('#form1').serialize(),
		dataType:'json',
		type:'post',
		success:function(data){
			if(data>0){
				alert("操作成功");
			    location.href='mUserMain.do';
			}else{
				alert("操作失败");
			}
		},
		error:function(){
			alert("系统错误");
		}
	});
}

function doShow(obj){
	var ul=$(obj).parent().find('#ul_1');
	var style=$(ul).attr('style');
	if(style=='display:none'){
		$(obj).text("-");
		$(ul).attr('style','display:block');
	}else{
		$(obj).text("+");
	    $(ul).attr('style','display:none');
	}
}


//保存
function save(){
	$('#form1').submit();
}


</script>
<body>
<div id="div_right">
	<div class="right_top">
					<span> 配置用户权限</span>
				</div>
				<div class="title">
					<a href="javascript:save()"  class="btn btn-green">保存</a> 
					
					<a href="javascript:history.back();" class="btn btn-default" >返回</a>
					
				</div>
				
<div class="tree" align="center" >

<form action="/grid_lyj/index.php/Admin/User/setPower" id="form1" method="post">
<input type="hidden" name="id" value="<?php echo ($user["id"]); ?>">
<input type="hidden" name="power[]" value="0">
<table width="60%" border="0" class="mtable" >
<caption><h4>正在为  <?php echo ($user["cnname"]); ?> 设置权限</h4></caption>
      <thead>
						<tr>
							<td style="padding-left: 10px;">
								<input type="checkbox" id="cbSelectAll" onClick="selectAll(this.checked)"/>
								<label for="cbSelectAll">全选</label>
							</td>
						</tr>
	 </thead>

<tr>
<td style="padding-left: 30px;">
<div >
<ul>
      <?php if(is_array($menuList)): foreach($menuList as $key=>$base): if($base['pid'] == 0): ?><li id="li_<?php echo ($base["id"]); ?>" >
      <a href="javascript:#" onclick="doShow(this)">-</a>
      <input type="checkbox" id="cb_<?php echo ($base["id"]); ?>" name="power[]" value="<?php echo ($base["id"]); ?>" onclick='doChecked("li_<?php echo ($base["id"]); ?>", this.checked)'
      <?php if(in_array(($base["id"]), is_array($user["power"])?$user["power"]:explode(',',$user["power"]))): ?>checked<?php endif; ?>
      >
      <label for="cb_<?php echo ($base["id"]); ?>"><?php echo ($base["name"]); ?></label>
         <ul id="ul_1">
         <?php if(is_array($menuList)): foreach($menuList as $key=>$sub): if($base['id'] == $sub['pid']): ?><li id="li_<?php echo ($sub["id"]); ?>">&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="cb_<?php echo ($sub["id"]); ?>" name="power[]" value="<?php echo ($sub["id"]); ?>" onclick='doChecked("li_<?php echo ($sub["id"]); ?>", this.checked)'
         <?php if(in_array(($sub["id"]), is_array($user["power"])?$user["power"]:explode(',',$user["power"]))): ?>checked<?php endif; ?>
         >
         <label for='cb_<?php echo ($sub["id"]); ?>'><?php echo ($sub["name"]); ?></label></li><?php endif; endforeach; endif; ?>
         </ul>
      </li><?php endif; endforeach; endif; ?> 
</ul>
</div>

</td>
</tr>
</table>
</form>

</div>
				
</div>
</body>
</html>