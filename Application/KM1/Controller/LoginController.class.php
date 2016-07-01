<?php
namespace KM1\Controller;
use Think\Controller;

class LoginController extends Controller {
	

	
	/**
	 * 考试登陆页
	 */
	 public function login(){
	 	$this->display();
	 }
	
	
	/**
	 * 登陆验证
	 */
	 public function checkLogin($idcard=''){
	 	$student=M('Student');
		$res=$student->where("idcard='{$idcard}'")->find();
		
		if($res){
			$_SESSION['snStudent']=$res;          //写入学员信息
			$this->redirect("Index/login_result");
		}else{
			$this->error('无该身份证号学员！');
		}
		
	 }
	
	
}