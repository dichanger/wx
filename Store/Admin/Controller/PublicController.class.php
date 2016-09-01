<?php
//1、定义命名空间
namespace Admin\Controller;
//2、引入核心控制器
use Think\Controller;

//3、定义Public控制器
class PublicController extends Controller {
	//定义一个login方法，用于后台登陆
	public function login() {
		//直接载入后台模板
		$this->display();
	}
	
	//定义一个checkLogin方法，用于登陆校检
	public function checkLogin() {
		//判断是否为POST请求
		if(IS_POST) {
			//接收参数
			$username = addslashes(trim(I('post.username')));
			$password = addslashes(trim(I('post.password')));

			//判断用户名或密码是否为空
			if(empty($username) || empty($password)) {
				//输出提示并返回
				$this->error('用户名或密码不能为空');
			}
			//对密码进行md5加密
			//实例化模型
			$admin = M('admin');
			$where['adminUser'] = $username;
			$where['adminPass'] = md5($password);
			
			$row = $admin->where($where)->find();
			
			// $sql="select * from ac_admin";
			//判断是否合法
			if($row['id']) {

				//登陆成功
				//设置session信息
				session('username',$row);
				$d['datatime']= date('Y-m-d H:i:s');
				$w['id'] = $row['id'];
				$admin->where($w)->setField($d);

				$this->success('登录成功',U('Index/index',array('type'=>0)));
			} else {
				//登陆失败
				$this->error('登陆失败');
			}


		}
	}
}