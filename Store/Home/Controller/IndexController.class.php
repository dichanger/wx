<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	//接受用户请求
    public function index(){
        $prize=M('Prize');
        $data=$prize->select();
        header('content-type:text/html;charset=utf-8');
        
        foreach ($data as $row) {
        	echo $row['prize_name'];
        }
    }


  
}