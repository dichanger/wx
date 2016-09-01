<?php
	namespace Admin\Controller;
	// use Think\Controller;
	
	class TxController extends CommonController {
	
		public function index(){
	    	$con = addslashes(trim(I('content')));
	    	$type = (int)I('type');
	    	$min  = addslashes(I('min'));
	    	$max  = addslashes(I('max'));

	    	$min = strtotime($min);
	    	$max = strtotime($max);

			$m_user = M('user');

			if($type==0){
				// $where_user = "t1.phone_number='$con' or t1.wechat_name = '$con'"; 

				$where_user['t1.phone_number']  = array('like', '%'.$con.'%');
				$where_user['t1.wechat_name']  = array('like','%'.$con.'%');
				$where_user['_logic'] = 'or';

				$order = "t2.type desc"; //1为打款 0 已打款
			}else if($type==1){ //自主兑换
				$order = "t2.time desc,t2.type desc";
			}else if($type==2){
				$order = "t1.yq_usernum desc,t2.type desc";
			}else if($type == 3){
				$where_user = "t2.time >= $min AND t2.time <= $max";				

				$order = "t2.type desc"; //1为打款 0 已打款
			}


			$field = "t2.id,t1.phone_number,t1.wechat_name,t3.prize_name,t1.real_name,t1.tx_num,t1.yq_usernum,t2.time,t2.type";
			$join = "as t1 left join __TX__ as t2 on t1.id = t2.user_id";
			$join1 = "left join __PRIZE__ as t3  on t2.prize_id = t3.id";
			//查出用户
			$row = $m_user->where($where_user)
			->field($field)
			->join($join)
			->join($join1)
			->order($order)
			->select();

			if($row){
				$d = array('code'=>0,'msg'=>'查询成功','data'=>$row);
				$this->ajaxReturn($d);			
			}else{
				$d = array('code'=>1,'msg'=>'未查询到信息','data'=>array());
				$this->ajaxReturn($d);
			}

	    }
	}