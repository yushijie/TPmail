<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        $this->show();
    }
	
	public function register(){
        if (IS_POST) {
			$data = I('post.');
			$M = D('User');
			
			$this->ajaxReturn($M->register($data));
			
        } else {
        	$this->display();
        }
    }
	
	public function login(){
		if (IS_POST) {
			$data = I('post.');
			$M = D('User');
			
			$this->ajaxReturn($M->login($data));
			
        } else {
        	$this->display();
        }
	}
	
}