<?php
//1、定义命名空间
namespace Admin\Controller;
//2、引入核心控制器
// use Think\Controller;

//3、定义Index控制器
class IndexController extends CommonController {
	//定义index方法显示后台首页
	public function index() {	

		$prize=M('Prize');
		$row=$prize->select();
		
		$this->assign('row',$row);

		$type= I('type');
		$type = empty($type) ? 0 : $type ; 
		
		$this->assign('type',$type);


		$m_user = M('user');


		$order = "t2.type desc";
		$field = "t2.id,t1.phone_number,t1.wechat_name,t3.prize_name,t1.real_name,t1.tx_num,t1.yq_usernum,t2.time,t2.type";
		$join = "as t1 left join __TX__ as t2 on t1.id = t2.user_id";
		$join1 = "left join __PRIZE__ as t3  on t2.prize_id = t3.id";
		//查出用户
		$dat = $m_user->where($where_user)
		->field($field)
		->join($join)
		->join($join1)
		->order($order)
		->select();

		$this->assign('dat',$dat);

		//显示模板
		$this->display('Public/managementindex');

	}

	public function management() {
		
		$this->display('public:management');
	}
}
