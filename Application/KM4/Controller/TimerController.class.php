<?php
namespace KM4\Controller;
use Think\Controller;

class TimerController extends Controller {
	
    public function index(){
       // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
       $this->display();
    }
	
	/**
	 * 删除目录下的文件
	 */
	 public function delBmp(){
	 		// utf-8编码
		header('Content-Type: text/html; charset=utf-8');
		$path=C('IDCARD_PATH');
	 	unlink($path."/1.bmp");
	 }
	
	
	/**
	 * 模拟考试 
	 */
	 public function exam($specialty_code='A0101'){//默认黄石市道路运输客运从业资格考试
	 	// utf-8编码
		header('Content-Type: text/html; charset=utf-8');
		
		$question = M('Question');		
		$quesArr=$question->where("specialty_code = '{$specialty_code}'")->select();
		
		$treeArr=array();
		$randArr=array_rand($quesArr,100);//随机取100道题目
		
		$option=M('Option');
		foreach ($randArr as $key => $value) {
			array_push($treeArr,$quesArr[$value]);
			
			//echo $value;
			//echo "<br>";
			//echo $quesArr[$value]['id'];
			//echo $quesArr[$value]['theme'];
			//echo "<br>";
			
			$qid=$quesArr[$value]['id'];  //题目id
			$optArr=$option->where("qid={$qid}")->select();
			$treeArr=array_merge($treeArr,$optArr);
		}
		
		//=========================打印题目预览================================
		
		foreach ($treeArr as $key => $value) {
			if($value['theme']){
				 echo "题目：".$value['theme'];
				 echo "<br>";
			}else{
				echo "　　　".$value['option_answer'].$value['content'];
				echo "<br>";
			}
		}
	 }
}