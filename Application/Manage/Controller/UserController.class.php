<?php
namespace Manage\Controller;
use Think\Controller;

use Think\Model;

class UserController extends ManageController {

	/**
	 * 账户列表
	 */
	public function userMain() {
		// utf-8编码
		header('Content-Type: text/html; charset=utf-8');

		$User = M('User');
		// 实例化User对象

		//构造查询条件
		$cnname = $_GET['cnname'];
		$this -> assign('cnname', $cnname);
		//查询条件回显

		//$condition['dept'] = array('like',"%"."市局"."%");
		$condition['cnname'] = array('like', "%" . $cnname . "%");
		$condition['username'] = array('neq', "admin");

		$count = $User -> where($condition) -> count();
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

		$list = $User -> limit($Page -> firstRow . ',' . $Page -> listRows) -> order('id desc') -> where($condition) -> select();
		$this -> assign('userList', $list);
		// 赋值数据集
		$this -> assign('page', $show);
		// 赋值分页输出
		$this -> display();
		// 输出模板
	}

	/**
	 * 新增用户、编辑用户页面
	 */
	public function userUI($id = 0) {

		$m = M('User');
		$arr = $m -> find($id);
		$this -> assign('user', $arr);

		$this -> display();
	}

//=================================分隔线===============================================

  
	/**
	 * 修改密码UI
	 */
	 public function updatePwdUI(){
	 	$this->display();
	 }
	 
	 /**
	  * 修改密码
	  */
	  public function updatePwd(){
	  	$user=M('User');
		$user->create();
		$password=$user->password;
		$user->password=md5($password);
		$res=$user->save();
		if($res){
			$this->success('操作成功！');
		}else{
			$this->error('操作失败！');
		}
	  }
	

	// /**
	 // * 自助服务，用户修改个人密码
	 // */
	// public function updatePasswordUI($id = 0) {
		// $dao = M('User');
		// $res = $dao -> find($id);
		// $this -> assign('user', $res);
		// $this -> display();
	// }
// 
	// /**
	 // * 自助服务，个人用户修改密码
	 // */
	// public function updatePassword() {
		// $user = M("User");
		// // 实例化User对象
		// // 根据表单提交的POST数据创建数据对象
		// $user -> create();
		// $user -> password = md5($user -> password);
		// //修改密码时，对密码进行MD5加密
		// $flag = $user -> save();
		// // 根据条件保存修改的数据
// 
		// if ($flag > 0) {
			// $this -> success('操作成功！', U('updatePasswordUI'));
		// } else {
			// $this -> error('操作失败');
		// }
	// }

	//===============================================分割线===========================================

	/**
	 * 新增用户
	 */
	public function insert() {

		//1.创建数据实例
		$user = M('User');
		//2.创建对象
		$user -> create();
		
        //===================查询用户是否存在判断=====================
		$username = $user -> username;
		$where = array('username' => $username, );
		$arr = $user -> where($where) -> find();
		if ($arr) {
			$this -> error('用户名已存在!');
		}
        //======================================================
	    
		//对密码进行MD5加密
		$user -> password = md5($user -> password);
		
		//3.保存数据
		$retId = $user -> add();

		if ($retId) {
			$this -> success('操作成功!', U('userMain'));
		} else {
			$this -> error('操作失败！');
		}

	}

	/**
	 * 修改用户
	 */
	public function update() {
		//1.创建数据实例
		$user = M("User");       
		
		//2.根据表单提交的POST数据创建数据对象   id=2,name=3,
		$user -> create();
		
		//3.修改保存
		$flag = $user -> save();
		
		if ($flag > 0) {
			$this -> success('操作成功！', U('userMain'));
		} else {
			$this -> error('操作失败!');
		}
	}

	/**
	 * 删除
	 */
	public function delete($ids=0) {
		//1.创建数据实例
		$User = M("User");
		
		// 删除主键为1,2和5的用户数据
		$flag = $User -> delete($ids);
		
		if ($flag > 0) {
			$this -> success('操作成功！');
		} else {
			$this -> error('操作失败!');
		}
	}

	/**
	 * 重置密码
	 */
	public function resetPWD($ids=0) {
	    
		// 1.实例化一个model对象 没有对应任何数据表
		$Model = new Model();
		
		// 2.执行sql操作
		$flag = $Model -> execute("update tp_user set password = md5(1) where id IN ({$ids})");
		
		if ($flag > 0) {
			$this -> success('操作成功！');
		} else {
			$this -> error('操作失败!');
		}
	}

	//=========================================分隔线===============================================

	/**
	 * 设置用户权限 UI
	 */
	public function powerUI($id=0) {
		
		$u = M('User');
		$user = $u -> find($id);
		$this -> assign('user', $user);

		$menu = M('Menu');
		$menuList = $menu -> select();
		$this -> assign('menuList', $menuList);

		$this -> display();
	}

	/**
	 * 设置用户权限
	 */
	public function setPower() {

		$id = $_POST['id'];
		//$power=$_POST['power'];
		$power = implode(',', $_POST['power']);

		$user = M("User");
		// 实例化User对象
		$data['id'] = $id;
		$data['power'] = $power;

		$flag = $user -> save($data);
		// 根据条件保存修改的数据
		if ($flag > 0) {
			$this -> success('操作成功！', U('userMain'));
		} else {
			$this -> error('操作失败!');
		}
	}
}
