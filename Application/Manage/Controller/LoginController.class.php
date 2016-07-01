<?php
namespace Manage\Controller;
use Think\Controller;
class LoginController extends Controller {
	
	
	/**
	 * 登陆页面初始化
	 */
	public function index() {
		$this->display (login);
	}
	
	
	
	/**
	 * 用户登陆
	 */
	public function login() {
		$user = M ( 'User' );    //实例化User
		
		$username = $_POST ['username'];
		$password = md5($_POST ['password']);
		
		$where = array (
				'username' => $username,
				'password' => $password 
		);
		
		$res = $user->where ( $where )->find ();
		
		if ($res) {
										
			$_SESSION ['snUser'] = $res;//将用户信息写入SESSION
			//$this->success ( '用户登录成功!', U ( 'Index/index' ) );
			$this->redirect('Index/index');
			
		} else {
			$this->error ( '用户名或者密码错误!' );
		}
	}
	
	/**
	 * 用户退出
	 */
	public function quit() {
		$_SESSION = array ();
		if (isset ( $_COOKIE [session_name ()] )) {
			setcookie ( session_name (), '', time () - 1, '/' );
		}
		session_destroy ();//销毁session
		
		$this->redirect ( 'Login/index' );
		
	}
	
	
}