<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    	
    public function lists(){
        $user_list = D('User')->getUserList();
		
        $this->assign('user_list',$user_list);
        $this->display();
    }
	
	public function edit(){
		if(IS_POST){
			$data = I('post.');
			$this->ajaxReturn($data);
			//$status = D('User')->editUserInfo($data);
			
			//$this->ajaxReturn($status);
		}else{
			$user_info = D('User')->getUserInfo();
			
			$this->assign('user_info',$user_info);
        	$this->display();
		}
	}
	
}