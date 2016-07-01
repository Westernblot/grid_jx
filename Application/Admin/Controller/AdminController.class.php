<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

class AdminController extends Controller {

	public function _initialize() {
		//判断用户是否已经登录
		//if (!isset($_SESSION['snUser'])) {
		//	$this -> error('请先登录!', U('Login/index'), 1);
		//}
		echo "no visit";
	}

}
