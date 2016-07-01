<?php
namespace Manage\Controller;
use Think\Controller;
use Think\Model;

class DictionaryController extends ManageController {

	/**
	 * 数据字典页面
	 */
	public function dictionary() {

		$zidian = M('Zidian');
		$zidianList = $zidian -> select();
		$this -> assign('zidianList', $zidianList);

		$this -> display();
	}

	//=================================分隔线==============================================

	/**
	 * 基础数据添加
	 */
	public function insert($name = '', $kind = '') {

		$zidian = M('Zidian');
		$data['name'] = $name;
		$data['kind'] = $kind;
		$res = $zidian -> data($data) -> add();
		if ($res) {
			$this -> success('操作成功!','dictionary');
		} else {
			$this -> error('操作失败!');
		}
	}

	/**
	 * 基础数据删除
	 */

	public function delete($id = 0) {
		$zidian = M('Zidian');
		$res = $zidian -> delete($id);
		if ($res) {
			$this -> success('操作成功!','dictionary');
		} else {
			$this -> error('操作失败!');
		}
	}

	//=============================数据导入=========================================

	public function import($exts = 'xls') {
		//导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
		Vendor("PHPExcel.PHPExcel");
		//创建PHPExcel对象，注意，不能少了\
		$PHPExcel = new \PHPExcel();
		//如果excel文件后缀名为.xls，导入这个类
		if ($exts == 'xls') {
			// import("Org.Util.PHPExcel.Reader.Excel5");
			Vendor("PHPExcel.PHPExcel.Reader.Excel5");
			$PHPReader = new \PHPExcel_Reader_Excel5();
		} else if ($exts == 'xlsx') {
			// import("Org.Util.PHPExcel.Reader.Excel2007");
			Vendor("PHPExcel.PHPExcel.Reader.Excel2007");
			$PHPReader = new \PHPExcel_Reader_Excel2007();
		}

		//载入文件
		$PHPExcel = $PHPReader -> load('Uploads/www.xls');
		//获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
		$currentSheet = $PHPExcel -> getSheet(0);
		//获取总列数
		$allColumn = $currentSheet -> getHighestColumn();
		//获取总行数
		$allRow = $currentSheet -> getHighestRow();
		//循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
		for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {
			//从哪列开始，A表示第一列
			for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++) {
				//数据坐标
				$address = $currentColumn . $currentRow;
				//读取到的数据，保存到数组$arr中

				$value = $currentSheet -> getCell($address) -> getValue();

				$data[$currentRow][$currentColumn] = $value;

			}

		}

		foreach ($data as $k => $v) {
			echo $v['A'];
			echo $v['B'];
			echo $v['C'];
			echo $v['D'];
			echo $v['E'];
			echo $v['F'];
			echo $v['G'];
			echo $v['H'];
			echo $v['I'];
			echo $v['J'];
			echo $v['K'];
			echo $v['L'];
			echo $v['M'];
			echo $v['N'];
			echo $v['O'];
			echo $v['P'];
			echo $v['Q'];
			echo $v['R'];
			echo $v['S'];
			echo $v['T'];
			echo $v['U'];
			echo $v['V'];
			echo $v['W'];
			echo "<br>";
		}

	}

}
