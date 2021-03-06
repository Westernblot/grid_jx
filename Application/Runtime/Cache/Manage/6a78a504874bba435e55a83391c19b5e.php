<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>黄石市顺通汽车驾驶员培训学校</title>
    <link rel="stylesheet" type="text/css" href="/jx/Public/css/common.css">
</head>

<body>
<div class="content">
	<div class="container-fluid">
    <h1 style="text-align:center;">经营性道路（客）货运输驾驶员从业资格考试申请表</h1><br/><br/>
        <table class="table-print">
                <tr>
                  <td class="tdleft">姓名</td>
                  <td>&nbsp;<?php echo ($student["student_name"]); ?></td>
                  <td class="tdnowrap">性别</td>
                  <td>&nbsp;<?php echo ($student["sex"]); ?></td>
                  <td class="tdnowrap">学历</td>
                  <td>&nbsp;<?php echo ($student["education"]); ?></td>
                  <td rowspan="4" width="149"><img src="<?php echo ((isset($student["imgurl"]) && ($student["imgurl"] !== ""))?($student["imgurl"]):'/jx/Public/images/user.jpg'); ?>" height="198" width="149"></td>
                </tr>
                <tr>
                  <td class="tdleft">住址</td>
                  <td colspan="3">&nbsp;<?php echo ($student["address"]); ?></td>
                  <td class="tdnowrap">(电话)</td>
                  <td>&nbsp;<?php echo ($student["tel2"]); ?></td>
                </tr>
                <tr>
                  <td class="tdleft">工作单位</td>
                  <td colspan="3">&nbsp;<?php echo ($student["work_unit"]); ?></td>
                  <td class="tdnowrap">(手机)</td>
                  <td>&nbsp;<?php echo ($student["tel1"]); ?></td>
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
                  <td class="tdleft">申请类型</td>
                  <td colspan="6">&nbsp;<?php echo ($student["apply_type"]); ?></td>
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
                            <td><label>身份证号原件 <input type="checkbox" name="checkbox1" id="checkbox1" /> </label></td>
                            <td><label>身份证明复印件 <input type="checkbox" name="checkbox2" id="checkbox2" /> </label></td>
                            <td><label>驾驶证复印件 <input type="checkbox" name="checkbox7" id="checkbox7" /> </label></td>
                          </tr>
                          <tr>
                            <td><label>原从业资格证原件 <input type="checkbox" name="checkbox4" id="checkbox4" /> </label></td>
                            <td><label>原从业资格证复印件 <input type="checkbox" name="checkbox5" id="checkbox5" /> </label></td>
                            <td><label>学历证明 <input type="checkbox" name="checkbox6" id="checkbox6" /> </label></td>
                        </tr>
                        <tr>
                            <td><label>驾驶证原件 <input type="checkbox" name="checkbox3" id="checkbox3" /> </label></td>
                            <td><label>无重大以上责任事故记录证明 <input type="checkbox" name="checkbox8" id="checkbox8" /> </label></td>
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
                      <td rowspan="6" class="tdleft">培<br/>训<br/>记<br/>录</td>
                      <td colspan="2" align="center">科目</td>
                      <td colspan="2" align="center">考核员</td>
                      <td width="305" align="center">考核员</td>
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
                    <tr>
                      <td colspan="2" align="center">轮胎更换</td>
                      <td colspan="2">&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
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
                  </table></td>
                </tr>
                <tr>
                  <td class="tdleft">道路运输<br/>管理机构意见</td>
                  <td colspan="6" align="right">（盖章）　　　<br/>　<br/>
                  年　　月　　日　
                  </td>
                </tr>
            </table>
   </div>
</div>   

    

</body>
</html>