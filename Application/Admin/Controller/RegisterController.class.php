<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

class RegisterController extends AdminController {

	public function index() {
		$this -> display();
	}

	/**
	 * Register 用户列表
	 */
	public function registerMain() {
		// utf-8编码
		header('Content-Type: text/html; charset=utf-8');

		$register = M('Register');
		// 实例化User对象

		//构造查询条件
		$register_name = $_GET['register_name'];
		$this -> assign('register_name', $register_name);
		//查询条件回显

		$condition['register_name'] = array('like', "%" . $register_name . "%");

		$count = $register -> where($condition) -> count();
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

		$list = $register -> limit($Page -> firstRow . ',' . $Page -> listRows) -> order('id desc') -> where($condition) -> select();
		$this -> assign('registerList', $list);
		// 赋值数据集
		$this -> assign('page', $show);
		// 赋值分页输出
		$this -> display();
		// 输出模板

	}

	/**
	 * 新增、编辑UI
	 */
	public function registerUI($id = 0) {
		$register = M('Register');

		$res = $register -> find($id);
		$this -> assign('register', $res);
		$this -> display();
	}

    /**
	 * 查看学员信息UI
	 */
	 public function seeUI($id=0){
	    $register = M('Register');

		$res = $register -> find($id);
		$this -> assign('register', $res);
		$this -> display();
	 }

	//================================分隔线===============================================

	/**
	 * 增
	 */
	public function insert() {
		$register = M('Register');
		$register -> create();
		
		//==================判断用户是否已经添加=============================
		
		$idcard = $register -> idcard;
		$arr = $register -> where("idcard={$idcard}") -> find();
		if ($arr) {
			$this -> error('该学员已存在!');
		}
		
		//============================================================
		
		$res = $register -> add();

		if ($res) {
            $this->success('操作成功!',U('registerMain'));
		} else {
			$this -> error('操作失败!');
		}
	}
	
	/**
	 * 改
	 */
	public function update() {
		$register = M('Register');
		$register -> create();
		$res = $register -> save();

		if ($res) {
            $this->success('操作成功!',U('registerMain'));
		} else {
			$this -> error('操作失败!');
		}
	}
	
	
	/**
	 * 删
	 */
	 public function delete($ids=0){
	 	$register=M('Register');
		$res=$register->delete($ids);
		if ($res) {
            $this->success('操作成功!');
		} else {
			$this -> error('操作失败!');
		}
	 }

}
