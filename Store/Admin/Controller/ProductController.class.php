<?php
namespace Admin\Controller;
use Think\Controller;
class ProductController extends Controller{

	//显示
	public function index(){
		

	}


	//添加奖品
	public function add(){

		header('content-type:text/html;charset=utf-8');
		// var_dump($_POST,$_FILES);
		if(IS_POST){
			$prize=D('prize');

			if (!$prize->create()){     
			// 如果创建失败 表示验证没有通过 输出错误提示信息     
				exit($prize->getError());
			}else{
			     $flag=$prize->add();
			}	
		
			if($flag!==false){
				$this->success('添加成功',U('index/index',array('type'=>1)),3);
			}else{
				$this->error('添加失败');
			}
		}

	}

	//删除
	public function del(){
		$id = (int)trim(I('id'));
		$data = array();
		if($id>0){
			$res = M('prize')->delete($id);
			if(false===$res){	
				$this->error('删除失败！');
			}else{
				$this->success('删除成功',U('index/index',array('type'=>1)));		
			}
		}else{
			$this->error('数据异常');
		}
	}

	public function edit(){
		$type = I('type');
		if($type == 'ajax'){
				$id = (int)I('id');
				$res = M('prize')->find($id);
				$this->ajaxReturn($res);
				exit;
		}

		$prize=D('prize');

		if (!$prize->create()){     
		// 如果创建失败 表示验证没有通过 输出错误提示信息     
			exit($prize->getError());
		}else{

		     $flag=$prize->save();
		}	


	
		if($flag!==false){
			$this->success('修改成功',U('index/index',array('type'=>1)),3);
		}else{
			$this->error('修改失败');
		}

	

	}

}