<?php

//检查验证码是否输入正确
function check_verify($code, $id = '') {
	$verify = new \Think\Verify();
	return $verify -> check($code, $id);
}

//发送邮件提醒
function sendMail($to, $subject, $content) {
	Vendor('PHPMailer.PHPMailerAutoload');
	$mail = new PHPMailer();//实例化
	$mail -> IsSMTP();// 启用SMTP
	$mail -> Host = C('MAIL_HOST');//smtp服务器的名称（这里以126邮箱为例）
	$mail -> SMTPAuth = C('MAIL_SMTPAUTH');//启用smtp认证
	$mail -> Username = C('MAIL_USERNAME');//你的邮箱名
	$mail -> Password = C('MAIL_PASSWORD');//邮箱密码
	$mail -> From = C('MAIL_FROM');//发件人地址（也就是你的邮箱地址）
	$mail -> FromName = C('MAIL_FROMNAME');//发件人姓名
	$mail -> AddAddress($to, "name");
	$mail -> WordWrap = 50;//设置每行字符长度
	$mail -> IsHTML(C('MAIL_ISHTML'));// 是否HTML格式邮件
	$mail -> CharSet = C('MAIL_CHARSET');//设置邮件编码
	$mail -> Subject = $subject;//邮件主题
	$mail -> Body = $content;//邮件内容
	$mail -> AltBody = "This is the body in plain text for non-HTML mail clients";//邮件正文不支持HTML的备用显示
	
	//$flag=$mail->send();
	
	return  $mail->Send() ? 'Message has been sent' : $mail->ErrorInfo;
	
	// if (!$mail -> Send()) {
		// echo "Message could not be sent. <p>";
		// echo "Mailer Error: " . $mail -> ErrorInfo;
		// exit();
	// } else {
		// echo "Message has been sent";
	// }
}

/**
 * excel 数据导出处理类
 */
 function exportExcel($expTitle, $expCellName, $expTableData) {
		$xlsTitle = iconv('utf-8', 'gb2312', $expTitle);
		//导出文件的名称
		$fileName = date('_YmdHis');
		//or $xlsTitle 文件名称可根据自己情况设定
		$cellNum = count($expCellName);
		$dataNum = count($expTableData);
		Vendor("PHPExcel.PHPExcel");

		$objPHPExcel = new \PHPExcel();
		$cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

		//合并单元格,并赋值
		// $objPHPExcel -> getActiveSheet(0) -> mergeCells('A1:' . $cellName[$cellNum - 1] . '1');
	    // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
		
		//标题头部
		for ($i = 0; $i < $cellNum; $i++) {
			$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($cellName[$i] . '1', $expCellName[$i][1]);
		}
		// 内容，Miscellaneous glyphs, UTF-8
		for ($i = 0; $i < $dataNum; $i++) {
			for ($j = 0; $j < $cellNum; $j++) {
				$objPHPExcel -> getActiveSheet(0) -> setCellValueExplicit($cellName[$j] . ($i + 2), $expTableData[$i][$expCellName[$j][0]],PHPExcel_Cell_DataType::TYPE_STRING);
			}
		}

		header('pragma:public');
		header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsTitle . '.xls"');
		header("Content-Disposition:attachment;filename=$fileName.xls");
		//attachment新窗口打印inline本窗口打印
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter -> save('php://output');
		exit ;
	}




?>