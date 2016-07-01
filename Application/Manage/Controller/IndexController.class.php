<?php
namespace Manage\Controller;
use Think\Controller;

class IndexController extends ManageController {

   
	
	
	//======================================分隔线=============================================================
     
	/**
	 * 学员信息列表
	 */
	public function index($student_name='') {
		//$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Manage模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');

		// utf-8编码
		header('Content-Type: text/html; charset=utf-8');

		$student = M('Student');
		// 实例化User对象

		//构造查询条件
		//$student_name = $_GET['student_name'];
		$this -> assign('student_name', $student_name);
		//查询条件回显

		$condition['student_name'] = array('like', "%" . $student_name . "%");

		$count = $student -> where($condition) -> count();
		// 查询满足要求的总记录数
		$Page = new \Think\Page($count, 10);
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
	 * 学员信息添加UI
	 */
	public function studentUI($id = 0) {
		
		//=================基础数据准备======================
		
		$zidian=M('Zidian');
		$zidianList=$zidian->select();
		$this->assign('zidianList',$zidianList);
		
		// $educationList=$zidian->where("kind='学历'")->select();
		// $this->assign('educationList',$educationList);
// 		
		// $cardtypeList=$zidian->where("kind='证件类型'")->select();
		// $this->assign('cardtypeList',$cardtypeList);
// 		
		// $driveallowList=$zidian->where("kind='驾驶证准驾车型'")->select();
		// $this->assign('driveallowList',$driveallowList);
		
		
		//=================基础数据end======================
		
		$student = M('Student');
		$res = $student -> find($id);
		$this -> assign('student', $res);
		$this -> display();
	}

	/**
	 * 学员信息查看UI
	 */
	public function seeUI($id = 0) {
		$student = M('Student');
		$res = $student -> find($id);
		$this -> assign('student', $res);
		$this -> display();
	}

	/**
	 *
	 * 导出Excel
	 */
	function expStudent($ids=0) {//导出Excel
		$xlsName = "student";
		$xlsCell = array( array('student_name', '姓名'), array('sex', '性别'), array('card_type', '证件类型'),array('idcard', '证件编号'), array('education', '学历'), array('birthday', '出生日期'), array('apply_type', '报考类别'), array('apply_detail_type', '报考细分类别'), array('apply_category', '申请种类'), array('drive_allow_car', '准驾车型'), array('exam_address', '考点'), array('train_unit', '培训单位'), array('first_drive_date', '初领驾驶证日期'), array('obtain_code', '原从业资格证件号'), array('tel1', '联系电话1'), array('tel2', '联系电话2'), array('work_unit', '工作单位'), array('address', '住址'));

		$xlsModel = M('Student');

		$xlsData = $xlsModel -> Field('student_name,
		                                sex,
		                                card_type,
		                                idcard,
		                                education,
		                                birthday,
		                                apply_type,
		                                apply_detail_type,	                              
		                                apply_category,
		                                apply_category,
		                                drive_allow_car,
		                                exam_address,
		                                train_unit,
		                                first_drive_date,
		                                obtain_code,
		                                tel1,
		                                tel2,
		                                work_unit,
		                                work_unit,
		                                address') ->where("id  in ({$ids})")-> select();
		//echo $xlsData;

		exportExcel($xlsName, $xlsCell, $xlsData);

	}

	//=================================CRUD===========================================

	/**
	 * 新增
	 */
	public function insert() {
		$student = M('Student');
		$student -> create();
		//==================判断用户是否已经添加;可以报多项，但是不能重复报一项=============================
		$idcard = $student -> idcard;
		$apply_detail_type=$student->apply_detail_type;
		$arr = $student -> where("idcard='{$idcard}' and apply_detail_type='{$apply_detail_type}'") -> find();
		if ($arr) {
			$this -> error('该学员已报名考该科目，请勿重复报名!',U('Index/studentUI'));
		}
		//==================================================================================
		if (I('post.bill_materials')) {
			$bill_materials = implode(',', I('post.bill_materials'));
			$student -> bill_materials = $bill_materials;
		}
		$snUser=I('session.snUser',null);
		$student->add_name=$snUser['username'];
		$student -> add_date = date('Y-m-d');

		$res = $student -> add();
		if ($res) {
			$this -> success('操作成功!', U('Index/index'));
		} else {
			$this -> error('操作失败!');
		}
	}

	/**
	 * 删除
	 */
	public function delete($ids = 0) {
		$student = M('Student');
		$res = $student -> delete($ids);
		if ($res) {
			$this -> success('操作成功!');
		} else {
			$this -> error('操作失败!');
		}
	}

	/**
	 * 修改
	 */
	public function update() {
		$student = M('Student');
		$student -> create();
		if (I('post.bill_materials')) {
			$bill_materials = implode(',', I('post.bill_materials'));
			$student -> bill_materials = $bill_materials;
		}

		$res = $student -> save();
		if ($res) {
			$this -> success('操作成功!', U('Index/index'));
		} else {
			$this -> error('操作失败!');
		}
	}
	
	
	//=================================分隔线================================================
	
	
}
