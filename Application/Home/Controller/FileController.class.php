<?php
namespace Home\Controller;
use Think\Controller;

use Think\Model;

/**
 * 文件操作，包括上传 和 下载
 */
class FileController extends Controller {
	
	
    public function index(){
       $this->display();   
    }
    
	/**
	 * 文件删除
	 */
	public function fileDel($fileName=''){
		header('Content-Type: text/html; charset=utf-8');
		$path=C('IDCARD_PATH');
		//echo $fileName;
	 	$data=unlink($path."/".$fileName);
		
		$this->ajaxReturn($data);
	}
    
	//==================================kindEditor编辑器上传图片======================================================
	
	public function mangeUpload(){
		    $upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     3145728 ;// 设置附件上传大小
		    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型  
		    $upload->savePath  =     './editors/';
		    $info   =   $upload->upload(); 
			if(!$info) {// 上传错误提示错误信息   
				$this->error($upload->getError()); 
		    }else{// 上传成功 获取上传文件信息    
		    
		        //?????此处有待优化??????????
		        foreach($info as $file){
		        	$path=$file['savepath'].$file['savename'];
					$name=$file['savename'];
		        	       
				  }
				  //$path= $info['savepath'].$info['savename'];			   
				  $url=str_replace('./','/',$path);
				  
				  $data['error']=0;
				  $data['url']=__ROOT__.'/Uploads'.$url;
				  $this->ajaxReturn($data);

		    }
	}
	
	
	//===================================普通文件上传===========================================
	
	
	public function upload(){
		  // header('Content-Type:text/html; charset=utf-8');
		   $fileId=$_REQUEST['fileId'];
		  // $fileId='file1';
		   $upload = new \Think\Upload();// 实例化上传类
		   $upload->maxSize   =     3145728 ;// 设置附件上传大小
		   $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型  
		   $upload->savePath  =     './img/';
		   $info   =   $upload->uploadOne($_FILES[$fileId]);  
		   if(!$info) {// 上传错误提示错误信息 
		           $msg=$this->error($upload->getError());  
		     }else{// 上传成功 获取上传文件信息   
		     
		           $path= $info['savepath'].$info['savename'];			   
				   $url=str_replace('./','/',$path);
				   
				   $data['name']=$info['name'];
				   $data['url']=__ROOT__.'/Uploads'.$url;
				   
				  $this->ajaxReturn($data);
				  
		   }
		  
	}
	
	
    
}