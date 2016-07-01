<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>

   
    	<?php if(($student["apply_detail_type"]) == "经营性道路旅客运输驾驶员"): ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">经营性道路客货运输驾驶员从业资格培训申请表</h1><br/><br/>
        <table class="table-print">
                <tr>
                  <td class="tdleft">姓名</td>
                  <td style=" white-space:nowrap">&nbsp;<?php echo ($student["student_name"]); ?></td>
                  <td class="tdnowrap">性别</td>
                  <td>&nbsp;<?php echo ($student["sex"]); ?></td>
                  <td class="tdnowrap">学历</td>
                  <td>&nbsp;<?php echo ($student["education"]); ?></td>
                  <td rowspan="4" width="149"><img src="/jx/Public/images/user.jpg" height="198" width="149"></td>
                </tr>
                <tr>
                  <td class="tdleft">住址</td>
                  <td colspan="3">&nbsp;<?php echo ($student["address"]); ?></td>
                  <td class="tdnowrap">(手机)</td>
                  <td>&nbsp;<?php echo ($student["tel1"]); ?></td>
                
                </tr>
                <tr>
                  <td class="tdleft">工作单位</td>
                  <td colspan="3">&nbsp;<?php echo ($student["work_unit"]); ?></td>
                  <td class="tdnowrap">(电话)</td>
                  <td>&nbsp;<?php echo ($student["tel2"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">身份证号</td>
                  <td colspan="2">&nbsp;<?php echo ($student["idcard"]); ?></td>
                  <td align="center" width="120">培训单位</td>
                  <td colspan="2">&nbsp;<?php echo ($student["train_unit"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">驾驶证准驾车型</td>
                  <td colspan="2">&nbsp;<?php echo ($student["drive_allow_car"]); ?></td>
                  <td align="center" colspan="2">初领驾驶证日期</td>
                  <td colspan="2">&nbsp;<?php echo ($student["first_drive_date"]); ?></td>
                </tr>
                 <tr>
                  <td class="tdleft">报考细分类别</td>
                  <td colspan="6">&nbsp;<?php echo ($student["apply_detail_type"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">原从业证资格证号</td>
                  <td colspan="6">&nbsp;<?php echo ($student["obtain_code"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">申请类别</td>
                  <td colspan="6">&nbsp;<?php echo ($student["apply_category"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">材料清单</td>
                  <td colspan="6" class="table-noborder" height="140">
                  	<table>
                       <tr>
                            <td><label>身份证号原件 <input type="checkbox" name="checkbox1" id="checkbox1"   <?php if(in_array("身份证号原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>身份证明复印件 <input type="checkbox" name="checkbox2" id="checkbox2"  <?php if(in_array("身份证明复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>驾驶证复印件 <input type="checkbox" name="checkbox7" id="checkbox7"  <?php if(in_array("驾驶证复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                          </tr>
                          <tr>
                            <td><label>原从业资格证原件 <input type="checkbox" name="checkbox4" id="checkbox4"  <?php if(in_array("原从业资格证原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>原从业资格证复印件 <input type="checkbox" name="checkbox5" id="checkbox5"  <?php if(in_array("原从业资格证复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>学历证明 <input type="checkbox" name="checkbox6" id="checkbox6"  <?php if(in_array("学历证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                        </tr>
                        <tr>
                            <td><label>驾驶证原件 <input type="checkbox" name="checkbox3" id="checkbox3"  <?php if(in_array("驾驶证原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>无重大以上责任事故记录证明 <input type="checkbox" name="checkbox8" id="checkbox8"  <?php if(in_array("无重大以上责任事故记录证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>居住地证明 <input type="checkbox" name="checkbox9" id="checkbox9"  <?php if(in_array("居住地证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                           </tr>
                       </table>
                  </td>
                </tr>
                <tr>
                  <td class="tdleft">承诺</td>
                  <td colspan="6" class="table-noborder">                    
                    <table>
                        <tr>
                            <td height="90" align="center" colspan="2"> 本人承诺上述所有内容真实、有效、并承担由此产生的法律责任。</td>
                          </tr>
                          <tr>
                            <td height="40" align="center">本人签字：</td>
                            <td>日期：</td>
                        </tr>
                       </table>　　　　　　　　
                  </td>
                </tr>
                </table>
                
                <table class="table-print table-sub">
                    <tr>
                      <td rowspan="5" class="tdleft">培<br/>训<br/>记<br/>录</td>
                      <td colspan="2" align="center">科目</td>
                      <td colspan="2" align="center">考核员</td>
                      <td width="305" align="center">备注 </td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center">理论</td>
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center">安全检视</td>
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2" align="center">旅客急救</td>
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr> 
                    <!-- <tr>
                      <td colspan="2" align="center">轮胎更换</td>
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr> -->
                    <tr>
                      <td colspan="2" align="center">虚拟场景</td>
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="95" align="center">本人签字</td>
                      <td colspan="2">&nbsp;</td>
                      <td width="138" align="center">日期</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                
                <table class="table-print table-sub">
                <tr>
                  <td class="tdleft">道路运输<br/>
                  驾培机构意见</td>
                  <td colspan="6" align="right">（盖章）　　　<br/>　<br/>
                  年　　月　　日　
                  </td>
                </tr>
            </table>
   </div>
</div>   

    

</body>
</html>

      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">道路运输驾驶员客运从业资格培训记录</h1><br/><br/>
        
      <table class="table-print print02">
          <tr>
            <td width="96" class="tdnowrap">培训单位</td>
            <td colspan="5"><h2>　<?php echo C('MANAGE_LOGIN');?></h2></td>
            <td width="96" class="tdnowrap">学期编号</td>
            <td width="172">&nbsp;</td>
          </tr>
          <tr>
            <td class="tdnowrap">学员姓名</td>
            <td width="207">&nbsp;<?php echo ($student["student_name"]); ?></td>
            <td width="34" align="center">性<br/>别</td>
            <td width="81">&nbsp;<?php echo ($student["sex"]); ?></td>
            <td width="89" align="center">身份证号</td>
            <td colspan="3">&nbsp;<?php echo ($student["idcard"]); ?></td>
          </tr>
          <tr>
            <td class="tdnowrap">申请类别</td>
            <td colspan="7"><h2>　旅　客　运　输</h2></td>
          </tr>
          <tr>
            <td class="tdnowrap">培　　训<br/>起止时间</td>
            <td colspan="7">　　　　　　　年　　　　　月　　　　　日至　　　　　月　　　　　　日</td>
          </tr>
          <tr>
            <td colspan="8" class="table-body">
<table>
  <tr>
    <td class="tdnowrap">理论培训<br/>
      课　　时</td>
    <td colspan="2" align="center"><strong>　42　</strong>(课时)</td>
    <td width="56" align="center">学员<br/>签名</td>
    <td width="123" align="center">&nbsp;</td>
    <td width="59" align="center">教员<br/>签名</td>
    <td width="100" align="center">&nbsp;</td>
    <td width="50" align="center">时间</td>
    <td width="120" align="center">　　月　　日</td>
  </tr>
  <tr>
    <td class="tdnowrap">模拟场景<br/>
      培　　训</td>
    <td colspan="2" align="center"><strong>　4　</strong>(课时)</td>
    <td align="center">学员<br/>
      签名</td>
    <td align="center">&nbsp;</td>
    <td align="center">教员<br/>
      签名</td>
    <td align="center">&nbsp;</td>
    <td align="center">时间</td>
    <td align="center">　　月　　日</td>
  </tr>
  <tr>
    <td rowspan="2" class="tdnowrap">专业知识<br/>应　　用</td>
    <td class="other" align="center">安全<br/>检视</td>
    <td align="center"><strong>2</strong>　(课时)</td>
    <td rowspan="2" align="center">学员<br/>
      签名</td>
    <td rowspan="2" align="center">&nbsp;</td>
    <td rowspan="2" align="center">教员<br/>
      签名</td>
    <td rowspan="2" align="center">&nbsp;</td>
    <td rowspan="2" align="center">时间</td>
    <td rowspan="2" align="center">　　月　　日</td>
  </tr>
  <tr>
    <td class="other" align="center">旅客<br/>急救</td>
    <td align="center"><strong>4</strong>　(课时)</td>
  </tr>
</table>
            </td>
          </tr>
          <tr>
            <td class="tdnowrap">培训单位<br/>审核意见</td>
            <td colspan="7" class="table-noborder">
            	<table>
                  <tr>
                      <td height="160">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">
                                  （盖章） 　　　　　　
                                  　<br/>　<br/>
                        年　　月　　日　　
                        </td>
                  </tr>
                 </table>　
            </td>
          </tr>
          <tr>
            <td class="tdnowrap">备　注</td>
            <td colspan="7" height="260">&nbsp;</td>
          </tr>
      </table>
   </div>
</div>   

    

</body>
</html>

      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">道路客货运输驾驶员从业资格培训教学日志</h1><br/>  
     <div class="page-sub">
         <span>NO.</span>
         　括号中标注“（客）”者——仅作为道路旅客运输驾驶员的教学项目或学时。
     </div>
     <div class="Div"> 
      <table class="table-print print03" height="48">
        <tr>
          <td><h3>培训机构名称：<?php echo C('MANAGE_LOGIN');?></h3></td>
          <td><strong>学员姓名：<?php echo ($student["student_name"]); ?></strong></td>
          <td><h3>类别：旅客运输</h3></td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print03"  height="48">
        <tr>
          <td>
       	  <strong>培训目标: </strong>
          树立驾驶员的社会责任，培养驾驶员的职业道德，熟知道路运输驾驶员的行为要求；掌握道路运输从业相关法律、法规和道路运输专业知识；养成安全、文明行车意识、掌握各种环境和条件下安全驾驶、应急处置的方法；了解汽车使用技术知识；掌握汽车常见故障的识别方法；培养专业知识应用能力；</td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print03">
        <tr>
          <td width="9%" rowspan="2" align="center" style=" line-height:28px;"><h3>理<br/>论<br/>知<br/>识</h3>
          学时：<br/>
          42(客)</td>
          <td width="27%" align="center"><h3>教学项目</h3></td>
          <td width="64%" align="center"><h3>教学目标</h3></td>
        </tr>
        <tr>
          <td height="170">1.驾驶员的社会责任、职业<br/>　道德和职业心理<br/>
          2.道路运输从业相关法律、<br/>　法规<br/>
          3.道路运输知识<br/>
          4.安全意识与安全行车<br/>
          5.汽车使用技术
          </td>
          <td>
          	1.树立驾驶员的社会责任，培养驾驶员的职业道德，熟知道路运输<br/>　驾驶的行为要求。了解驾驶员心理健康知识，了解驾驶员心理调<br/>　节方法;<br/>
            2.熟练掌握道路运输相关法律、法规的有关内容；<br/>
            3.掌握道路运输专业知识；<br/>
            4.养成安全、文明行车意识，掌握各种环境和条件下安全驾驶和应<br/>　急处置方法；<br/>
            5.了解汽车使用技术知识
          </td>
        </tr>
        <tr>
          <td colspan="3" class="table-body">
          <table class="table-print">
            <tr>
              <td width="90" align="center">次数/日期</td>
              <td>1/</td>
              <td>2/</td>
              <td>3/</td>
              <td>4/</td>
              <td>5/</td>
              <td>6/</td>
              <td>7/</td>
              <td>8/</td>
            </tr>
            <tr>
              <td align="center">教学项目</td>
              <td align="center">职业道德、法规</td>
              <td align="center">道路运输知识</td>
              <td align="center">安全意识</td>
              <td align="center">汽车技术</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">所用学时</td>
              <td align="center">8</td>
              <td align="center">5</td>
              <td align="center">17</td>
              <td align="center">12</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">学员签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">教练员评<br/>价及签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print03">
        <tr>
          <td width="12%" rowspan="2" align="center" style="line-height:28px;"><h3>应用<br/>能力</h3>
          学时：<br/>
          10(客)</td>
          <td width="19%" align="center"><h3>教学项目</h3></td>
          <td width="69%" align="center"><h3>教学目标</h3></td>
        </tr>
        <tr>
          <td height="155">1.车辆安全检视<br/>
          2.旅客急救(客)<br/>
          3.危险源辨识与防<br/>　御驾驶<br/>
          4.节能驾驶<br/>
          5.综合复习与考核
          </td>
          <td>
          	1.掌握车辆外观、发动机舱、客车车厢(客)、驾驶室内部(货)、发动机起<br/>　动后及行车中、收车后的车辆安全检视内容和方法；<br/>
            2.掌握车辆后轮外侧轮胎的拆卸、安装及千斤顶的使用方法；<br/>
            3.掌握车辆在各种天气条件和道路环境下的危险源辨识与防御性驾驶方<br/>　法；<br/>
            4.掌握车辆运行过程中的节能驾驶要领；<br/>
            5.掌握专业知识应用能力
          </td>
        </tr>
        <tr>
          <td colspan="3" class="table-body">
          <table class="table-print">
            <tr>
              <td width="113" align="center">次数/日期</td>
              <td width="124">1/</td>
              <td width="147">2/</td>
              <td width="147">3/</td>
              <td width="147">4/</td>
              <td width="147">5/</td>
              <td width="57">6/</td>
            </tr>
            <tr>
              <td align="center">教学项目</td>
              <td align="center">安全检视</td>
              <td align="center">旅客急救</td>
              <td align="center">危险知识</td>
              <td align="center">节能驾驶</td>
              <td align="center">综合复习</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">所用学时</td>
              <td align="center">2</td>
              <td align="center">4</td>
              <td align="center">2</td>
              <td align="center">1</td>
              <td align="center">1</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">学员签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">教练员评<br/>价及签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>  
      
      </div>
      <div class="Div">      
      <table class="table-print print03">
        <tr>
          <td colspan="2" height="58">考核意见：
          <p style="text-align:right; margin:0;">考核人签字：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
          </td>
        </tr>
        <tr>
          <td width="180" height="30">培训机构审核意见：</td>
          <td style="vertical-align:bottom;" align="right">(盖章)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
      </table>
      </div>
   </div>
</div>   

    

</body>
</html><?php endif; ?>
    	
    	<?php if(($student["apply_detail_type"]) == "经营性道路货物运输驾驶员"): ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">经营性道路客货运输驾驶员从业资格培训申请表</h1><br/><br/>
        <table class="table-print">
                <tr>
                  <td class="tdleft">姓名</td>
                  <td style=" white-space:nowrap">&nbsp;<?php echo ($student["student_name"]); ?></td>
                  <td class="tdnowrap">性别</td>
                  <td>&nbsp;<?php echo ($student["sex"]); ?></td>
                  <td class="tdnowrap">学历</td>
                  <td>&nbsp;<?php echo ($student["education"]); ?></td>
                  <td rowspan="4" width="149"><img src="<?php echo ((isset($student["imgurl"]) && ($student["imgurl"] !== ""))?($student["imgurl"]):'/jx/Public/images/user.jpg'); ?>" height="198" width="149"></td>
                </tr>
                <tr>
                  <td class="tdleft">住址</td>
                  <td colspan="3">&nbsp;<?php echo ($student["address"]); ?></td>
                  <td class="tdnowrap">(手机)</td>
                  <td>&nbsp;<?php echo ($student["tel1"]); ?></td>
                 
                </tr>
                <tr>
                  <td class="tdleft">工作单位</td>
                  <td colspan="3">&nbsp;<?php echo ($student["work_unit"]); ?></td>
                   <td class="tdnowrap">(电话)</td>
                  <td>&nbsp;<?php echo ($student["tel2"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">身份证号</td>
                  <td colspan="2">&nbsp;<?php echo ($student["idcard"]); ?></td>
                  <td align="center" width="120">培训单位</td>
                  <td colspan="2">&nbsp;<?php echo ($student["train_unit"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">驾驶证准驾车型</td>
                  <td colspan="2">&nbsp;<?php echo ($student["drive_allow_car"]); ?></td>
                  <td align="center" colspan="2">初领驾驶证日期</td>
                  <td colspan="2">&nbsp;<?php echo ($student["first_drive_date"]); ?></td>
                </tr>
                 <tr>
                  <td class="tdleft">报考细分类别</td>
                  <td colspan="6">&nbsp;<?php echo ($student["apply_detail_type"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">原从业证资格证号</td>
                  <td colspan="6">&nbsp;<?php echo ($student["obtain_code"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">申请类别</td>
                  <td colspan="6">&nbsp;<?php echo ($student["apply_category"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">材料清单</td>
                  <td colspan="6" class="table-noborder" height="140">
                  	<table>
                        <tr>
                            <td><label>身份证号原件 <input type="checkbox" name="checkbox1" id="checkbox1"   <?php if(in_array("身份证号原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>身份证明复印件 <input type="checkbox" name="checkbox2" id="checkbox2"  <?php if(in_array("身份证明复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>驾驶证复印件 <input type="checkbox" name="checkbox7" id="checkbox7"  <?php if(in_array("驾驶证复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                          </tr>
                          <tr>
                            <td><label>原从业资格证原件 <input type="checkbox" name="checkbox4" id="checkbox4"  <?php if(in_array("原从业资格证原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>原从业资格证复印件 <input type="checkbox" name="checkbox5" id="checkbox5"  <?php if(in_array("原从业资格证复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>学历证明 <input type="checkbox" name="checkbox6" id="checkbox6"  <?php if(in_array("学历证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                        </tr>
                        <tr>
                            <td><label>驾驶证原件 <input type="checkbox" name="checkbox3" id="checkbox3"  <?php if(in_array("驾驶证原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>无重大以上责任事故记录证明 <input type="checkbox" name="checkbox8" id="checkbox8"  <?php if(in_array("无重大以上责任事故记录证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>居住地证明 <input type="checkbox" name="checkbox9" id="checkbox9"  <?php if(in_array("居住地证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                           </tr>
                       </table>
                  </td>
                </tr>
                <tr>
                  <td class="tdleft">承诺</td>
                  <td colspan="6" class="table-noborder">                    
                    <table>
                        <tr>
                            <td height="90" align="center" colspan="2"> 本人承诺上述所有内容真实、有效、并承担由此产生的法律责任。</td>
                          </tr>
                          <tr>
                            <td height="40" align="center">本人签字：</td>
                            <td>日期：</td>
                        </tr>
                       </table>　　　　　　　　
                  </td>
                </tr>
                </table>
                
                <table class="table-print table-sub">
                    <tr>
                      <td rowspan="5" class="tdleft">培<br/>训<br/>记<br/>录</td>
                      <td colspan="2" align="center">科目</td>
                      <td colspan="2" align="center">考核员</td>
                      <td width="210" align="center">备注</td>
                    </tr>
                    <tr>
                      <td align="center" colspan="2">理论</td>
                      <!-- <td align="center">&nbsp;</td> -->
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center" colspan="2">安全检视</td>
                      <!-- <td align="center">&nbsp;</td> -->
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <!-- <tr>
                      <td align="center">旅客急救</td>
                      <td align="center">&nbsp;</td>
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr> -->
                    <tr>
                      <td align="center" colspan="2">轮胎更换</td>
                      <!-- <td align="center">&nbsp;</td> -->
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="center" colspan="2">虚拟场景</td>
                      <!-- <td align="center">&nbsp;</td> -->
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="95" align="center">本人签字</td>
                      <td colspan="2">&nbsp;</td>
                      <td width="180" align="center">日期</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                
                <table class="table-print table-sub">
                <tr>
                  <td class="tdleft">道路运输<br/>驾培机构意见</td>
                  <td colspan="6" align="right">（盖章）　　　<br/>　<br/>
                  年　　月　　日　
                  </td>
                </tr>
            </table>
   </div>
</div>   

    

</body>
</html>

      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">道路运输驾驶员货运从业资格培训记录</h1><br/><br/>
        
      <table class="table-print print02">
          <tr>
            <td width="96" class="tdnowrap">培训单位</td>
            <td colspan="5"><h2><?php echo C('MANAGE_LOGIN');?></h2></td>
            <td width="96" class="tdnowrap">学期编号</td>
            <td width="172">&nbsp;</td>
          </tr>
          <tr>
            <td class="tdnowrap">学员姓名</td>
            <td width="207">&nbsp;<?php echo ($student["student_name"]); ?></td>
            <td width="34" align="center">性<br/>别</td>
            <td width="81">&nbsp;<?php echo ($student["sex"]); ?></td>
            <td width="89" align="center">身份证号</td>
            <td colspan="3">&nbsp;<?php echo ($student["idcard"]); ?></td>
          </tr>
          <tr>
            <td class="tdnowrap">申请类别</td>
            <td colspan="7"><h2>货　物　运　输</h2></td>
          </tr>
          <tr>
            <td class="tdnowrap">培　　训<br/>起止时间</td>
            <td colspan="7">　　　　　　　年　　　　　月　　　　　日至　　　　　月　　　　　　日</td>
          </tr>
          <tr>
            <td colspan="8" class="table-body">
<table>
  <tr>
    <td class="tdnowrap">理论培训<br/>
      课　　时</td>
    <td colspan="2" align="center"><strong>　48　</strong>(课时)</td>
    <td width="56" align="center">学员<br/>签名</td>
    <td width="123" align="center">&nbsp;</td>
    <td width="59" align="center">教员<br/>签名</td>
    <td width="100" align="center">&nbsp;</td>
    <td width="50" align="center">时间</td>
    <td width="120" align="center">　　月　　日</td>
  </tr>
  <tr>
    <td class="tdnowrap">模拟场景<br/>
      培　　训</td>
    <td colspan="2" align="center"><strong>　4　</strong>(课时)</td>
    <td align="center">学员<br/>
      签名</td>
    <td align="center">&nbsp;</td>
    <td align="center">教员<br/>
      签名</td>
    <td align="center">&nbsp;</td>
    <td align="center">时间</td>
    <td align="center">　　月　　日</td>
  </tr>
  <tr>
    <td rowspan="2" class="tdnowrap">专业知识<br/>应　　用</td>
    <td style="padding:13px 8px;" align="center">安全<br/>检视</td>
    <td align="center"><strong>2</strong>　(课时)</td>
    <td rowspan="2" align="center">学员<br/>
      签名</td>
    <td rowspan="2" align="center">&nbsp;</td>
    <td rowspan="2" align="center">教员<br/>
      签名</td>
    <td rowspan="2" align="center">&nbsp;</td>
    <td rowspan="2" align="center">时间</td>
    <td rowspan="2" align="center">　　月　　日</td>
  </tr>
  <tr>
    <td style="padding:13px 8px;" align="center">轮胎<br/>更换</td>
    <td align="center"><strong>2</strong>　(课时)</td>
  </tr>
</table>
            </td>
          </tr>
          <tr>
            <td class="tdnowrap">培训单位<br/>审核意见</td>
            <td colspan="7" class="table-noborder">
            	<table>
                  <tr>
                      <td height="160">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">
                                  （盖章） 　　　　　　
                                  　<br/>　<br/>
                        年　　月　　日　　
                        </td>
                  </tr>
                 </table>　
            </td>
          </tr>
          <tr>
            <td class="tdnowrap">备　注</td>
            <td colspan="7" height="260">&nbsp;</td>
          </tr>
      </table>
   </div>
</div>   

    

</body>
</html>

      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">道路客货运输驾驶员从业资格培训教学日志</h1><br/><br/>
        
     <div class="Div">      
      <table class="table-print print03" height="48">
        <tr>
          <td><h3>培训机构名称：<?php echo C('MANAGE_LOGIN');?></h3></td>
          <td><strong>学员姓名：<?php echo ($student["student_name"]); ?></strong></td>
          <td><h3>类别：货物运输</h3></td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print03"  height="48">
        <tr>
          <td>
       	  <strong>培训目标: </strong>
          树立驾驶员的社会责任，培养驾驶员的职业道德，熟知道路运输驾驶员的行为要求；掌握道路运输从业相关法律、法规和道路运输专业知识；养成安全、文明行车意识、掌握各种环境和条件下安全驾驶、应急处置的方法；了解汽车使用技术知识；掌握汽车常见故障的识别方法；培养专业知识应用能力；</td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print03">
        <tr>
          <td width="9%" rowspan="2" align="center" style=" line-height:28px;"><h3>理<br/>论<br/>知<br/>识</h3>
          学时：<br/>48(货)</td>
          <td width="26%" align="center"><h3>教学项目</h3></td>
          <td width="65%" align="center"><h3>教学目标</h3></td>
        </tr>
        <tr>
          <td height="170">1.驾驶员的社会责任、职业道德和职业心理<br/>
          2.道路运输从业相关法律、法规<br/>
          3.道路运输知识<br/>
          4.安全意识与安全行车<br/>
          5.汽车使用技术
          </td>
          <td>
          	1.树立驾驶员的社会责任，培养驾驶员的职业道德，熟知道路运输驾驶的行为要求。了解驾驶员心理健康知识，了解驾驶员心理调节方法;<br/>
            2.熟练掌握道路运输相关法律、法规的有关内容；<br/>
            3.掌握道路运输专业知识；<br/>
            4.养成安全、文明行车意识，掌握各种环境和条件下安全驾驶和应急处置方法；<br/>
            5.了解汽车使用技术知识
          </td>
        </tr>
        <tr>
          <td colspan="3" class="table-body">
          <table class="table-print">
            <tr>
              <td width="90" align="center">次数/日期</td>
              <td>1/</td>
              <td>2/</td>
              <td>3/</td>
              <td>4/</td>
              <td>5/</td>
              <td>6/</td>
              <td>7/</td>
              <td>8/</td>
            </tr>
            <tr>
              <td align="center">教学项目</td>
              <td align="center">职业道德、法规</td>
              <td align="center">道路运输知识</td>
              <td align="center">安全意识</td>
              <td align="center">汽车技术</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">所用学时</td>
              <td align="center">10</td>
              <td align="center">10</td>
              <td align="center">16</td>
              <td align="center">12</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">学员签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">教练员评<br/>价及签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print03">
        <tr>
          <td width="12%" rowspan="2" align="center" style="line-height:28px;"><h3>应用<br/>能力</h3>
          学时：<br/>8(货)</td>
          <td width="19%" align="center"><h3>教学项目</h3></td>
          <td width="69%" align="center"><h3>教学目标</h3></td>
        </tr>
        <tr>
          <td height="155">1.车辆安全检视<br/>
          2.轮胎更换(货)<br/>
          3.危险源辨识与防御驾驶<br/>
          4.节能驾驶<br/>
          5.综合复习与考核
          </td>
          <td>
          	1.掌握车辆外观、发动机舱、客车车厢(客)、驾驶室内部(货)、发动机起动后及行车中、收车后的车辆安全检视内容和方法；<br/>
            2.掌握车辆后轮外侧轮胎的拆卸、安装及千斤顶的使用方法；<br/>
            3.掌握车辆在各种天气条件和道路环境下的危险源辨识与防御性驾驶方法；<br/>
            4.掌握车辆运行过程中的节能驾驶要领；<br/>
            5.掌握专业知识应用能力
          </td>
        </tr>
        <tr>
          <td colspan="3" class="table-body">
          <table class="table-print">
            <tr>
              <td width="113" align="center">次数/日期</td>
              <td width="124">1/</td>
              <td width="147">2/</td>
              <td width="147">3/</td>
              <td width="147">4/</td>
              <td width="147">5/</td>
              <td width="57">6/</td>
            </tr>
            <tr>
              <td align="center">教学项目</td>
              <td align="center">安全检视</td>
              <td align="center">轮胎更换</td>
              <td align="center">危险知识</td>
              <td align="center">节能驾驶</td>
              <td align="center">综合复习</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">所用学时</td>
              <td align="center">2</td>
              <td align="center">2</td>
              <td align="center">2</td>
              <td align="center">1</td>
              <td align="center">1</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">学员签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">教练员评<br/>价及签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>  
      
      </div>
      <div class="Div">      
      <table class="table-print print03">
        <tr>
          <td colspan="2" height="58">考核意见：
          <p style="text-align:right; margin:0;">考核人签字：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
          </td>
        </tr>
        <tr>
          <td width="180" height="30">培训机构审核意见：</td>
          <td style="vertical-align:bottom;" align="right">(盖章)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
      </table>
      </div>
   </div>
</div>   

    

</body>
</html><?php endif; ?>
    	
    	<?php if(($student["apply_detail_type"]) == "道路危险货物运输驾驶人员"): ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">经营性道路危货运输从业资格培训申请表</h1><br/><br/>
        <table class="table-print table-fx">
                <tr>
                  <td class="tdleft">姓名</td>
                  <td style=" white-space:nowrap">&nbsp;<?php echo ($student["student_name"]); ?></td>
                  <td class="tdnowrap">性别</td>
                  <td>&nbsp;<?php echo ($student["sex"]); ?></td>
                  <td class="tdnowrap">学历</td>
                  <td>&nbsp;<?php echo ($student["education"]); ?></td>
                  <td rowspan="4" width="149"><img src="<?php echo ((isset($student["imgurl"]) && ($student["imgurl"] !== ""))?($student["imgurl"]):'/jx/Public/images/user.jpg'); ?>" height="198" width="149"></td>
                </tr>
                <tr>
                  <td class="tdleft">住址</td>
                  <td colspan="3">&nbsp;<?php echo ($student["address"]); ?></td>
                  <td class="tdnowrap">(手机)</td>
                  <td>&nbsp;<?php echo ($student["tel1"]); ?></td>
                
                </tr>
                <tr>
                  <td class="tdleft">工作单位</td>
                  <td colspan="3">&nbsp;<?php echo ($student["work_unit"]); ?></td>
                    <td class="tdnowrap">(电话)</td>
                  <td>&nbsp;<?php echo ($student["tel2"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">身份证号</td>
                  <td colspan="2">&nbsp;<?php echo ($student["idcard"]); ?></td>
                  <td align="center" width="120">培训单位</td>
                  <td colspan="2">&nbsp;<?php echo ($student["train_unit"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">驾驶证准驾车型</td>
                  <td colspan="2">&nbsp;<?php echo ($student["drive_allow_car"]); ?></td>
                  <td align="center" colspan="2">初领驾驶证日期</td>
                  <td colspan="2">&nbsp;<?php echo ($student["first_drive_date"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">报考细分类别</td>
                  <td colspan="6">&nbsp;<?php echo ($student["apply_detail_type"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">原从业证资格证号</td>
                  <td colspan="6">&nbsp;<?php echo ($student["obtain_code"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">申请类别</td>
                  <td colspan="6">&nbsp;<?php echo ($student["apply_category"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">材料清单</td>
                  <td colspan="6" class="table-check" height="140">
                  	<table>
                        <tr>
                            <td><label>身份证号原件 <input type="checkbox" name="checkbox1" id="checkbox1"   <?php if(in_array("身份证号原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>身份证明复印件 <input type="checkbox" name="checkbox2" id="checkbox2"  <?php if(in_array("身份证明复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>驾驶证复印件 <input type="checkbox" name="checkbox7" id="checkbox7"  <?php if(in_array("驾驶证复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                          </tr>
                          <tr>
                            <td><label>原从业资格证原件 <input type="checkbox" name="checkbox4" id="checkbox4"  <?php if(in_array("原从业资格证原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>原从业资格证复印件 <input type="checkbox" name="checkbox5" id="checkbox5"  <?php if(in_array("原从业资格证复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>学历证明 <input type="checkbox" name="checkbox6" id="checkbox6"  <?php if(in_array("学历证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                        </tr>
                        <tr>
                            <td><label>驾驶证原件 <input type="checkbox" name="checkbox3" id="checkbox3"  <?php if(in_array("驾驶证原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>无重大以上责任事故记录证明 <input type="checkbox" name="checkbox8" id="checkbox8"  <?php if(in_array("无重大以上责任事故记录证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>居住地证明 <input type="checkbox" name="checkbox9" id="checkbox9"  <?php if(in_array("居住地证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                           </tr>
                       </table>
                  </td>
                </tr>
                <tr>
                  <td class="tdleft">承诺</td>
                  <td colspan="6" class="table-noborder">                    
                    <table>
                        <tr>
                            <td height="90" align="center" colspan="2"> 本人承诺上述所有内容真实、有效、并承担由此产生的法律责任。</td>
                          </tr>
                          <tr>
                            <td height="40" align="center">本人签字：</td>
                            <td>日期：</td>
                        </tr>
                       </table>　　　　　　　　
                  </td>
                </tr>
                <tr>
                  <td colspan="7" class="table-body">
                  <table>
                    <tr>
                      <td width="166" rowspan="2" class="tdleft">培<br/>训<br/>记<br/>录</td>
                      <td colspan="2" align="center">科目</td>
                      <td colspan="2" align="center">考核员</td>
                      <td width="226" align="center">备注</td>
                    </tr>
                    <tr>
                      <td align="center" colspan="2">理论</td>
                      <!-- <td width="113" align="center">&nbsp;</td> -->
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="111" align="center">本人签字</td>
                      <td colspan="2">&nbsp;</td>
                      <td width="174" align="center">日期</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td class="tdleft">道路运输<br/>驾培机构意见</td>
                  <td colspan="6" align="right">（盖章）　　　<br/>　<br/>
                  年　　月　　日　
                  </td>
                </tr>
            </table>
   </div>
</div>   

    

</body>
</html>

      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">道路运输驾驶员危险货物运输从业资格培训记录</h1><br/><br/>
        
      <table class="table-print print02">
          <tr>
            <td width="96" class="tdnowrap">培训单位</td>
            <td colspan="5"><h2>　<?php echo C('MANAGE_LOGIN');?></h2></td>
            <td width="96" class="tdnowrap">学期编号</td>
            <td width="172">&nbsp;</td>
          </tr>
          <tr>
            <td class="tdnowrap">学员姓名</td>
            <td width="207">&nbsp;<?php echo ($student["student_name"]); ?></td>
            <td width="34" align="center">性<br/>别</td>
            <td width="81">&nbsp;<?php echo ($student["sex"]); ?></td>
            <td width="89" align="center">身份证号</td>
            <td colspan="3">&nbsp;<?php echo ($student["idcard"]); ?></td>
          </tr>
          <tr>
            <td class="tdnowrap">申请类别</td>
            <td colspan="7"><h2>　危　险　货　物　运　输</h2></td>
          </tr>
          <tr>
            <td class="tdnowrap">培　　训<br/>起止时间</td>
            <td colspan="7">　　　　　　　年　　　　　月　　　　　日至　　　　　月　　　　　　日</td>
          </tr>
          <tr>
            <td colspan="8" class="table-body">
<table>
  <tr>
    <td class="tdnowrap">理论培训<br/>
      课　　时</td>
    <td align="center"><strong>　18　</strong>(课时)</td>
    <td width="56" align="center">学员<br/>签名</td>
    <td width="123" align="center">&nbsp;</td>
    <td width="59" align="center">教员<br/>签名</td>
    <td width="100" align="center">&nbsp;</td>
    <td width="50" align="center">时间</td>
    <td width="120" align="center">　　月　　日</td>
  </tr>
</table>
            </td>
          </tr>
          <tr>
            <td class="tdnowrap">培训单位<br/>审核意见</td>
            <td colspan="7" class="table-noborder">
            	<table>
                  <tr>
                      <td height="260">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">
                                  （盖章） 　　　　　　
                                  　<br/>　<br/>
                        年　　月　　日　　
                        </td>
                  </tr>
                 </table>　
            </td>
          </tr>
          <tr>
            <td class="tdnowrap">备　注</td>
            <td colspan="7" height="240">&nbsp;</td>
          </tr>
      </table>
   </div>
</div>   

    

</body>
</html>

      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">道路危险货物运输押运人员从业资格培训教学日志</h1><br/>  
     <div class="page-sub">
         <span>NO.</span>
     </div>
     <div class="Div"> 
      <table class="table-print print04" height="48">
        <tr>
          <td><h3>培训机构名称：<?php echo C('MANAGE_LOGIN');?></h3></td>
          <td><strong>学员姓名：<?php echo ($student["student_name"]); ?></strong></td>
          <td><h3>类别：危货驾驶员</h3></td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print03"  height="48">
        <tr>
          <td>
       	  <strong>培训目标: </strong>
          了解我国道路危险货物运输的法律、法规和技术标准方面的基本知识，熟悉所运危险货物的安全知识；掌握常见危险货物的基本知识；熟练使用道路危险货物运输应急预案。</td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print04">
        <tr>
          <td width="9%" rowspan="2" align="center" style=" line-height:28px;"><h3>理<br/>论<br/>知<br/>识</h3>
          学时：<br/>
          18</td>
          <td width="27%" align="center"><h3>教学项目</h3></td>
          <td width="64%" align="center"><h3>教学目标</h3></td>
        </tr>
        <tr>
          <td height="170" style="font-size:16px;" valign="middle">1.概述<br/>
          2.职业道德与道路危险货物运<br/>　输法规及技术标准简介教学<br/>　要求<br/>
          3.道路危险会务运输管理<br/>
          4.危险货物的分类与相关特性<br/>
          5.《危险货物品名表》及其适<br/>　用<br/>
          6.危险货物运输包装常识<br/>
          7.道路危险货物运输安全及应<br/>　急预案<br/>
          9.爆炸品特性及安全运输<br/>
          10.剧毒化学品特性及安全运输<br/>
          11.新技术应用推广篇<br/>
          </td>
          <td style="font-size:16px;" valign="middle">
          	1.了解道路危险货物的重要性<br/>
            2.了解道路危险货物运输从业人员社会责任与职业道德内容、要求及有关行<br/>　政法规体系；技术标准体系和主要要求。<br/>
            3.了解道路危险货物运输企业资质要求、管理的特点、管理的内容、行业管<br/>　理的内容。<br/>
            4.了解货物物理及化学特性、分类及品名编号、实义及特性。<br/>
            5.熟悉《危险货物品名表》的结构和作用、危险货物运输的限制与相关免除<br/>
            6.了解危险货物运输包装基本要求、分类、标志及英文标识<br/>
            7.熟悉道路危险货物运输托运人责任、承运人责任运输受理及相关文件。<br/>
            8.掌握道路危险货物安全运输的方法，危险源的识别，了解制定事故应急预<br/>　案的原则；指导思想和基本内容。<br/>
            9.了解爆炸品物理及化学特性、分类及定义和特性<br/>
            10.了解剧毒化学品物理及化学特性、分类及品名编号和定义及特性<br/>
            11.了解在道路危险货物运输行业中，一些先进技术和产品。<br/>
          </td>
        </tr>
        <tr>
          <td colspan="3" class="table-body">
          <table class="table-print">
            <tr>
              <td width="90" align="center">次数/日期</td>
              <td>1/</td>
              <td>2/</td>
              <td>3/</td>
              <td>4/</td>
              <td>5/</td>
              <td>6/</td>
              <td>7/</td>
              <td>8/</td>
            </tr>
            <tr>
              <td align="center">教学项目</td>
              <td align="center">1-2/</td>
              <td align="center">3-4/</td>
              <td align="center">5-6/</td>
              <td align="center">7-8/</td>
              <td align="center">9-10/</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">所用学时</td>
              <td align="center">8</td>
              <td align="center">4</td>
              <td align="center">3</td>
              <td align="center">3</td>
              <td align="center">4</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">学员签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">教练员评<br/>价及签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print04">
        <tr>
          <td width="12%" rowspan="2" align="center" style="line-height:28px;"><h3>专业<br/>知识<br/>应用</h3>
          学时：<br/>
          14</td>
          <td width="24%" align="center" height="20"><h3>教学项目</h3></td>
          <td width="64%" align="center" height="20"><h3>教学目标</h3></td>
        </tr>
        <tr>
          <td height="130" style="font-size:16px;" valign="middle">
          1.道路危险货物运输驾驶<br/>　员基本要求<br/>
          2.道路危险货物运输车辆<br/>　基本要求。<br/>
          3.道路危险货物运输安全<br/>　及事故应急措施。<br/>
          4.道路危险货物运输事故<br/>　典型案例分析
          </td>
          <td style="font-size:16px;" valign="middle">
            1.熟悉道路危险货物运输驾驶人职业要求<br/>
            2.了解道路危险货物运输车辆类型；基本要求和车辆安全设施。<br/>
            3.熟悉道路危险货物运输安全及事故应急措施、低碳、环保、节能等新技术<br/>　应用<br/>
            4.了解典型案例发生的基本过程、原因分析以及给予的经验与教训，危险源<br/>　的识别与御防性驾驶。
          </td>
        </tr>
        <tr>
          <td colspan="3" class="table-body">
          <table class="table-print">
            <tr>
              <td width="113" align="center">次数/日期</td>
              <td width="124">1/</td>
              <td width="147">2/</td>
              <td width="147">3/</td>
              <td width="147">4/</td>
              <td width="147">5/</td>
              <td width="57">6/</td>
            </tr>
            <tr>
              <td align="center">教学项目</td>
              <td>1/</td>
              <td>2/</td>
              <td>3/</td>
              <td>4/</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">所用学时</td>
              <td align="center">2</td>
              <td align="center">3</td>
              <td align="center">6</td>
              <td align="center">3</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">学员签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">教练员评<br/>价及签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>  
      
      </div>
      <div class="Div">      
      <table class="table-print print04">
        <tr>
          <td colspan="2" height="50">考核意见：
          <p style="text-align:right; margin:0;">考核人签字：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
          </td>
        </tr>
        <tr>
          <td width="180" height="30">培训机构审核意见：</td>
          <td style="vertical-align:bottom;" align="right">(盖章)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
      </table>
      </div>
   </div>
</div>   

    

</body>
</html><?php endif; ?>
    	
    	<?php if(($student["apply_detail_type"]) == "道路危险货物运输押运人员"): ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">经营性道路危货运输从业资格培训申请表</h1><br/><br/>
        <table class="table-print table-fx">
                <tr>
                  <td class="tdleft">姓名</td>
                  <td style=" white-space:nowrap">&nbsp;<?php echo ($student["student_name"]); ?></td>
                  <td class="tdnowrap">性别</td>
                  <td>&nbsp;<?php echo ($student["sex"]); ?></td>
                  <td class="tdnowrap">学历</td>
                  <td>&nbsp;<?php echo ($student["education"]); ?></td>
                  <td rowspan="4" width="149"><img src="<?php echo ((isset($student["imgurl"]) && ($student["imgurl"] !== ""))?($student["imgurl"]):'/jx/Public/images/user.jpg'); ?>" height="198" width="149"></td>
                </tr>
                <tr>
                  <td class="tdleft">住址</td>
                  <td colspan="3">&nbsp;<?php echo ($student["address"]); ?></td>
                  <td class="tdnowrap">(手机)</td>
                  <td>&nbsp;<?php echo ($student["tel1"]); ?></td>
                  
                </tr>
                <tr>
                  <td class="tdleft">工作单位</td>
                  <td colspan="3">&nbsp;<?php echo ($student["work_unit"]); ?></td>
                  <td class="tdnowrap">(电话)</td>
                  <td>&nbsp;<?php echo ($student["tel2"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">身份证号</td>
                  <td colspan="2">&nbsp;<?php echo ($student["idcard"]); ?></td>
                  <td align="center" width="120">培训单位</td>
                  <td colspan="2">&nbsp;<?php echo ($student["train_unit"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">驾驶证准驾车型</td>
                  <td colspan="2">&nbsp;<?php echo ($student["drive_allow_car"]); ?></td>
                  <td align="center" colspan="2">初领驾驶证日期</td>
                  <td colspan="2">&nbsp;<?php echo ($student["first_drive_date"]); ?></td>
                </tr>
                 <tr>
                  <td class="tdleft">报考细分类别</td>
                  <td colspan="6">&nbsp;<?php echo ($student["apply_detail_type"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">原从业证资格证号</td>
                  <td colspan="6">&nbsp;<?php echo ($student["obtain_code"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">申请类别</td>
                  <td colspan="6">&nbsp;<?php echo ($student["apply_category"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">材料清单</td>
                  <td colspan="6" class="table-check" height="140">
                  	<table>
                       <tr>
                            <td><label>身份证号原件 <input type="checkbox" name="checkbox1" id="checkbox1"   <?php if(in_array("身份证号原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>身份证明复印件 <input type="checkbox" name="checkbox2" id="checkbox2"  <?php if(in_array("身份证明复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>驾驶证复印件 <input type="checkbox" name="checkbox7" id="checkbox7"  <?php if(in_array("驾驶证复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                          </tr>
                          <tr>
                            <td><label>原从业资格证原件 <input type="checkbox" name="checkbox4" id="checkbox4"  <?php if(in_array("原从业资格证原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>原从业资格证复印件 <input type="checkbox" name="checkbox5" id="checkbox5"  <?php if(in_array("原从业资格证复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>学历证明 <input type="checkbox" name="checkbox6" id="checkbox6"  <?php if(in_array("学历证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                        </tr>
                        <tr>
                            <td><label>驾驶证原件 <input type="checkbox" name="checkbox3" id="checkbox3"  <?php if(in_array("驾驶证原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>无重大以上责任事故记录证明 <input type="checkbox" name="checkbox8" id="checkbox8"  <?php if(in_array("无重大以上责任事故记录证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>居住地证明 <input type="checkbox" name="checkbox9" id="checkbox9"  <?php if(in_array("居住地证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                           </tr>
                       </table>
                  </td>
                </tr>
                <tr>
                  <td class="tdleft">承诺</td>
                  <td colspan="6" class="table-noborder">                    
                    <table>
                        <tr>
                            <td height="90" align="center" colspan="2"> 本人承诺上述所有内容真实、有效、并承担由此产生的法律责任。</td>
                          </tr>
                          <tr>
                            <td height="40" align="center">本人签字：</td>
                            <td>日期：</td>
                        </tr>
                       </table>　　　　　　　　
                  </td>
                </tr>
                <tr>
                  <td colspan="7" class="table-body">
                  <table>
                    <tr>
                      <td width="166" rowspan="2" class="tdleft">培<br/>训<br/>记<br/>录</td>
                      <td colspan="2" align="center">科目</td>
                      <td colspan="2" align="center">考核员</td>
                      <td width="226" align="center">备注</td>
                    </tr>
                    <tr>
                      <td align="center" colspan="2">理论</td>
                      <!-- <td width="113" align="center">&nbsp;</td> -->
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="111" align="center">本人签字</td>
                      <td colspan="2">&nbsp;</td>
                      <td width="174" align="center">日期</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td class="tdleft">道路运输<br/>驾培机构意见</td>
                  <td colspan="6" align="right">（盖章）　　　<br/>　<br/>
                  年　　月　　日　
                  </td>
                </tr>
            </table>
   </div>
</div>   

    

</body>
</html>

      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">道路运输驾驶员危险货运从业资格培训记录</h1><br/><br/>
        
      <table class="table-print print02">
          <tr>
            <td width="96" class="tdnowrap">培训单位</td>
            <td colspan="5"><h2>　<?php echo C('MANAGE_LOGIN');?></h2></td>
            <td width="96" class="tdnowrap">学期编号</td>
            <td width="172">&nbsp;</td>
          </tr>
          <tr>
            <td class="tdnowrap">学员姓名</td>
            <td width="207">&nbsp;<?php echo ($student["student_name"]); ?></td>
            <td width="34" align="center">性<br/>别</td>
            <td width="81">&nbsp;<?php echo ($student["sex"]); ?></td>
            <td width="89" align="center">身份证号</td>
            <td colspan="3">&nbsp;<?php echo ($student["idcard"]); ?></td>
          </tr>
          <tr>
            <td class="tdnowrap">申请类别</td>
            <td colspan="7"><h2>　危　险　货　物　押　运　员</h2></td>
          </tr>
          <tr>
            <td class="tdnowrap">培　　训<br/>起止时间</td>
            <td colspan="7">　　　　　　　年　　　　　月　　　　　日至　　　　　月　　　　　　日</td>
          </tr>
          <tr>
            <td colspan="8" class="table-body">
<table>
  <tr>
    <td class="tdnowrap">理论培训<br/>
      课　　时</td>
    <td align="center"><strong>　18　</strong>(课时)</td>
    <td width="56" align="center">学员<br/>签名</td>
    <td width="123" align="center">&nbsp;</td>
    <td width="59" align="center">教员<br/>签名</td>
    <td width="100" align="center">&nbsp;</td>
    <td width="50" align="center">时间</td>
    <td width="120" align="center">　　月　　日</td>
  </tr>
</table>
            </td>
          </tr>
          <tr>
            <td class="tdnowrap">培训单位<br/>审核意见</td>
            <td colspan="7" class="table-noborder">
            	<table>
                  <tr>
                      <td height="260">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">
                                  （盖章） 　　　　　　
                                  　<br/>　<br/>
                        年　　月　　日　　
                        </td>
                  </tr>
                 </table>　
            </td>
          </tr>
          <tr>
            <td class="tdnowrap">备　注</td>
            <td colspan="7" height="240">&nbsp;</td>
          </tr>
      </table>
   </div>
</div>   

    

</body>
</html>

      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">道路危险货物运输从业资格培训教学日志</h1><br/>  
     <div class="page-sub">
         <span>NO.</span>
     </div>
     <div class="Div"> 
      <table class="table-print print04" height="48">
        <tr>
          <td><h3>培训机构名称：<?php echo C('MANAGE_LOGIN');?></h3></td>
          <td><strong>学员姓名：<?php echo ($student["student_name"]); ?></strong></td>
          <td><h3>类别：危货押运员</h3></td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print03"  height="48">
        <tr>
          <td>
       	  <strong>培训目标: </strong>
          了解我国道路危险货物运输的法律、法规和技术标准方面的基本知识，熟悉所运危险货物的安全知识；掌握常见危险货物的基本知识；熟练使用道路危险货物运输应急预案。</td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print04">
        <tr>
          <td width="9%" rowspan="2" align="center" style=" line-height:28px;"><h3>理<br/>论<br/>知<br/>识</h3>
          学时：<br/>
          18</td>
          <td width="27%" align="center"><h3>教学项目</h3></td>
          <td width="64%" align="center"><h3>教学目标</h3></td>
        </tr>
        <tr>
          <td height="170" style="font-size:16px;padding:8px" valign="middle">1.概述<br/>
          2.职业道德与道路危险货物运<br/>　输法规及技术标准简介教学<br/>　要求<br/>
          3.道路危险会务运输管理<br/>
          4.危险货物的分类与相关特性<br/>
          5.《危险货物品名表》及其适<br/>　用<br/>
          6.危险货物运输包装常识<br/>
          7.道路危险货物运输安全及应<br/>　急预案<br/>
          9.爆炸品特性及安全运输<br/>
          10.剧毒化学品特性及安全运输<br/>
          11.新技术应用推广篇<br/>
          </td>
          <td style="font-size:16px;padding:8px" valign="middle">
          	1.了解道路危险货物的重要性<br/>
            2.了解道路危险货物运输从业人员社会责任与职业道德内容、要求及有关行<br/>　政法规体系；技术标准体系和主要要求。<br/>
            3.了解道路危险货物运输企业资质要求、管理的特点、管理的内容、行业管<br/>　理的内容。<br/>
            4.了解货物物理及化学特性、分类及品名编号、实义及特性。<br/>
            5.熟悉《危险货物品名表》的结构和作用、危险货物运输的限制与相关免除<br/>
            6.了解危险货物运输包装基本要求、分类、标志及英文标识<br/>
            7.熟悉道路危险货物运输托运人责任、承运人责任运输受理及相关文件。<br/>
            8.掌握道路危险货物安全运输的方法，危险源的识别，了解制定事故应急预<br/>　案的原则；指导思想和基本内容。<br/>
            9.了解爆炸品物理及化学特性、分类及定义和特性<br/>
            10.了解剧毒化学品物理及化学特性、分类及品名编号和定义及特性<br/>
            11.了解在道路危险货物运输行业中，一些先进技术和产品。<br/>
          </td>
        </tr>
        <tr>
          <td colspan="3" class="table-body">
          <table class="table-print">
            <tr>
              <td width="90" align="center">次数/日期</td>
              <td>1/</td>
              <td>2/</td>
              <td>3/</td>
              <td>4/</td>
              <td>5/</td>
              <td>6/</td>
              <td>7/</td>
              <td>8/</td>
            </tr>
            <tr>
              <td align="center">教学项目</td>
              <td align="center">1-2/</td>
              <td align="center">3-4/</td>
              <td align="center">5-6/</td>
              <td align="center">7-8/</td>
              <td align="center">9-10/</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">所用学时</td>
              <td align="center">8</td>
              <td align="center">4</td>
              <td align="center">3</td>
              <td align="center">3</td>
              <td align="center">4</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">学员签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">教练员评<br/>价及签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print04">
        <tr>
          <td width="12%" rowspan="2" align="center" style="line-height:28px;"><h3>专业<br/>知识<br/>应用</h3>
          学时：<br/>
          14</td>
          <td width="24%" align="center"><h3>教学项目</h3></td>
          <td width="64%" align="center"><h3>教学目标</h3></td>
        </tr>
        <tr>
          <td height="155" style="font-size:16px;" valign="middle">1.道路危险货物运输押<br/>　运人员基本要求<br/>
          2.道路危险货物运输押<br/>　运过程安全及事故应<br/>　急处置<br/>
          3.道路危险货物运输押<br/>　运事故典型<br/>
          </td>
          <td style="font-size:16px;line-height:28px;" valign="middle">
          	案例分析<br/>
            1.了解道路危险货物运输押运人员职业道德及基本要求。<br/>
            2.掌握各类道德危险货物运输押运过程安全及事故应急处置、道火<br/>　防范措施医疗急救常识、危险化学品事故报告和上报程序。<br/>
            3.了解案例发生的过程及原因和案例给予的经验与教训。
          </td>
        </tr>
        <tr>
          <td colspan="3" class="table-body">
          <table class="table-print">
            <tr>
              <td width="113" align="center">次数/日期</td>
              <td width="124">1/</td>
              <td width="147">2/</td>
              <td width="147">3/</td>
              <td width="147">4/</td>
              <td width="147">5/</td>
              <td width="57">6/</td>
            </tr>
            <tr>
              <td align="center">教学项目</td>
              <td align="center">1/</td>
              <td align="center">2/</td>
              <td align="center">3/</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">所用学时</td>
              <td align="center">4</td>
              <td align="center">5</td>
              <td align="center">5</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">学员签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">教练员评<br/>价及签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>  
      
      </div>
      <div class="Div">      
      <table class="table-print print04">
        <tr>
          <td colspan="2" height="58">考核意见：
          <p style="text-align:right; margin:0;">考核人签字：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
          </td>
        </tr>
        <tr>
          <td width="180" height="30">培训机构审核意见：</td>
          <td style="vertical-align:bottom;" align="right">(盖章)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
      </table>
      </div>
   </div>
</div>   

    

</body>
</html><?php endif; ?>
    	
    	<?php if(($student["apply_detail_type"]) == "道路危险货物运输装卸管理人员"): ?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">经营性道路危货运输从业资格培训申请表</h1><br/><br/>
        <table class="table-print table-fx">
                <tr>
                  <td class="tdleft">姓名</td>
                  <td style=" white-space:nowrap">&nbsp;<?php echo ($student["student_name"]); ?></td>
                  <td class="tdnowrap">性别</td>
                  <td>&nbsp;<?php echo ($student["sex"]); ?></td>
                  <td class="tdnowrap">学历</td>
                  <td>&nbsp;<?php echo ($student["education"]); ?></td>
                  <td rowspan="4" width="149"><img src="<?php echo ((isset($student["imgurl"]) && ($student["imgurl"] !== ""))?($student["imgurl"]):'/jx/Public/images/user.jpg'); ?>" height="198" width="149"></td>
                </tr>
                <tr>
                  <td class="tdleft">住址</td>
                  <td colspan="3">&nbsp;<?php echo ($student["address"]); ?></td>
                  <td class="tdnowrap">(手机)</td>
                  <td>&nbsp;<?php echo ($student["tel1"]); ?></td>
                 
                </tr>
                <tr>
                  <td class="tdleft">工作单位</td>
                  <td colspan="3">&nbsp;<?php echo ($student["work_unit"]); ?></td>
                   <td class="tdnowrap">(电话)</td>
                  <td>&nbsp;<?php echo ($student["tel2"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">身份证号</td>
                  <td colspan="2">&nbsp;<?php echo ($student["idcard"]); ?></td>
                  <td align="center" width="120">培训单位</td>
                  <td colspan="2">&nbsp;<?php echo ($student["train_unit"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">驾驶证准驾车型</td>
                  <td colspan="2">&nbsp;<?php echo ($student["drive_allow_car"]); ?></td>
                  <td align="center" colspan="2">初领驾驶证日期</td>
                  <td colspan="2">&nbsp;<?php echo ($student["first_drive_date"]); ?></td>
                </tr>
                 <tr>
                  <td class="tdleft">报考细分类别</td>
                  <td colspan="6">&nbsp;<?php echo ($student["apply_detail_type"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">原从业证资格证号</td>
                  <td colspan="6">&nbsp;<?php echo ($student["obtain_code"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">申请类别</td>
                  <td colspan="6">&nbsp;<?php echo ($student["apply_category"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">材料清单</td>
                  <td colspan="6" class="table-check" height="140">
                  	<table>
                       <tr>
                            <td><label>身份证号原件 <input type="checkbox" name="checkbox1" id="checkbox1"   <?php if(in_array("身份证号原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>身份证明复印件 <input type="checkbox" name="checkbox2" id="checkbox2"  <?php if(in_array("身份证明复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>驾驶证复印件 <input type="checkbox" name="checkbox7" id="checkbox7"  <?php if(in_array("驾驶证复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                          </tr>
                          <tr>
                            <td><label>原从业资格证原件 <input type="checkbox" name="checkbox4" id="checkbox4"  <?php if(in_array("原从业资格证原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>原从业资格证复印件 <input type="checkbox" name="checkbox5" id="checkbox5"  <?php if(in_array("原从业资格证复印件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>学历证明 <input type="checkbox" name="checkbox6" id="checkbox6"  <?php if(in_array("学历证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                        </tr>
                        <tr>
                            <td><label>驾驶证原件 <input type="checkbox" name="checkbox3" id="checkbox3"  <?php if(in_array("驾驶证原件", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>无重大以上责任事故记录证明 <input type="checkbox" name="checkbox8" id="checkbox8"  <?php if(in_array("无重大以上责任事故记录证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                            <td><label>居住地证明 <input type="checkbox" name="checkbox9" id="checkbox9"  <?php if(in_array("居住地证明", explode(',',$student['bill_materials']))): ?>checked<?php endif; ?> /> </label></td>
                           </tr>
                       </table>
                  </td>
                </tr>
                <tr>
                  <td class="tdleft">承诺</td>
                  <td colspan="6" class="table-noborder">                    
                    <table>
                        <tr>
                            <td height="90" align="center" colspan="2"> 本人承诺上述所有内容真实、有效、并承担由此产生的法律责任。</td>
                          </tr>
                          <tr>
                            <td height="40" align="center">本人签字：</td>
                            <td>日期：</td>
                        </tr>
                       </table>　　　　　　　　
                  </td>
                </tr>
                <tr>
                  <td colspan="7" class="table-body">
                  <table>
                    <tr>
                      <td width="166" rowspan="2" class="tdleft">培<br/>训<br/>记<br/>录</td>
                      <td colspan="2" align="center">科目</td>
                      <td colspan="2" align="center">考核员</td>
                      <td width="226" align="center">备注</td>
                    </tr>
                    <tr>
                      <td align="center" colspan="2">理论</td>
                      <!-- <td width="113" align="center">&nbsp;</td> -->
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td width="111" align="center">本人签字</td>
                      <td colspan="2">&nbsp;</td>
                      <td width="174" align="center">日期</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td class="tdleft">道路运输<br/>驾培机构意见</td>
                  <td colspan="6" align="right">（盖章）　　　<br/>　<br/>
                  年　　月　　日　
                  </td>
                </tr>
            </table>
   </div>
</div>   

    

</body>
</html>

      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">道路运输驾驶员危险货物装卸管理人员<br>从业资格培训记录</h1><br/><br/>
        
      <table class="table-print print02">
          <tr>
            <td width="96" class="tdnowrap">培训单位</td>
            <td colspan="5"><h2>　<?php echo C('MANAGE_LOGIN');?></h2></td>
            <td width="96" class="tdnowrap">学期编号</td>
            <td width="172">&nbsp;</td>
          </tr>
          <tr>
            <td class="tdnowrap">学员姓名</td>
            <td width="207">&nbsp;<?php echo ($student["student_name"]); ?></td>
            <td width="34" align="center">性<br/>别</td>
            <td width="81">&nbsp;<?php echo ($student["sex"]); ?></td>
            <td width="89" align="center">身份证号</td>
            <td colspan="3">&nbsp;<?php echo ($student["idcard"]); ?></td>
          </tr>
          <tr>
            <td class="tdnowrap">申请类别</td>
            <td colspan="7"><h2>　危　险　货　物　装　卸　管　理　人　员</h2></td>
          </tr>
          <tr>
            <td class="tdnowrap">培　　训<br/>起止时间</td>
            <td colspan="7">　　　　　　　年　　　　　月　　　　　日至　　　　　月　　　　　　日</td>
          </tr>
          <tr>
            <td colspan="8" class="table-body">
<table>
  <tr>
    <td class="tdnowrap">理论培训<br/>
      课　　时</td>
    <td align="center"><strong>　18　</strong>(课时)</td>
    <td width="56" align="center">学员<br/>签名</td>
    <td width="123" align="center">&nbsp;</td>
    <td width="59" align="center">教员<br/>签名</td>
    <td width="100" align="center">&nbsp;</td>
    <td width="50" align="center">时间</td>
    <td width="120" align="center">　　月　　日</td>
  </tr>
</table>
            </td>
          </tr>
          <tr>
            <td class="tdnowrap">培训单位<br/>审核意见</td>
            <td colspan="7" class="table-noborder">
            	<table>
                  <tr>
                      <td height="260">&nbsp;</td>
                    </tr>
                    <tr>
                      <td align="right">
                                  （盖章） 　　　　　　
                                  　<br/>　<br/>
                        年　　月　　日　　
                        </td>
                  </tr>
                 </table>　
            </td>
          </tr>
          <tr>
            <td class="tdnowrap">备　注</td>
            <td colspan="7" height="240">&nbsp;</td>
          </tr>
      </table>
   </div>
</div>   

    

</body>
</html>

      <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title><?php echo C('MANAGE_LOGIN');?></title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content nextpage">
	<div class="container-fluid">
    <h1 style="text-align:center;">道路危险货物运输从业资格培训教学日志</h1><br/>  
     <div class="page-sub">
         <span>NO.</span>
     </div>
     <div class="Div"> 
      <table class="table-print print04" height="48">
        <tr>
          <td><h3>培训机构名称：<?php echo C('MANAGE_LOGIN');?></h3></td>
          <td><strong>学员姓名：<?php echo ($student["student_name"]); ?></strong></td>
          <td><h3>类别：危货装卸管理人员</h3></td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print03"  height="48">
        <tr>
          <td>
       	  <strong>培训目标: </strong>
          了解我国道路危险货物运输的法律、法规和技术标准方面的基本知识，熟悉所运危险货物的安全知识；掌握常见危险货物的基本知识；熟练使用道路危险货物运输应急预案。</td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print04">
        <tr>
          <td width="9%" rowspan="2" align="center" style=" line-height:28px;"><h3>理<br/>论<br/>知<br/>识</h3>
          学时：<br/>
          18</td>
          <td width="27%" align="center"><h3>教学项目</h3></td>
          <td width="64%" align="center"><h3>教学目标</h3></td>
        </tr>
        <tr>
          <td height="170" style="font-size:16px;padding:8px" valign="middle">1.概述<br/>
          2.职业道德与道路危险货物运<br/>　输法规及技术标准简介教学<br/>　要求<br/>
          3.道路危险会务运输管理<br/>
          4.危险货物的分类与相关特性<br/>
          5.《危险货物品名表》及其适<br/>　用<br/>
          6.危险货物运输包装常识<br/>
          7.道路危险货物运输安全及应<br/>　急预案<br/>
          9.爆炸品特性及安全运输<br/>
          10.剧毒化学品特性及安全运输<br/>
          11.新技术应用推广篇<br/>
          </td>
          <td style="font-size:16px;padding:8px" valign="middle">
          	1.了解道路危险货物的重要性<br/>
            2.了解道路危险货物运输从业人员社会责任与职业道德内容、要求及有关行<br/>　政法规体系；技术标准体系和主要要求。<br/>
            3.了解道路危险货物运输企业资质要求、管理的特点、管理的内容、行业管<br/>　理的内容。<br/>
            4.了解货物物理及化学特性、分类及品名编号、实义及特性。<br/>
            5.熟悉《危险货物品名表》的结构和作用、危险货物运输的限制与相关免除<br/>
            6.了解危险货物运输包装基本要求、分类、标志及英文标识<br/>
            7.熟悉道路危险货物运输托运人责任、承运人责任运输受理及相关文件。<br/>
            8.掌握道路危险货物安全运输的方法，危险源的识别，了解制定事故应急预<br/>　案的原则；指导思想和基本内容。<br/>
            9.了解爆炸品物理及化学特性、分类及定义和特性<br/>
            10.了解剧毒化学品物理及化学特性、分类及品名编号和定义及特性<br/>
            11.了解在道路危险货物运输行业中，一些先进技术和产品。<br/>
          </td>
        </tr>
        <tr>
          <td colspan="3" class="table-body">
          <table class="table-print">
            <tr>
              <td width="90" align="center">次数/日期</td>
              <td>1/</td>
              <td>2/</td>
              <td>3/</td>
              <td>4/</td>
              <td>5/</td>
              <td>6/</td>
              <td>7/</td>
              <td>8/</td>
            </tr>
            <tr>
              <td align="center">教学项目</td>
              <td align="center">1-2/</td>
              <td align="center">3-4/</td>
              <td align="center">5-6/</td>
              <td align="center">7-8/</td>
              <td align="center">9-10/</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">所用学时</td>
              <td align="center">8</td>
              <td align="center">4</td>
              <td align="center">3</td>
              <td align="center">3</td>
              <td align="center">4</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">学员签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">教练员评<br/>价及签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      </div>
      <div class="Div">      
      <table class="table-print print04">
        <tr>
          <td width="12%" rowspan="2" align="center" style="line-height:28px;"><h3>专业<br/>知识<br/>应用</h3>
          学时：<br/>
          14</td>
          <td width="24%" align="center"><h3>教学项目</h3></td>
          <td width="64%" align="center"><h3>教学目标</h3></td>
        </tr>
        <tr>
          <td height="155" style="font-size:16px;" valign="middle">
          1.道路危险货物运输装卸<br/>　管理人员基本要求<br/>
          2.道路危险货物运输装卸<br/>　条件及基本要求。<br/>
          3.道路危险货物运输装卸<br/>　安全及事故应急措施。
          </td>
          <td style="font-size:16px;line-height:34px;" valign="middle">
            1.了解装卸管理人员职业道德及基本要求，了解装卸概念、地位、分类以及<br/>　汽车运输装卸作业的机械化、自动化。<br/>
            2.了解道路运输装卸机具及设备条件，及基本要求。<br/>
            3.掌握各类道路危险货物运输及散装危险货物装卸安全及事故应急措施。
          </td>
        </tr>
        <tr>
          <td colspan="3" class="table-body">
          <table class="table-print">
            <tr>
              <td width="113" align="center">次数/日期</td>
              <td width="124">1/</td>
              <td width="147">2/</td>
              <td width="147">3/</td>
              <td width="147">4/</td>
              <td width="147">5/</td>
              <td width="57">6/</td>
            </tr>
            <tr>
              <td align="center">教学项目</td>
              <td align="center">1/</td>
              <td align="center">2/</td>
              <td align="center">3/</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">所用学时</td>
              <td align="center">3</td>
              <td align="center">3</td>
              <td align="center">8</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">学员签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td align="center">教练员评<br/>价及签字</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>  
      
      </div>
      <div class="Div">      
      <table class="table-print print04">
        <tr>
          <td colspan="2" height="58">考核意见：
          <p style="text-align:right; margin:0;">考核人签字：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
          </td>
        </tr>
        <tr>
          <td width="180" height="30">培训机构审核意见：</td>
          <td style="vertical-align:bottom;" align="right">(盖章)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
      </table>
      </div>
   </div>
</div>   

    

</body>
</html><?php endif; ?>
    	

   
</body>
</html>