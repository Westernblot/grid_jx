<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

class ZidianController extends Controller {
	public function index() {
		$this -> display();
	}


	/**
	 * 新增、编辑UI
	 */
	public function zidianUI($id = 0) {
		$zidian = M('Zidian');

		$res = $zidian -> find($id);
		$this -> assign('Zidian', $res);
		$this -> display();
	}

 

	//================================分隔线===============================================

	/**
	 * 增
	 */
	public function insert() {
		$zidian = M('Zidian');
		$zidian -> create();
		
		//==================判断数据是否已经添加=============================
		
		$name = $zidian -> name;
		$arr = $zidian -> where("name={$name}") -> find();
		if ($arr) {
			$this -> error('该数据已存在!');
		}
		
		//============================================================
		
		$res = $zidian -> add();

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
		$zidian = M('Zidian');
		$zidian -> create();
		$res = $zidian -> save();

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
	 	$zidian=M('Zidian');
		$res=$zidian->delete($ids);
		if ($res) {
            $this->success('操作成功!');
		} else {
			$this -> error('操作失败!');
		}
	 }

}
	

	

