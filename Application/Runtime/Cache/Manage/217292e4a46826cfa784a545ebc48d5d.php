<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
                  <td rowspan="4" width="149">
                  	<img src="<?php echo ((isset($student["imgurl"]) && ($student["imgurl"] !== ""))?($student["imgurl"]):'/jx/Public/images/user.jpg'); ?>" height="198" width="149">
                  </td>
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
                      <td width="95" align="center">日期</td>
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