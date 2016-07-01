<?php
namespace KM4\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function _initialize() {
        //判断用户是否已经登录
        if (!isset($_SESSION['snStudent'])) {
            //$this -> error('请先登录!', U('Login/login'), 1);

            if (!isset($_SESSION['snUser'])) {
                //$this -> redirect('Login/login');
				$this -> redirect('Home/Top/index');
            }
        }
    }

    /**
     * 退出系统
     */
    public function quit() {
        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 1, '/');
        }
        session_destroy();
        //销毁session

        //$this -> redirect('Login/login');
		$this -> redirect('Home/Top/index');

    }

    /**
     * 学员信息确认
     */
    public function login_result($idcard='') {
        
        $student = I('session.snStudent', null);
        $idcard = $student['idcard'];

        $student = M('Student');
        $resList = $student -> where("idcard='{$idcard}'") -> select();
        $this -> assign('studentList', $resList);

        $this -> display();
    }

    //===========================================分隔线======================================================

    /**
     * 考试开始页
     */
    public function index($apply_detail_type = '') {
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        // utf-8编码
        header('Content-Type: text/html; charset=utf-8');
        $this -> assign('apply_detail_type', $apply_detail_type);

        $question = M('Question_k4');
        

        //=======================随机查询出100道题目========================================

        $quesX1 = $question -> field('theme,qid') -> where("question_type_code='X1' ") -> order("Rand()") -> limit(10) -> select();
        $quesA1 = $question -> field('theme,qid') -> where("question_type_code='A1' ") -> order("Rand()") -> limit(10) -> select();
        $quesA2 = $question -> field('theme,qid') -> where("question_type_code='K1' ") -> order("Rand()") -> limit(30) -> select();

        //问题
        $qid = $quesX1[0]['qid'];

        //题目组
        $this -> assign('quesX1', $quesX1);
        $this -> assign('quesA1', $quesA1);
        $this -> assign('quesA2', $quesA2);
        $this -> assign('qid', $qid);
        //=======================随机查询出100道题目 END========================================

        $this -> display("start_exam");
    }

    /**
     * 出下一题目
     */
    public function exportTheme($qid = 0) {
        $question = M('Question_k4');

        //题目
        $resQuestion = $question->where("qid = '$qid' ")->find();

        //题目类型
        $question_type_code = $resQuestion['question_type_code'];
        if ($question_type_code == 'X1') {
            $title_type = '多选题';
        } else if ($question_type_code == 'A1') {
            $title_type = '判断题';
        } else if ($question_type_code == 'K1') {
            $title_type = '单选题';
        }
        //选项
        $option = M('Option_k4');
        $theme_option = $option -> where("qid={$qid}") -> order('order_num asc') -> select();
        $html_option = "";
        foreach ($theme_option as $key => $value) {
            $one_option = $value['option_answer'] . "、" . $value['content'] . "<br>";
            $id = $value['id'];
            if (strlen($resQuestion['rightanswer']) == 1) {//单选、判断
                $html_option = $html_option."<label for='rad".$id."'><input type='radio' id='rad".$id."' name='chk_option' value='{$value['option_answer']}' />".$one_option."</label>";
            } else {//多选
                $html_option = $html_option."<label for='rad".$id."'><input type='checkbox' id='rad".$id."' name='chk_option' value='{$value['option_answer']}' />".$one_option."</label>";
            }
        }

        //题目类型
        $data['title_type'] = $title_type;
        //题目
        $data['question'] = $resQuestion;
        //选项
        $data['theme_option'] = $html_option;

        $this -> ajaxReturn($data);
    }

    //===================================分隔线=========================================================

    /**
     * 写入考试成绩
     */
    // public function score_insert() {
    // $record = M('Record');
    // $record -> create();
    //
    // //各用户写入自己的成绩
    // $student = I('session.snStudent', NULL);
    // $student_id = $student['id'];
    // $exam_date = date('Y-m-d h:i:s');
    // $record -> student_id = $student_id;
    // $record -> exam_date = $exam_date;
    //
    // $res = $record -> add();
    // if ($res) {
    // $this -> redirect('Index/login_result');
    // } else {
    // $this -> error('操作失败!');
    // }
    // }

    /**
     * 考试记录
     */
    public function record($idcard = 0, $apply_detail_type = '') {
        // utf-8编码
        header('Content-Type: text/html; charset=utf-8');

        if ($idcard == 0) {
            $student = I('session.snStudent', null);
            $idcard = $student['idcard'];
            if ($apply_detail_type == '') {
                $apply_detail_type = $student['apply_detail_type'];
            }
        } else {
            $student = M('Student');
            $res = $student ->where("idcard='{$idcard}'")-> find();
            $this -> assign('student', $res);
        }
        
        
        $this->assign('idcard',$idcard);
        $this->assign('apply_detail_type',$apply_detail_type);

        //==========================用户多类别选择===============================

        $student = M('Student');
        $resList = $student -> where("idcard='{$idcard}'") -> select();
        $this -> assign('studentList', $resList);

        //=========================================================

        $record = M('Record');
        // 实例化User对象

        $count = $record -> where("idcard='{$idcard}' and apply_detail_type='{$apply_detail_type}'") -> count();
        // 查询满足要求的总记录数
        $Page = new \Think\Page($count, 10);
        // 实例化分页类 传入总记录数和每页显示的记录数(25)

        $show = $Page -> show();
        // 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        // 此处有一BUG，到数据量没达到分页条数时。不会显示分页导航表

        $list = $record -> limit($Page -> firstRow . ',' . $Page -> listRows) -> order('id desc') -> where("idcard='{$idcard}' and apply_detail_type='{$apply_detail_type}'") -> select();
        $this -> assign('recordList', $list);
        // 赋值数据集
        $this -> assign('page', $show);
        // 赋值分页输出
        $this -> display();
        // 输出模板
    }

    //====================================分隔线======================================================

    /**
     * 查看试卷
     */
    // public function exam_paper($id=0){
    // $record=M('Record');
    // $res=$record->find($id);
    //
    // $questionArr=explode("|",rtrim($res['question'],'|'));
    // $this->assign('questionArr',$questionArr);     //题目
    //
    // $theme=$questionArr[0];
    // $firstTheme=explode("-",$theme);
    // $firstThemeId=$firstTheme[0];
    //
    // $this->assign('firstThemeId',$firstThemeId);
    // $this->display();
    // }

    /**
     * 查看试卷
     */
    public function record_exam($id = 0) {
        $record = M('Record');
        $res = $record -> find($id);
        $this -> assign('apply_detail_type', $res['apply_detail_type']);

        $questionArr = explode("|", rtrim($res['question'], '|'));
        $this -> assign('questionArr', $questionArr);
        //题目

        $theme = $questionArr[0];
        $firstTheme = explode("-", $theme);
        $firstThemeId = $firstTheme[0];

        $this -> assign('firstThemeId', $firstThemeId);
        $this -> display();
    }

    /**
     * 写入成绩
     */
    public function record_insert() {
        $record = M('Record');
        $record -> create();
        $score =  count($record -> score) * 2;
        $record->score = $score;

        //各用户写入自己的成绩
        $student = I('session.snStudent', NULL);
        $student_id = $student['id'];
        $exam_date = date('Y-m-d h:i:s');
        $record -> student_id = $student_id;
        $record -> exam_date = $exam_date;
        //$score = $record -> score;
        $res = $record -> add();

        $data['flag'] = $res;
        $data['score'] = $score;

        $this -> ajaxReturn($data);
    }

}
