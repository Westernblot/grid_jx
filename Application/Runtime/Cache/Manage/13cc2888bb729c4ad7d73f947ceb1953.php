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