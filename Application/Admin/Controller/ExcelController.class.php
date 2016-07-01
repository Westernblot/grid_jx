<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

/**
 * 数据导入、导出类
 */
class ExcelController extends Controller {

	/**方法**/
	function index() {
		$this -> display();
	}

	/**
	 *
	 * 导出Excel
	 */
	function expUser() {//导出Excel
		$xlsName = "User";
		$xlsCell = array( array('id', 'ID号'), array('username', '用户名'), array('cnname', '中文名'), array('power', '权限'), array('dept', '部门'));
		$xlsModel = M('User');

		$xlsData = $xlsModel -> Field('id,username,cnname,power,dept') -> select();
		// foreach ($xlsData as $k => $v) {
			// $xlsData[$k]['sex'] = $v['sex'] == 1 ? '男' : '女';
		// }
		exportExcel($xlsName, $xlsCell, $xlsData);

	}

	//=================================分隔线======================================

	/**
	 * 
	 */
	function impUser() {
		if (!empty($_FILES)) {
			import("@.ORG.UploadFile");
			$config = array('allowExts' => array('xlsx', 'xls'), 'savePath' => './Public/upload/', 'saveRule' => 'time', );
			$upload = new UploadFile($config);
			if (!$upload -> upload()) {
				$this -> error($upload -> getErrorMsg());
			} else {
				$info = $upload -> getUploadFileInfo();

			}

			vendor("PHPExcel.PHPExcel");
			$file_name = $info[0]['savepath'] . $info[0]['savename'];
			$objReader = PHPExcel_IOFactory::createReader('Excel5');
			$objPHPExcel = $objReader -> load($file_name, $encode = 'utf-8');
			$sheet = $objPHPExcel -> getSheet(0);
			$highestRow = $sheet -> getHighestRow();
			// 取得总行数
			$highestColumn = $sheet -> getHighestColumn();
			// 取得总列数
			for ($i = 3; $i <= $highestRow; $i++) {
				$data['account'] = $data['truename'] = $objPHPExcel -> getActiveSheet() -> getCell("B" . $i) -> getValue();
				$sex = $objPHPExcel -> getActiveSheet() -> getCell("C" . $i) -> getValue();
				// $data['res_id']    = $objPHPExcel->getActiveSheet()->getCell("D".$i)->getValue();
				$data['class'] = $objPHPExcel -> getActiveSheet() -> getCell("E" . $i) -> getValue();
				$data['year'] = $objPHPExcel -> getActiveSheet() -> getCell("F" . $i) -> getValue();
				$data['city'] = $objPHPExcel -> getActiveSheet() -> getCell("G" . $i) -> getValue();
				$data['company'] = $objPHPExcel -> getActiveSheet() -> getCell("H" . $i) -> getValue();
				$data['zhicheng'] = $objPHPExcel -> getActiveSheet() -> getCell("I" . $i) -> getValue();
				$data['zhiwu'] = $objPHPExcel -> getActiveSheet() -> getCell("J" . $i) -> getValue();
				$data['jibie'] = $objPHPExcel -> getActiveSheet() -> getCell("K" . $i) -> getValue();
				$data['honor'] = $objPHPExcel -> getActiveSheet() -> getCell("L" . $i) -> getValue();
				$data['tel'] = $objPHPExcel -> getActiveSheet() -> getCell("M" . $i) -> getValue();
				$data['qq'] = $objPHPExcel -> getActiveSheet() -> getCell("N" . $i) -> getValue();
				$data['email'] = $objPHPExcel -> getActiveSheet() -> getCell("O" . $i) -> getValue();
				$data['remark'] = $objPHPExcel -> getActiveSheet() -> getCell("P" . $i) -> getValue();
				$data['sex'] = $sex == '男' ? 1 : 0;
				$data['res_id'] = 1;

				$data['last_login_time'] = 0;
				$data['create_time'] = $data['last_login_ip'] = $_SERVER['REMOTE_ADDR'];
				$data['login_count'] = 0;
				$data['join'] = 0;
				$data['avatar'] = '';
				$data['password'] = md5('123456');
				M('Member') -> add($data);

			}
			$this -> success('导入成功！');
		} else {
			$this -> error("请选择上传的文件");
		}

	}



   //=================================测试使用模板代码==============================================

   // 1.<html>
// 2.     <head>
// 3.         
// 4.     </head>
// 5.     <body>
// 6.     <P><a href="{:U('Index/expUser')}" >导出数据并生成excel</a></P><br/>
// 7.         <form action="{:U('Index/impUser')}" method="post" enctype="multipart/form-data">
// 8.             <input type="file" name="import"/>
// 9.             <input type="hidden" name="table" value="tablename"/>
// 10.             <input type="submit" value="导入"/>
// 11.         </form>
// 12.     </body>
// 13.     
// 14. </html>
//    /*

   
}
