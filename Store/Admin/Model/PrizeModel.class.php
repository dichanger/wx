<?php
namespace Admin\Model;
use Think\Model;

class PrizeModel extends Model {

	
	/**
	 * 自动验证
	 * @var array
	 */
	protected $_validate = array(
		  array('prize_name','require','奖品名称必须填写'), 
		  array('price','require','奖品单价必须填写'), 
		  array('surplus','require','剩余份数必须填写'), 

	);

	/**
	 * 自动完成
	 * @var array
	 */
	protected $_auto=array(
		// array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
		array('total','0',1),
		array('already','0',1),
		// array('picture_path','fileurl',1,'callback'),
	);

	// public function fileurl(){		
	// 	return upload('picture');
	// }

	protected function _before_insert(&$data,$options) {
		if(!empty($_FILES['picture']['name'])){	
			$data['picture_path'] = upload('picture');
		}

	}

	protected function _before_update(&$data,$options) {
		if(!empty($_FILES['picture']['name'])){	
			$data['picture_path'] = upload('picture');
		}

	}
   

}