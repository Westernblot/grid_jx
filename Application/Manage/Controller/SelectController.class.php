<?php
namespace Manage\Controller;
use Think\Controller;

use Think\Model;

class SelectController extends ManageController {

	/**
	 * 学员信息列表
	 */
	public function select() {
		//$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Manage模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');

		
		//==================报考细分类别=========================
		$zidian=M('Zidian');
		$resList=$zidian->where("kind='报考细分类别'")->select();
		$this->assign('zidianList',$resList);
		//==================报考细分类别 end=========================
		
		// utf-8编码
		header('Content-Type: text/html; charset=utf-8');

		$student = M('Student');
		// 实例化User对象

		//构造查询条件
		// $student_name = $_GET['student_name'];
		// $apply_detail_type = $_GET['apply_detail_type'];
		// $sdate = $_GET['sdate'];
		// $edate = $_GET['edate'];
		
		$student_name=I('get.student_name','');
		$apply_detail_type=I('get.apply_detail_type','');
		$sdate=I('get.sdate','1970-01-01');
		$edate=I('get.edate',date('Y-m-d'));
		
		$this -> assign('student_name', $student_name);
		$this -> assign('apply_detail_type', $apply_detail_type);
		$this -> assign('sdate', $sdate);
		$this -> assign('edate', $edate);
		//查询条件回显
		
		
		//================================传递查询条件=========================================
		
       // if($student_name!=null && $student_name !=''){
		     $condition['student_name'] = array('like', "%" . $student_name . "%");
       // }
        
        if($apply_detail_type!=null && $apply_detail_type !=''){
		     $condition['apply_detail_type'] = array('eq', $apply_detail_type);
		}
		
		if($sdate!=null && $sdate !='' && $edate!=null && $edate !=''){
		     $condition['add_date'] = array(array('egt',$sdate),array('elt',$edate));
		}

		//================================传递查询条件end=========================================



		$count = $student -> where($condition) -> count();
		// 查询满足要求的总记录数
		$Page = new \Think\Page($count, 100);
		// 实例化分页类 传入总记录数和每页显示的记录数(25)

		foreach ($condition as $key => $val) {
			if (!is_array($val)) {
				$Page -> parameter .= "$key=" . urlencode($val) . '&';
			}
		}

		$show = $Page -> show();
		// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		// 此处有一BUG，到数据量没达到分页条数时。不会显示分页导航表

		$list = $student -> limit($Page -> firstRow . ',' . $Page -> listRows) -> order('id desc') -> where($condition) -> select();
		$this -> assign('studentList', $list);
		// 赋值数据集
		$this -> assign('page', $show);
		$this->assign('nowPage',$Page->nowPage-1);
		// 赋值分页输出
		$this -> display();
		// 输出模板

	}
	
	
	/**
	 *
	 * 导出Excel
	 */
	function expData() {//导出Excel
		$xlsName = "student";
		$xlsCell = array( array('student_name', '姓名'), array('sex', '性别'), array('idcard', '证件编号'), array('tel1', '电话'), array('apply_detail_type', '报名细分类别'), array('add_date', '添加时间'), array('isprint', '是否已打印'));

		$xlsModel = M('Student');
		
		//================================传递查询条件=========================================
		
		$student_name=I('get.student_name','');
		$apply_detail_type=I('get.apply_detail_type','');
		$sdate=I('get.sdate','1970-01-01');
		$edate=I('get.edate',date('Y-m-d'));
		
		$this -> assign('student_name', $student_name);
		$this -> assign('apply_detail_type', $apply_detail_type);
		$this -> assign('sdate', $sdate);
		$this -> assign('edate', $edate);
		
		
       // if($student_name!=null && $student_name !=''){
		     $condition['student_name'] = array('like', "%" . $student_name . "%");
       // }
        
        if($apply_detail_type!=null && $apply_detail_type !=''){
		     $condition['apply_detail_type'] = array('eq', $apply_detail_type);
		}
		
		if($sdate!=null && $sdate !='' && $edate!=null && $edate !=''){
		     $condition['add_date'] = array(array('egt',$sdate),array('elt',$edate));
		}

		//================================传递查询条件end=========================================



		$xlsData = $xlsModel -> Field('student_name,
		                                sex,		                             
		                                idcard,		                          
		                                tel1,
		                                apply_detail_type,	                              		                             
		                                add_date,		                             
		                                isprint') ->where($condition)-> select();
		//echo $xlsData;

		exportExcel($xlsName, $xlsCell, $xlsData);

	}
	
	
	/**
	 * 批量打印
	 */
	public function batch_print($ids=0){
		
		$Model = new Model();
		$Model -> execute("update tp_student set isprint = '是' where id IN ({$ids})");//打印考试申请表后，设置字段 isprint 为 是
		
		$student=M('Student');
		$resList=$student->where("id in ({$ids})")->select();
		$this->assign('studentList',$resList);
		$this->display();
	}

}
