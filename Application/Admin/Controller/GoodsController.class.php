<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends Controller {
    	
    public function lists(){
        $goods_list = D('Goods')->getGoodsList();
		
        $this->assign('goods_list',$goods_list);
        $this->display();
    }
	
	public function add(){
        if(IS_POST){
			$data = I('post.');
			$status = D('Goods')->addGoods($data);
			
			$this->ajaxReturn($status);
		}else{
			$this->display();
		}
    }
	
	public function edit(){
		if(IS_POST){
			$data = I('post.');
			$status = D('Goods')->editGoodsInfo($data);
			
			$this->ajaxReturn($status);
		}else{
			$goods_info = D('Goods')->getGoodsInfo();
			
			$this->assign('goods_info',$goods_info);
        	$this->display();
		}
	}
	
	public function delete(){
		if(IS_POST){
			$data = I('post.');
			
			$status = D('Goods')->deleteGoods($data);
			
			$this->ajaxReturn($status);
		}else{
			
		}
	}
}