<?php
//定义命名空间
namespace Admin\Controller;
//引用核心控制器
use Think\Controller;

//定义控制器
class CommonController extends Controller {
	//使用构造函数判断用户是否登陆(不能使用__construct())
	public function _initialize() {
		//判断用户是否登陆
		//
		// var_dump(session('?username'));exit;
		if(!session('?username')) {
			$this->redirect('Public/login');
		}
	}
}