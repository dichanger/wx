<?php
//1、定义命名空间
namespace Home\Controller;
//2、引入核心控制器类
use Think\Controller;

//3、定义Empty控制器
class EmptyController extends Controller {
	//定义index方法，系统会自动定位到此方法中
	public function index() {
		//定制错误页面
		$this->display('Public:404');
	}
}