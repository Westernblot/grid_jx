<?php
namespace KM4\Controller;
use Think\Controller;
use Think\Model;

class QuestionController extends Controller {

	public function index() {
		// $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
		$this -> display();
	}

	/**
	 * 数据整理
	 */
	public function zlData() {

		// utf-8编码
		header('Content-Type: text/html; charset=utf-8');

		$option = M('Option');
		$res = $option -> where("id>4370 and qid=0") -> select();

		$Model = new Model();

		$num = 0;
		foreach ($res as $key => $value) {
			$id = $value['id'];
			$question_id = $value['question_id'];

			$resQuestion = $Model -> query("select * from tp_question where question_id = '{$question_id}'");
			$qid = $resQuestion[0]['id'];

			$Model -> execute("update tp_option set qid={$qid} where id = {$id}");
			$num++;

			//echo $num+"<br>";
		}

		var_dump("总操作数据" + $num);

	}

	/**
	 * 数据整理2
	 */
	public function zl2() {

		// utf-8编码
		header('Content-Type: text/html; charset=utf-8');

		$question = M('Question');
		$res = $question ->select();

		$Model = new Model();

		$num = 0;
		foreach ($res as $key => $value) {

			$id = $value['id'];
			$theme = $value['theme'];

			$theme = str_replace("../data/media", "/jx/uploads/media", $theme);

			//echo $theme;

			$Model -> execute("update tp_question set theme = '{$theme}' where id = {$id}");
			$num++;
		}

		echo $num;
	}
	
	
	/**
	 * 数据整理3
	 */
	public function zl3() {

		// utf-8编码
		header('Content-Type: text/html; charset=utf-8');

		$question = M('Question');
		$res = $question ->select();

		$Model = new Model();

		$num = 0;
		foreach ($res as $key => $value) {

			$id = $value['id'];
			$theme = $value['theme'];

			$theme = str_replace("<IMG", "<br><IMG", $theme);

			//echo $theme;

			$Model -> execute("update tp_question set theme = '{$theme}' where id = {$id}");
			$num++;
		}

		echo $num;
	}
	
	
	/**
	 * 去掉答案字符串
	 */
	 public function trimsp(){
	 	// utf-8编码
		header('Content-Type: text/html; charset=utf-8');

		$question = M('Question');
		$res = $question ->select();

		$Model = new Model();

		$num = 0;
		$ids="";
		foreach ($res as $key => $value) {

			$id = $value['id'];
			$rightanswer = $value['rightanswer'];
			$rightanswer=trim($rightanswer);

			$res=$Model -> execute("update tp_question set rightanswer = '{$rightanswer}' where id = {$id}");
			if($res){
				$ids=$ids.$id.",";				
			    $num++;
			}
		}
        echo $ids;
		echo $num;
	 }

}
