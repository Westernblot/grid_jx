<?php
namespace Manage\Controller;
use Think\Controller;
use Think\Model;

class ExcelController extends Controller {

    
	/**
	 * 历史数据导入页面
	 */
	public function importUI(){
		$this->display();
	}
	
	
	public function uploadImport(){
		  // header('Content-Type:text/html; charset=utf-8');
		   $fileId=$_REQUEST['fileId'];
		  // $fileId='file1';
		   $upload = new \Think\Upload();// 实例化上传类
		   $upload->maxSize   =     3145728 ;// 设置附件上传大小
		   $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','xls');// 设置附件上传类型  
		   $upload->savePath  =     './excel/';
		   $info   =   $upload->uploadOne($_FILES[$fileId]);  
		   if(!$info) {// 上传错误提示错误信息 
		           $msg=$this->error($upload->getError());  
		           $this->ajaxReturn(-1);			
		     }else{// 上传成功 获取上传文件信息   
		     
		           $path= $info['savepath'].$info['savename'];			   
				   $url=str_replace('./','/',$path);
				   
				   $filePathName='Uploads'.$url;		    			   
				   
				   $this->import($filePathName);//导入数据
				  
		   }
	}
	
	
	//=============================数据导入=========================================

	public function import($filePathName='',$exts = 'xls') {
				
		header('Content-Type:text/html; charset=utf-8');
		//导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
		Vendor("PHPExcel.PHPExcel");
		//创建PHPExcel对象，注意，不能少了\
		$PHPExcel = new \PHPExcel();
		//如果excel文件后缀名为.xls，导入这个类
		if ($exts == 'xls') {
			// import("Org.Util.PHPExcel.Reader.Excel5");
			Vendor("PHPExcel.PHPExcel.Reader.Excel5");
			$PHPReader = new \PHPExcel_Reader_Excel5();
		} else if ($exts == 'xlsx') {
			// import("Org.Util.PHPExcel.Reader.Excel2007");
			Vendor("PHPExcel.PHPExcel.Reader.Excel2007");
			$PHPReader = new \PHPExcel_Reader_Excel2007();
		}

		//载入文件
		$PHPExcel = $PHPReader -> load($filePathName);
		//$PHPExcel = $PHPReader -> load("Uploads/excel/2015-07-15/55a5fcfbabd0f.xls");
		//获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
		$currentSheet = $PHPExcel -> getSheet(0);
		//获取总列数
		$allColumn = $currentSheet -> getHighestColumn();
		//获取总行数
		$allRow = $currentSheet -> getHighestRow();
		//循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
		for ($currentRow = 2; $currentRow <= $allRow; $currentRow++) {
			//从哪列开始，A表示第一列
			for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++) {
				//数据坐标
				$address = $currentColumn . $currentRow;
				//读取到的数据，保存到数组$arr中

				$value = (string)$currentSheet -> getCell($address) -> getValue();

				$data[$currentRow][$currentColumn] = $value;

			}

		}

		
		//=======================学员信息表==========================
		
		$student=M('Student');
		
		$student->startTrans(); //开启事物	
		
		$res=1;
		$num=0;	
		foreach ($data as $k => $v) {
											
			$data1['student_name']=$v['A']==null?'':$v['A'];
			$data1['sex']=$v['B']==null?'':$v['B'];
			//$data1['sex']=$v['B'];
			$data1['education']=$v['C']==null?'':$v['C'];
			$data1['address']=$v['D']==null?'':$v['D'];
			$data1['tel1']=$v['E']==null?'':$v['E'];
			$data1['tel2']=$v['F']==null?'':$v['F'];
			$data1['work_unit']=$v['G']==null?'':$v['G'];
			$data1['idcard']=$v['H']==null?'':$v['H'];
			$data1['train_unit']=$v['I']==null?'':$v['I'];
			$data1['drive_allow_car']=$v['J']==null?'':$v['J'];
			$data1['apply_type']=$v['K']==null?'':$v['K'];
			$data1['first_drive_date']=$v['L']==null?'':$v['L'];
			$data1['obtain_code']=$v['M']==null?'':$v['M'];
			$data1['apply_category']=$v['N']==null?'':$v['N'];
			$data1['bill_materials']=$v['O']==null?'':$v['O'];
			$data1['isprint']=$v['P']==null?'':$v['P'];
			$data1['birthday']=$v['Q']==null?'':$v['Q'];
			$data1['apply_detail_type']=$v['R']==null?'':$v['R'];
			$data1['exam_address']=$v['S']==null?'':$v['S'];
			$data1['native_place']=$v['T']==null?'':$v['T'];
			
			$data1['card_type']="居民身份证";
			$data1['add_date']=date('Y-m-d');
			$data1['add_name']="excel导入员";
			
			//======================================重复导入判断==================================================
			
			$idcard=$v['H']==null?'':$v['H'];
			$apply_detail_type=$v['R']==null?'':$v['R'];
			
			$arr = $student -> where("idcard='{$idcard}' and apply_detail_type='{$apply_detail_type}'") -> find();
		    
			//如果数据库中不存在，则写入数据！
		    if (!$arr) {
		    	$res=$student-> data($data1) -> add();
				$num++;
		    }
			//======================================重复导入判断==================================================				
			
		
			if(!$res){
				$res=0;
				break;
			}
			
			// echo $v['A'];
			// echo $v['B'];
			// echo $v['C'];
			// echo $v['D'];
			// echo $v['E'];
			// echo $v['F'];
			// echo $v['G'];
			// echo $v['H'];
			// echo $v['I'];
			// echo $v['J'];
			// echo $v['K'];
			// echo $v['L'];
			// echo $v['M'];
			// echo $v['N'];
			// echo $v['O'];
			// echo $v['P'];
			// echo $v['Q'];
			// echo $v['R'];
			// echo $v['S'];
			// echo $v['T'];
			// echo $v['U'];
			// echo $v['V'];
			// echo $v['W'];
			// echo "<br>";
			
		}

        if($res){   //执行成功
			$student->commit();
			$this->ajaxReturn($num);
			//echo "success!";
			//echo $num;
		}else{
			$student->rollback();
			$this->ajaxReturn(0);
			//echo "eror";
		}
    

	}

}
