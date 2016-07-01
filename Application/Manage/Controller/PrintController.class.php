<?php
namespace Manage\Controller;
use Think\Controller;

use Think\Model;

class PrintController extends ManageController {

	
	/**
	 * 考试申请表1
	 */
	public function print01($id=0){
		
		$student=M('Student');
		//===========修改isprint状态====================
		
		$data['id'] = $id;
		$data['isprint'] = '是';
		$student->save($data); // 根据条件保存修改的数据
		
		//===========修改isprint状态end=================
		
		$res=$student->find($id);
		$this->assign('student',$res);
		
		$view="print_E01";
		$apply_detail_type=$res['apply_detail_type'];  //申请类别
		if($apply_detail_type=='经营性道路旅客运输驾驶员'){
			$view="print_A01";
		}else if($apply_detail_type=='经营性道路货物运输驾驶员'){
			$view="print_B01";
		}else if($apply_detail_type=='道路危险货物运输驾驶人员'){
			$view="print_C01";
		}else if($apply_detail_type=='道路危险货物运输押运人员'){
			$view="print_D01";
		}
		
		$this->display($view);
	}
	
	/**
	 * 培训申请表2
	 */
	public function print02($id=0){
		
		$student=M('Student');
		
		$res=$student->find($id);
		$this->assign('student',$res);
		
		$view="print_E02";
		$apply_detail_type=$res['apply_detail_type'];  //申请类别
		if($apply_detail_type=='经营性道路旅客运输驾驶员'){
			$view="print_A02";
		}else if($apply_detail_type=='经营性道路货物运输驾驶员'){
			$view="print_B02";
		}else if($apply_detail_type=='道路危险货物运输驾驶人员'){
			$view="print_C02";
		}else if($apply_detail_type=='道路危险货物运输押运人员'){
			$view="print_D02";
		}
		
		$this->display($view);
	}
	
	/**
	 * 培训记录表
	 */
	public function print03($id=0){
		$student=M('Student');
		
		$res=$student->find($id);
		$this->assign('student',$res);
		
		$view="print_E03";
		$apply_detail_type=$res['apply_detail_type'];  //申请类别
		if($apply_detail_type=='经营性道路旅客运输驾驶员'){
			$view="print_A03";
		}else if($apply_detail_type=='经营性道路货物运输驾驶员'){
			$view="print_B03";
		}else if($apply_detail_type=='道路危险货物运输驾驶人员'){
			$view="print_C03";
		}else if($apply_detail_type=='道路危险货物运输押运人员'){
			$view="print_D03";
		}
		
		$this->display($view);
	}
	
	/**
	 * 教学日志
	 */
	public function print04($id=0){
		$student=M('Student');
		
		$res=$student->find($id);
		$this->assign('student',$res);
		
		$view="print_E04";
		$apply_detail_type=$res['apply_detail_type'];  //申请类别
		if($apply_detail_type=='经营性道路旅客运输驾驶员'){
			$view="print_A04";
		}else if($apply_detail_type=='经营性道路货物运输驾驶员'){
			$view="print_B04";
		}else if($apply_detail_type=='道路危险货物运输驾驶人员'){
			$view="print_C04";
		}else if($apply_detail_type=='道路危险货物运输押运人员'){
			$view="print_D04";
		}
		
		$this->display($view);
	}
	

   /**
    * 打印全部三张表
    */
   public function printAll3($id=0){
   	    $student=M('Student');
		
		$res=$student->find($id);
		$this->assign('student',$res);
		$this->display();
		
   }


}
